<?php

/**                                                                                                                          
 * Add a piece of data to the cart item to flag it as an installment purchase                                                
 */
function ttp_add_cart_item_meta($cart_item_data, $product_id, $variation_id) {
   
    if(isset($_REQUEST['reg_no']) && !empty($_REQUEST['reg_no'])){
        $cart_item_data['reg_no'] = $_REQUEST['reg_no'];
    }
    
    if(isset($_REQUEST['plate_size']) && !empty($_REQUEST['plate_size'])){
        $cart_item_data['plate_size'] = $_REQUEST['plate_size'];
    }

    if(isset($_REQUEST['text_style']) && !empty($_REQUEST['text_style'])){
        $cart_item_data['text_style'] = $_REQUEST['text_style'];
    }

    if(isset($_REQUEST['badge_name']) && !empty($_REQUEST['badge_name'])){
        $cart_item_data['badge_name'] = $_REQUEST['badge_name'];
    }

    if(isset($_REQUEST['border_color']) && !empty($_REQUEST['border_color'])){
        $cart_item_data['border_color'] = $_REQUEST['border_color'];
    }   

    if(isset($_REQUEST['slogan_color']) && !empty($_REQUEST['slogan_color'])){
        $cart_item_data['slogan_color'] = $_REQUEST['slogan_color'];
    }

    if(isset($_REQUEST['slogan_text']) && !empty($_REQUEST['slogan_text'])){
        $cart_item_data['slogan_text'] = $_REQUEST['slogan_text'];
    }

    if(isset($_REQUEST['price']) && !empty($_REQUEST['price'])){
        $cart_item_data['c_price'] = $_REQUEST['price'];
    }
    
    return $cart_item_data;
}