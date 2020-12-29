<?php
/**
 * Plugin Name: Custom Portfolio
 * Description: This plugin has the ability to give you a few tabs to showcase your portfolio with categoriezed tabs.
 * Author: Barun
 * Author URI: http://developerbarun.byethost8.com
 * Text Domain: CPB
 * Version: 1.0.0
 */
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

define('CPB_PLUGIN_PATH', __FILE__);
$plugin_path = dirname(CPB_PLUGIN_PATH);

// Enqueue Style & JS
require_once($plugin_path.'/enqueue.php');
add_action('wp_enqueue_scripts', 'cpb_enqueue');

// Show Product with Shortcode
require_once($plugin_path.'/inc/show_portfolio_tabs.php');
add_shortcode( 'show_portfolio_tabs', 'show_portfolio_tabs' );

// Add ACF Option
require_once($plugin_path.'/inc/add_acf_option_page.php');


// Activate
require_once('activate.php');
register_activation_hook(__FILE__, 'cpb_activate_plugin');
