<?php
/**
 * Display custom item data in the cart
 */
function plugin_republic_get_item_data( $item_data, $cart_item_data ) {
 if( isset( $cart_item_data['reg_no'] ) ) {
 $item_data[] = array(
 'key' => 'Your Registration No',
 'value' => wc_clean( $cart_item_data['reg_no'] )
 );
 }
 if(isset($cart_item_data['plate_size'])){
   $item_data[] = array(
      'key' => 'Your Plate Size',
      'value' => wc_clean( $cart_item_data['plate_size'] )
      );
 }
 if(isset($cart_item_data['text_style'])){
   $item_data[] = array(
      'key' => 'Your Text Style',
      'value' => wc_clean( $cart_item_data['text_style'] )
      );
 }

 if(isset($cart_item_data['badge_name'])){
   $item_data[] = array(
      'key' => 'Plate Badge Style',
      'value' => wc_clean( $cart_item_data['badge_name'] )
      );
 }

 if(isset($cart_item_data['border_color'])){
   $item_data[] = array(
      'key' => 'Plate Border Color',
      'value' => wc_clean( $cart_item_data['border_color'] )
      );
 }

 if(isset($cart_item_data['slogan_text'])){
   $item_data[] = array(
      'key' => 'Plate Slogan',
      'value' => wc_clean( $cart_item_data['slogan_text'] )
      );
 }

 if(isset($cart_item_data['slogan_color'])){
   $item_data[] = array(
      'key' => 'Plate Slogan Color',
      'value' => wc_clean( $cart_item_data['slogan_color'] )
      );
 }
 if(isset($cart_item_data['price'])){
   $item_data[] = array(
      'key' => 'Plate Custom Price',
      'value' => wc_clean( $cart_item_data['c_price'] )
      );
 }
 

 

 return $item_data;
}