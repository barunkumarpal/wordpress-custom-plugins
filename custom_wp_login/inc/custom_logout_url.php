<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}
if(!function_exists('add_action')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}
// Redirect on logout to the custom url
function custom_logout_url(){
    global $pagenow;

    $cwpl_logout_url = get_theme_mod('cwpl_logout_setting');    

    if( !is_user_logged_in() && $pagenow == 'wp-login.php' && !empty($cwpl_logout_url) ){

        // $redirect_url = '/custom-login';
        $redirect_url = $cwpl_logout_url;

        if(isset($redirect_url) && !empty($redirect_url)){
            wp_redirect( site_url().$redirect_url );
            exit('You are redirected to another page for login');
        }        
    }
}

// Redirect on wp-admin login to custom url
function custom_login_url(){

    $cwpl_login_url = get_theme_mod('cwpl_logout_setting'); 
    
    if(isset($cwpl_login_url) && !empty($cwpl_login_url)){
        $redirect_url = $cwpl_login_url;
    }else{
        $redirect_url = '/wp-login.php';
    }        
    

    global $pagenow;

    $cwpl_all_logout_setting = get_theme_mod('cwpl_all_logout_setting');
    
    
     if($cwpl_all_logout_setting == 1){
        if( $pagenow == 'wp-login.php' && !is_user_logged_in()){   
            header( "Location:".site_url().$redirect_url);
            exit('You are redirected to another page for login');              
        }
    }
}

