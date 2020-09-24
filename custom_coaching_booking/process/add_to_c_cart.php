<?php
function add_to_c_cart(){
    $prod_ID = $_POST['prodID'];
    $user_ID = $_POST['userID'];
    $prod_qty = $_POST['prodQty'];
    // $prod_inst = $_POST['installments'];

    global $wpdb;
    $output = ['status' => 0 ];

    $result_check =  $wpdb->insert(
        $wpdb->prefix.'custom_cart',
        [
            'product_id' => $prod_ID,
            'user_id' => $user_ID,  
            'product_qty' => $prod_qty
            // 'installments' => $prod_inst
        ],
        [
            '%d','%d','%d'
        ]
    );
    if($result_check){
        $output['status'] = 1;
    }
    wp_send_json($output);
}