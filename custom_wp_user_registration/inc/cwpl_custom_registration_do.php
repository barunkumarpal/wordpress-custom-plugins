<?php 
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}

function cwpl_custom_registration_do(){
    global $wpdb;
    $response['status'] = 0;

    if( isset($_POST['username'], $_POST['pwd'], $_POST['email']) && !empty($_POST['username']) && !empty($_POST['pwd']) && !empty($_POST['email'])){         

        $username = $wpdb->escape( $_POST['username'] );
        $pwd = $wpdb->escape( $_POST['pwd'] ); 
        
        if( username_exists( $username )){
            $response['status'] = "Username already exists";

        wp_send_json($response);
        exit;
        } 

        $username = $wpdb->escape( $_POST['username'] );
        $email = $wpdb->escape( $_POST['email'] );
        $pwd = $wpdb->escape( $_POST['pwd'] );
        
        $create_user = wp_create_user( $username, $pwd, $email );

        if( $create_user ){
            $response['status'] = 1;
            $response['url'] = site_url()."/wp-login.php";           
        }        
    }

    wp_send_json($response);
}
