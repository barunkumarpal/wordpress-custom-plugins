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

// Add Rating
require_once($plugin_path.'/inc/add_rating_meta.php');
add_action('save_post_destination', 'add_rating_meta_destination', 10, 3 );

// Show Rating Star
require_once($plugin_path.'/inc/add_star_for_rating.php');
add_filter('the_content', 'add_star_for_rating');

// Add Rating Plugin
require_once($plugin_path.'/inc/rateit_plugin_enqueue.php');
add_action( 'wp_enqueue_scripts', 'enqueue_rateit_plugin', 100);

// Save Rating
require_once($plugin_path.'/inc/process/save_the_rating.php');
add_action('wp_ajax_save_the_rating', 'save_the_rating_process');

// Create Table for Rating
require_once($plugin_path.'/inc/create_table_for_rating.php');

// Activate
require_once('activate.php');
register_activation_hook(__FILE__, 'ods_activate_plugin');

