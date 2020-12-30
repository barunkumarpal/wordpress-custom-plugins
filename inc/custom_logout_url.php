<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}
if(!function_exists('add_action')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}

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