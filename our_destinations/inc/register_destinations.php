<?php
function register_our_destinations(){

    // Register Taxonomy 
    $lables = [
        'name' => 'Locations',
        'singular_name' => 'Location',
        'search_items' => 'Search Location',
        'all_items' => 'All Locations',
        'edit_item' => 'Edit Location',
        'view_item' => 'View Location',
        'add_new' => 'Add New Location',
        'add_new_item' => 'Add New Location',        
        'new_item_name' => 'New Location',        
        'not_found' => 'No Location Found'
    ];

    $args = [
        'label' => 'Locations',
        'lables' => $lables,
        'public' => true,
        'hierarchical' => true,

    ];
    register_taxonomy( 'location', 'destination', $args);


    $lables =[
        'name' => 'Destinations',
        'singular_name' => 'Destination',
        'add_new' => 'Add New Destination',
        'add_new_item' => 'Add New Destination',
        'edit_item' => 'Edit Destination',
        'new_item' => 'Add New Destination',
        'all_items' => 'All Destinations',
        'not_found' => 'No Destination Found'
    ];

    $args=[
        'label' => 'Destinations',
        'labels' => $lables,
        'public' => true,
        'hierarchical' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ],
        'taxonomies'  => array( 'location' ),
        'has_archive'   => true,
        'menu_icon' => 'dashicons-admin-site-alt'
    ];

    register_post_type( 'destination', $args );


    
}