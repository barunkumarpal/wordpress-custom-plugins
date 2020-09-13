<?php

/**
 * Plugin Name: Our Destinations
 * Description: Listings of Destinations we Travel at the lowest cost. It has rating facility avilable by the users.
 * Version: 1.0.0
 * Author: Barun
 * Text Domain: ODS
*/

if(!defined('ABSPATH')){
    die();
    exit;
}

if(!function_exists('add_action')){
    exit;
    die();
}

// Plugin Path
define('ODS_PLUGIN_URL', __FILE__);
$plugin_path = dirname(ODS_PLUGIN_URL);

// Register Taxonomy for Destination Post Type
// Register Post Type
require_once($plugin_path.'/inc/register_destinations.php');
add_action('init', 'register_our_destinations');


// Activate
require_once('activate.php');
register_activation_hook(__FILE__, 'ods_activate_plugin');

