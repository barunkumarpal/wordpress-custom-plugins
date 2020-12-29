<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
    die;
}
if(!function_exists('add_action')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
    die;
}

function cpb_enqueue(){    
    wp_enqueue_style('swiper-bundle-min', 'https://unpkg.com/swiper/swiper-bundle.min.css', NULL, '1.0.0', 'all');    
    wp_enqueue_style('bootstrap-min', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', NULL, '4.5.2', 'all');
    
    wp_enqueue_style('custom-css', plugins_url('/assets/css/custom.css', CPB_PLUGIN_PATH), NULL, '1.0.0', 'all');

    wp_enqueue_script('jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', [], '3.5.1', false);
    wp_enqueue_script('popper-min', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', ['jquery-min'], '1.16.0', false);
    wp_enqueue_script('bootstrap-min', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', ['jquery-min'], '4.5.2', false);
    wp_enqueue_script('swiper-min', 'https://unpkg.com/swiper/swiper-bundle.min.js', ['jquery-min'], '4.5.2', false);
    
    wp_enqueue_script('custom-js', plugins_url('/assets/js/custom.js', CPB_PLUGIN_PATH), ['jquery-min'], '4.5.2', false);
}
