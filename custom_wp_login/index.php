<?php
/**
 * Plugin Name: Custom WP Login
 * Description: This plugin has the ability to give you a custom login page choosen by you.
 * Author: Barun
 * Author URI: http://developerbarun.byethost8.com
 * Text Domain: CWPL
 * Version: 1.0.0
 * Text Doman: cwpl
 */
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}
if(!function_exists('add_action')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}

define('CWPL_PLUGIN_PATH', __FILE__);
$plugin_path = dirname(CWPL_PLUGIN_PATH);

// Custom Login Url on Logout
require_once($plugin_path.'/inc/custom_logout_url.php');
add_action('wp_logout', 'custom_logout_url');

// Enqueue style
require_once($plugin_path.'/inc/enqueue.php');
add_action('wp_enqueue_scripts', 'cwps_enqueue_styles');


// Create Login Form Shortcode
require_once($plugin_path.'/inc/custom_login_form_shortcode.php');

add_shortcode( 'custom_login_form', 'custom_login_form_shortcode' );

// Login using AJAX
require_once($plugin_path.'/inc/cwpl_custom_login_do.php');
add_action('wp_ajax_nopriv_cwpl_login', 'cwpl_custom_login_do');


// Customizer for Logout Url
include($plugin_path.'/customizer/settings/logout_url_settings.php');
include($plugin_path.'/customizer/sections.php');
include($plugin_path.'/customizer/customizer.php');
add_action('customize_register','cwpl_customize_register');