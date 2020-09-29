<?php
function create_custom_order(){
    $output = ['status' => 0];

    $user_ID = $_POST['userID'];
    $random_num = rand();

    $order_id = $user_ID.$random_num;

    $postarr =[
        'post_type' => 'c_order',
        'post_status' => 'publish',
        'post_title' => $order_id,
        'post_author' =>   $user_ID    
    ];
    
   $check_success = wp_insert_post( $postarr, true );

   

        if ( is_wp_error( $check_success ) ) {
            wp_send_json($output);
        }
        else {
            $output = ['status' => 1];
        }


   

    wp_send_json($output);
}