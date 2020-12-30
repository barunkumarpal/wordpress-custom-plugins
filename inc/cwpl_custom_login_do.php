<?php 
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}

function cwpl_custom_login_do(){
    global $wpdb;
    $response['status'] = 0;

    if( isset($_POST['username'], $_POST['pwd']) && !empty($_POST['username']) && !empty($_POST['pwd']) ){         

        $username = $wpdb->escape( $_POST['username'] );
        $pwd = $wpdb->escape( $_POST['pwd'] );

        if(isset($_POST['rememberme'])){
            $remember = $_POST['rememberme'];
        }    
       
        $login_array = array(
            'user_login'    => $username,
            'user_password' => $pwd,
            'remember'      => $remember
        );         

        $verify_user = wp_signon( $login_array, false);

        if( is_wp_error($verify_user) ){

            $response['status'] = $verify_user->get_error_message();
            
        }else{
            $response['status'] = 1;
            $response['url'] = site_url();
           
        }
    }

    wp_send_json($response);
}
