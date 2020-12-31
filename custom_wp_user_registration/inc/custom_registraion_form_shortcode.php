<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}
if(!function_exists('add_action')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}



function custom_registraion_form_shortcode(){
    $plugin_path = dirname(CWPUR_PLUGIN_PATH);    
    

    if(!is_user_logged_in()){
        require_once($plugin_path.'/html_files/registration_form.php');
    }    
}