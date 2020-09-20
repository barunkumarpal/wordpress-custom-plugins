<?php
/* 
Plugin Name: My Custom Widget One
Version: 1.0.0
Description: Testing to create my custom widget
Author: Barun
Text Domain: mcw
*/

if( !defined('ABSPATH')){
    die;
}

if(!function_exists('add_action')){
    exit;
}



// Plugin Path
define('MCW_PLUGIN_URL', __FILE__);

$plugin_path = dirname(MCW_PLUGIN_URL);

// Create Widget
include( $plugin_path.'/includes/widgets.php');
include( $plugin_path.'/widgets/widget-one.php');

add_action('widgets_init', 'mcw_widgets_init');

// Activate
include('activate.php');
register_activation_hook(__FILE__, 'mcw_activate_plugin');

// Deactivate
include('deactivate.php');
register_deactivation_hook(__FILE__, 'mcw_deactivate_plugin');

// Daily grab post hook
include( $plugin_path.'/process/daily-grab-post.php');
include( $plugin_path.'/includes/cron.php');
add_action('mcw_daily_grab_post', 'mcw_daily_run_grab_post');