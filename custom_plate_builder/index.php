<?php
/**
 * Plugin Name: Custom Plate Builder
 * Description: This plugin has the ability to give you a custom woocommerce product showcase.
 * Author: Barun
 * Author URI: http://developerbarun.byethost8.com
 * Text Domain: CPBN
 * Version: 1.0.0
 */
if(!defined('ABSPATH')){
    exit;
    die;
    die();
}
if(!function_exists('add_action')){
    exit;
    die;
    die();
}
define('CPBN_PLUGIN_PATH', __FILE__);
$plugin_path = dirname(CPBN_PLUGIN_PATH);

// Enqueue Style & JS
require_once($plugin_path.'/enqueue.php');
add_action('wp_enqueue_scripts', 'cpbn_enqueue');

// Show Product with Shortcode
require_once($plugin_path.'/inc/show_plate_products.php');
add_shortcode( 'show_woo_plate_products', 'show_woo_plate_products' );

// Show Product Variations with Shortcode
require_once($plugin_path.'/inc/show_plate_variations.php');
add_shortcode( 'show_plate_variations', 'show_plate_variations' );

// Add Custom Meta to Item
require_once($plugin_path.'/inc/plate_custom_meta.php');
add_filter('woocommerce_add_cart_item_data', 'ttp_add_cart_item_meta', 10, 3);

// Add Plate to cart
require_once($plugin_path.'/inc/woocommerce_ajax_add_to_cart.php');

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

// Display Meta Data in Cart
require_once($plugin_path.'/inc/display_custom_meta_cart.php');
add_filter( 'woocommerce_get_item_data', 'plugin_republic_get_item_data', 10, 2 );

// Add Meta Data to Order
require_once($plugin_path.'/inc/add_order_meta_data.php');
add_action('woocommerce_add_order_item_meta', 'ttp_add_order_item_meta', 10, 3);

// Fetch Regular Plate Price using AJAX
require_once($plugin_path.'/inc/fetch_regular_plate_price.php');
add_action('wp_ajax_fetch_regular_plate_price', 'fetch_regular_plate_price');
add_action('wp_ajax_nopriv_fetch_regular_plate_price', 'fetch_regular_plate_price');

// Fetch Border Color Plate Price using AJAX
require_once($plugin_path.'/inc/fetch_border_color_price.php');
add_action('wp_ajax_fetch_border_color_price', 'fetch_border_color_price');
add_action('wp_ajax_nopriv_fetch_border_color_price', 'fetch_border_color_price');

// Set Plate Custom Dynamic Price
require_once($plugin_path.'/inc/calculate_totals.php');
add_action('woocommerce_before_calculate_totals', 'ttp_price_adjustment', 10, 1);
// require_once($plugin_path.'/inc/additional_cart_data.php');

// Show Plates with Shortcode
require_once($plugin_path.'/inc/show_plates.php');
add_shortcode( 'show_plates', 'show_plates' );

// Show Alert with Modal Shortcode
require_once($plugin_path.'/inc/show_notification.php');
add_shortcode( 'show_notification', 'show_notification' );