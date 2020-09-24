<?php
/**
 * Plugin Name: Custom Booking Plugin
 * Description: This plugin has the ability to give you a custom booking system.
 * Author: Barun
 * Text Domain: CBP
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

define('CBP_PLUGIN_PATH', __FILE__);
$plugin_path = dirname(CBP_PLUGIN_PATH);

// Enqueue Style & JS
require_once($plugin_path.'/enqueue.php');
add_action('wp_enqueue_scripts', 'cbp_enqueue_styles');

// Register Product Post Type
require_once($plugin_path.'/inc/post_types/register_product.php');
add_action('init', 'register_product_type');

// Show Product with Shortcode
require_once($plugin_path.'/inc/show_c_products/show_c_products.php');
add_shortcode( 'show_c_product_coaching', 'show_c_products' );

// Show Cart with Shortcode
require_once($plugin_path.'/inc/show_c_cart/show_c_cart.php');
add_shortcode( 'show_c_product_cart', 'show_c_cart' );

// Add to Cart 
require_once($plugin_path.'/process/add_to_c_cart.php');
add_action('wp_ajax_save_to_cart', 'add_to_c_cart');

// Remove from Cart 
require_once($plugin_path.'/process/delete_from_c_cart.php');
add_action('wp_ajax_delete_from_c_cart', 'delete_from_c_cart');

// Activate
require_once($plugin_path.'/activate.php');
register_activation_hook(__FILE__, 'activate_this_plugin' );

// Deactive

// Uninstall