<?php
/**                                                                                                                          
 * WooCommerce in process of creating an order. Add order meta data for                                                      
 * use later post checkout.                                                                                                  
 */
function ttp_add_order_item_meta($item_id, $values, $cart_item_key) {
    if (isset($values['reg_no'])) {
        wc_add_order_item_meta($item_id, 'Reg_no', $values['reg_no'], false);        
    }
    if (isset($values['plate_size'])) {
        wc_add_order_item_meta($item_id, 'Plate_size', $values['plate_size'], false);        
    }
    if (isset($values['text_style'])) {
        wc_add_order_item_meta($item_id, 'Text_style', $values['text_style'], false);        
    }
    if (isset($values['badge_name'])) {
        wc_add_order_item_meta($item_id, 'Badge_name', $values['badge_name'], false);        
    }
    if (isset($values['border_color'])) {
        wc_add_order_item_meta($item_id, 'Border_color', $values['border_color'], false);        
    }
    if (isset($values['slogan_text'])) {
        wc_add_order_item_meta($item_id, 'Slogan_text', $values['slogan_text'], false);        
    }
    if (isset($values['slogan_color'])) {
        wc_add_order_item_meta($item_id, 'Slogan_color', $values['slogan_color'], false);        
    }
    if (isset($values['c_price'])) {
        wc_add_order_item_meta($item_id, 'Price', $values['c_price'], false);        
    }
}