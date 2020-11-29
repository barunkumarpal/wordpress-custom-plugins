<?php
function cpbn_enqueue(){
    wp_enqueue_script('customjquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
    wp_enqueue_script( 'cpbn_custom_js', plugins_url('/inc/js/custom.js', CPBN_PLUGIN_PATH), ['customjquery'], '1.0.0', true );    
    wp_enqueue_script( 'cpbn_add_variations_js', plugins_url('/inc/js/add_variations.js', CPBN_PLUGIN_PATH), ['customjquery'], '1.0.0', true );    
    wp_enqueue_script( 'cpbn_add_to_cart_plate_js', plugins_url('/inc/js/plate_add_to_cart.js', CPBN_PLUGIN_PATH), ['customjquery'], '1.0.0', true );    
    
    
    wp_enqueue_style( 'cpbn_custom_css', plugins_url('/inc/css/custom.css', CPBN_PLUGIN_PATH));    
    
    wp_localize_script('customjquery', 'cpbn_plugin_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php')
    )); 
   
    
    
}