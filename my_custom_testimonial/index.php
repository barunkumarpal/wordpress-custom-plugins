<?php 
/*
* Plugin Name: My Custom Testimonial
* Author Name: Barun
* Version: 1.0
* Description: This plugins adds features to add testimonials from the front-end
* Text Domain: MCT
*/

if(!defined('ABSPATH')){
    exit;
}
if(!function_exists('add_action')){
    exit;
}
// Plugin Path
define('MCT_PLUGIN_URL', __FILE__);
$plugin_path = dirname(MCT_PLUGIN_URL);

// Add JS
require_once('inc/plugin_scripts.php');
add_action( 'wp_enqueue_scripts', 'mct_plugin_enqueue_scripts', 100 );

// Register Custom Post Type
require_once('inc/custom-post-type.php');
add_action('init', 'register_custom_testimonial');

// Add Page
require_once('inc/create_page_with_shortcode.php');

// Add Shortcode
require_once('inc/testimonial_frontend_form.php');
add_shortcode( 'add_testimonial_form', 'add_testimonial_frontend' );

// AJAX Create Testimonial
require_once('process/create_testimonial.php');
add_action('wp_ajax_create_testimonial', 'mct_create_testimonial');

// Activate
require_once('activate.php');
register_activation_hook(__FILE__, 'mct_activate_plugin');




