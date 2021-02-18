<?php
global $routing;

/* ROUTING EXAMPLE: 
 * URL: '/items/' => 'items/view/1'
 * Mean: when user types '/items'  the application will execute 'items/view/1' 
 * where 'items' is the controller, 'view' is the action and '1' is the queryString 
 */
$routing = array(
    //'/admin\/(.*?)\/(.*?)\/(.*)/' => 'admin/\1_\2/\3',
    //'/(.*)/' => 'page/\1_',
    //'/items/' => 'items/view/2',
    '/login/' => 'user/login',
    // '/signup/' => 'user/signup',
    //'\/' => 'page',
    //'/template\/(.*?)/' => '/protemplate\/(.*?)/'
    // '/dashboard/' => '/user\/dashboard/',
    /*'/user\/(.*?)\/edit/' => 'user/edit/1_'*/
);