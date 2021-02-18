<?php
//echo "Template Class";
class Template {

    protected $variables = array();
    protected $_controller;
    protected $_action;
    protected $_layout;
    protected $_content;

    function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
    }

    // Set Variables
    function set($name, $value) {
        $this->variables[$name] = $value;
    }

    // Display Template
    function render($layout, $theme, $doNotRenderHeader = 0, $doNotRenderHTML = 0, $doNotRenderSidebar = 0, $doNotRenderContentHeader = 0, $doNotRenderFooter = 0, $doNotRenderControlSidebar = 1) {//TODO: Improve this by getting an array
        // error_log('[TEMPLATE][DO NOT RENDER HTML] ' . $doNotRenderHTML);
        // error_log('[TEMPLATE] ' . json_encode(debug_backtrace()));
        // HTML helpers
        //$html = new HTML;
        $isUnderConstruction = Application::getConfig('app.under_construction');
        $maintenance = Application::getConfig('app.maintenance');
        if ($isUnderConstruction){
            if (file_exists(APPLICATION_PATH . '/views/layouts/'.$layout.'/under-construction.php')) {
                include (APPLICATION_PATH . '/views/layouts/'.$layout.'/under-construction.php');
            }else{
                echo "Website Under Construction";
            }
            return;
        }

        if ($isUnderConstruction){
            if (file_exists(PUBLIC_PATH . '/assets/themes/'.$layout.'/under-construction.php')) {
                include (PUBLIC_PATH . '/assets/themes/'.$layout.'/under-construction.php');
            }else{
                echo "Website Under Construction";
            }
            return;
        }

        if ($maintenance){
            echo "Website on Maintenance";
            return;
        }
        $renderContentInline           = 0;
        $_content                      = 'Default content';
        $control_side_open             = ($doNotRenderControlSidebar == 0) ? 'control-side-open' : '';
        $control_sidebar_toggle_button = ($doNotRenderControlSidebar == 0) ? '' : 'style="display: none;"' ;
        $control_sidebar_trigger       = ($doNotRenderControlSidebar == 0) ? '<script>$("#sidebar-toggle-button").controlSidebar("Slide")</script>' : '' ;

        extract($this->variables);
        //var_dump($this->variables);
        
        if ($doNotRenderHTML == 0) {
            if ($renderContentInline == 1){ //If content is set to render inside 'content-wrapper.php'
                /*foreach ($this->variables as $key => $variable) {
                    $search[] = '$'.$key;
                    $replace[] = $variable;
                }*/
                $_content = file_get_contents(APPLICATION_PATH . '/views/' .strtolower($this->_controller).'/'.$this->_action.'.php');
                //$_content = htmlentities($_content);
                //$_content = str_replace('$test', '\"This is a test\"', $_content);
                //$_content = html_entity_decode($_content);
                //var_dump($_content);
            }

            // if (file_exists(APPLICATION_PATH . '/views/layouts/' . $layout .'/head.php')) {
            //     include (APPLICATION_PATH . '/views/layouts/' . $layout .'/head.php');
            // }
            if (file_exists(PUBLIC_PATH . '/assets/themes/' . $theme .'/head.php')) {
                include (PUBLIC_PATH . '/assets/themes/' . $theme .'/head.php');
            }

            if ($doNotRenderHeader == 0) {
                // if (file_exists(APPLICATION_PATH . '/views/layouts/' . $layout .'/'. strtolower($this->_controller) . '/header.php')) {
                //     include (APPLICATION_PATH . '/views/layouts/' . $layout . '/' . strtolower($this->_controller) . '/header.php');
                // } else {
                //     include (APPLICATION_PATH . '/views/layouts/' . $layout .'/header.php');
                // }

                if (file_exists(PUBLIC_PATH . '/assets/themes/' . $theme .'/'. strtolower($this->_controller) . '/header.php')) {
                    include (PUBLIC_PATH . '/assets/themes/' . $theme . '/' . strtolower($this->_controller) . '/header.php');
                } else {
                    include (PUBLIC_PATH . '/assets/themes/' . $theme .'/header.php');
                }
            }

            if ($doNotRenderSidebar == 0) {
                // if (file_exists(APPLICATION_PATH . '/views/layouts/'.$layout.'/sidebar-menu.php')) {
                //     include (APPLICATION_PATH . '/views/layouts/'.$layout.'/sidebar-menu.php');
                // }
                if (file_exists(PUBLIC_PATH . '/assets/themes/'.$theme.'/sidebar-menu.php')) {
                    include (PUBLIC_PATH . '/assets/themes/'.$theme.'/sidebar-menu.php');
                }
            }

            if (file_exists(PUBLIC_PATH . '/assets/themes/' . $theme .'/content-wrapper.php')) {
                include (PUBLIC_PATH . '/assets/themes/' . $theme .'/content-wrapper.php');
            }
            
            if ($renderContentInline !== 1){
                
                if (file_exists(APPLICATION_PATH.'/views/'.strtolower($this->_controller).'/'.$this->_action.'.php')) {
                    include (APPLICATION_PATH . '/views/' .strtolower($this->_controller).'/'.$this->_action.'.php');
                }
            }

            if ($doNotRenderFooter == 0) {
                // if (file_exists(APPLICATION_PATH . '/views/layouts/'.$layout .'/'. strtolower($this->_controller) . '/footer.php')) {
                //     include (APPLICATION_PATH . '/views/layouts/'.$layout .'/'.strtolower($this->_controller) . '/footer.php');
                // } else {
                //     include (APPLICATION_PATH . '/views/layouts/'.$layout .'/'.'footer.php');
                // }

                if (file_exists(PUBLIC_PATH . '/assets/themes/'.$theme .'/'. strtolower($this->_controller) . '/footer.php')) {
                    include (PUBLIC_PATH . '/assets/themes/'.$theme .'/'.strtolower($this->_controller) . '/footer.php');
                } else {
                    include (PUBLIC_PATH . '/assets/themes/'.$theme .'/'.'footer.php');
                }
            }

            if ($doNotRenderControlSidebar == 0) {
                // if (file_exists(APPLICATION_PATH . '/views/layouts/'.$layout.'/control-sidebar.php')) {
                //     include (APPLICATION_PATH . '/views/layouts/'.$layout.'/control-sidebar.php');

                // }
                if (file_exists(PUBLIC_PATH . '/assets/themes/'.$theme.'/control-sidebar.php')) {
                    include (PUBLIC_PATH . '/assets/themes/'.$theme.'/control-sidebar.php');

                }
            }

            // if (file_exists(APPLICATION_PATH . '/views/layouts/'.$layout.'/foot.php')) {
            //     include (APPLICATION_PATH . '/views/layouts/'.$layout.'/foot.php');
            // }
            if (file_exists(PUBLIC_PATH . '/assets/themes/'.$theme.'/foot.php')) {
                include (PUBLIC_PATH . '/assets/themes/'.$theme.'/foot.php');
            }
        }
        else{
            
        }
    }//end render()

     //If content is set to render inside 'content-wrapper.php'
    function renderContentInline(){
        extract($this->variables);
        include(APPLICATION_PATH . '/views/' .strtolower($this->_controller).'/'.$this->_action.'.php');
    }

    function getSideMenu($elements){
        $menu = '<ul class="sidebar-menu tree" data-widget="tree" data-spy="affix" data-offset-top="0">
                    <li class="header">LABELS</li>';
        foreach ($elements as $element) {
            $menu .= '<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>'.$element.'</span></a></li>';
        }
        $menu .= '</ul>';
        return $menu;
    }
}