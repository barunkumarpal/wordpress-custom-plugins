<?php
/**
 * Plugin Name: Custom WP User Registration
 * Description: This plugin has the ability to give you a custom user registration page choosen by you.
 * Author: Barun
 * Author URI: http://developerbarun.byethost8.com
 * Text Domain: CWPUR
 * Version: 1.0.0
 */
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}
if(!function_exists('add_action')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}

define('CWPUR_PLUGIN_PATH', __FILE__);
$plugin_path = dirname(CWPUR_PLUGIN_PATH);

// Enqueue style
require_once($plugin_path.'/inc/enqueue.php');
add_action('wp_enqueue_scripts', 'cwpur_enqueue_styles');

// Custom Registration Url
require_once($plugin_path.'/inc/custom_register_url.php');
add_action('init', 'custom_register_url');


// Create Registration Form Shortcode
require_once($plugin_path.'/inc/custom_registraion_form_shortcode.php');

add_shortcode( 'custom_registration_form', 'custom_registraion_form_shortcode' );

// Login using AJAX
require_once($plugin_path.'/inc/cwpl_custom_registration_do.php');
add_action('wp_ajax_nopriv_cwpur_register', 'cwpl_custom_registration_do');


// Customizer for Logout Url
include($plugin_path.'/customizer/settings/logout_url_settings.php');
include($plugin_path.'/customizer/sections.php');
include($plugin_path.'/customizer/customizer.php');
add_action('customize_register','cwpur_customize_register');