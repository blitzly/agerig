<?php

/* 
 * Oct 2017
 * Last Edit: Oct 2017
 * This class controls the application
 *   - Is called by the public/index.php file
 *   - Includes configs and runs template system
 */

class Application{ 
    
    public static $config;
    public $url;

    
    function __construct(){
        $this->init();
    }
    
    function init(){
        require_once APPLICATION_PATH . '/library/shared.php';
        require_once APPLICATION_PATH . '/configs/routing.php';
        //$this->url = empty($_GET['url']) ? NULL : $_GET['url'];
        $this->url = empty($_SERVER['REQUEST_URI']) ? NULL : ltrim($_SERVER['REQUEST_URI'],'/');
        self::$config = parse_ini_file(APPLICATION_PATH . "/configs/application.ini");
        //echo "Request URI: ". ltrim($this->url,'/');
    }
    
    /** Main Call Function **/
    public function run(){
        //error_log("URL: ".$_GET['url']);
        $queryString = array();
        if ($this->url == NULL){
            $controller = self::getConfig('default.controller');
            $action = self::getConfig('default.action');
            
        }else{
            $url = routeURL($this->url);
            $urlArray = explode("/",$url);
            
            /** Controller **/
            $controller = $urlArray[0];
            
            /** Action **/
            array_shift($urlArray);
            if (!empty($urlArray[0])) {
                $action = $urlArray[0];
                array_shift($urlArray);
            } else {
                $action = Application::getConfig('default.action'); // Default Action. TODO: get from iniFile
            }
            /** QueryString **/
            $queryString = $urlArray;
        }

        $controllerName = $controller.'Controller';
        $model          = rtrim($controller, 's');
        $dispatch       = new $controllerName($model, $controller, $action);
    	
    	if ((int)method_exists($controllerName, $action)) {
            call_user_func_array(array($dispatch,"beforeAction"),$queryString);
            call_user_func_array(array($dispatch,$action),$queryString);
            call_user_func_array(array($dispatch,"afterAction"),$queryString);
    	} else {
            /* Error Generation Code Here */
            if (file_exists(PUBLIC_PATH . '/assets/themes/404.php')) {
                include (PUBLIC_PATH . '/assets/themes/404.php');
            } else {
                echo "<h3>Page not found</h3>";
            }
    	}
    }
    
    public static function getConfig($setting = "", $section = false){
        self::$config = parse_ini_file(APPLICATION_PATH . "/configs/application.ini", $section);
        return (empty($setting)) ? self::$config : self::$config[$setting];
    }
    
    public function __get($name){
       if(defined("self::$name")){
          return constant("self::$name");
       }
       @trigger_error ("$name  isn't defined");
    }
    
    function __destruct() {
    }
}