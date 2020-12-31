<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}

function custom_register_url(){ 
    global $pagenow;
     
    $cwpl_register_url = get_theme_mod('cwpur_user_register_setting');
    
    if(isset($cwpl_register_url) && !empty($cwpl_register_url)){
        $redirect_url = $cwpl_register_url;
    }else{
        $redirect_url = '/wp-register.php';
    }  

    if( $pagenow == 'wp-register.php' && !is_user_logged_in()){   
        header( "Location:".site_url().$redirect_url);
        exit('You are redirected to another page for registration');              
    }
}