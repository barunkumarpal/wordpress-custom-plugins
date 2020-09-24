<?php
function delete_from_c_cart(){
    $output = ['status' => 0];

    $cart_id = $_POST['cartID'];

    global $wpdb;

    $table_name = $wpdb->prefix . "custom_cart";  
      
    $sql = "DELETE FROM $table_name WHERE cart_id='$cart_id'";

    $result_check = $wpdb->query($sql);

if($result_check){
    $output['status'] = 1;
}

wp_send_json($output);
}