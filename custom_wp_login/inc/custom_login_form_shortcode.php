<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}
if(!function_exists('add_action')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}



function custom_login_form_shortcode(){
    $plugin_path = dirname(CWPL_PLUGIN_PATH);    
    

    if(!is_user_logged_in()){
        require_once($plugin_path.'/html_files/login_form.php');


        // $menus = get_registered_nav_menus();
 
        // foreach ( $menus as $location => $description ) {
        
        //     echo $location . ': ' . $description . '<br />';
        // }
    }    
}