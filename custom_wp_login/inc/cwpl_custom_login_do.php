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

        if(get_theme_mod('cwpl_captcha_option') == 1){
            $secret_key = get_theme_mod('cwpl_captcha_secret');
            // $response_key = $_POST['g-recaptcha-response'];
            $response_key = $_POST['g_recaptcha_response'];
            $user_ip = $_SERVER['REMOTE_ADDR'];

            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_key&remoteip=$user_ip";

            $captcha_response = file_get_contents($url);
            $captcha_response = json_decode($captcha_response);

            if(empty($captcha_response->success)){
                $response['captcha_error'] = 'Captcha verification failed!';
                wp_send_json($response);
            }else{               
                $verify_user = wp_signon( $login_array, false);
            }


        }
        else{
            $verify_user = wp_signon( $login_array, false);
        }


        if( isset($verify_user) && !empty($verify_user) && is_wp_error($verify_user) ){

            $response['login_error'] = $verify_user->get_error_message();
            
        }else{
            $response['status'] = 1;
            $response['url'] = site_url();
           
        }

    }

    wp_send_json($response);
}
