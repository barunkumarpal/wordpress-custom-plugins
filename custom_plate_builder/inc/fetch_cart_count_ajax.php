<?php 

function fetch_cart_count_ajax(){
    $output['status'] = 0;
    $count = 0;
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

        $count += $cart_item['quantity'];

        // $count++;         
    }
    
    
   $subtotal =  WC()->cart->get_cart_subtotal();
//    $subtotal =  WC()->cart->subtotal;
//    $subtotal =  esc_html( $subtotal );

    $output['cart_count'] = $count;
    $output['subtotal'] = $subtotal;

    $output['status'] = 1;

    wp_send_json($output);
}