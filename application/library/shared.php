<?php

/* 
 * This file is for common functions on which the application depends
 */

 
/** Autoload any classes that are required **/
 
//function __autoload($className) {
spl_autoload_register(function($className) {
    // error_log( "Entra: " . $className.'<br />');

    if (file_exists(APPLICATION_PATH . '/library/' . strtolower($className) . '.class.php')) {

        require_once(APPLICATION_PATH .  '/library/' . strtolower($className) . '.class.php');

    } else if (file_exists(APPLICATION_PATH .  '/controllers/' .  lcfirst($className) . '.class.php')) {

        require_once(APPLICATION_PATH .  '/controllers/' .  lcfirst($className) . '.class.php');

    } else if (file_exists(APPLICATION_PATH .  '/controllers/' . lcfirst($className) . '.php')) {

        require_once(APPLICATION_PATH .  '/controllers/' . lcfirst($className) . '.php');
    
    } else if (file_exists(APPLICATION_PATH .  '/models/' . strtolower($className) . '.class.php')) {
        
        require_once(APPLICATION_PATH .  '/models/' . strtolower($className) . '.class.php');
    
    } else if (file_exists(APPLICATION_PATH .  '/models/' . strtolower($className) . '.php')) {
        
        require_once(APPLICATION_PATH .  '/models/' . strtolower($className) . '.php');
    
    } else if (file_exists(APPLICATION_PATH .  '/views/' . strtolower($className) . '.class.php')) {

        require_once(APPLICATION_PATH .  '/views/' . strtolower($className) . '.class.php');
    
    } else {
        /* Error Generation Code Here */
        echo "Impossible to load class <b>" . $className . "</b><br>";
    }
    //echo APPLICATION_PATH .  '/views/template.class.php';
});
//}
function routeURL($url) {
    global $routing;
    
    foreach ( $routing as $pattern => $result ) {
        if ( preg_match( $pattern, $url ) ) {
            return preg_replace( $pattern, $result, $url );
        }
    }
    return ($url);
}