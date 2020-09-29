<?php
function register_custom_orders(){
// Register Taxonomy 
// $lables = [
//     'name' => 'Orders',
//     'singular_name' => 'Order',
//     'search_items' => 'Search Order',
//     'all_items' => 'All Orders',
//     'edit_item' => 'Edit Order',
//     'view_item' => 'View Order',
//     'add_new' => 'Add New Product Type',
//     'add_new_item' => 'Add New Product Type',        
//     'new_item_name' => 'New Product Type',        
//     'not_found' => 'No Product Type Found'
// ];

// $args = [
//     'label' => 'Product Types',
//     'lables' => $lables,
//     'public' => true,
//     'hierarchical' => true,

// ];
// register_taxonomy( 'Product Type', 'booking', $args);


$lables =[
    'name' => 'Orders',
    'singular_name' => 'Order',
    'add_new' => 'Add New Order',
    'add_new_item' => 'Add New Order',
    'edit_item' => 'Edit Order',
    'new_item' => 'Add New Order',
    'all_items' => 'All Orders',
    'not_found' => 'No Order Found'
];

$args=[
    'label' => 'Orders',
    'labels' => $lables,
    'public' => true,
    'hierarchical' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'supports' => [
        'title'        
    ],
    // 'taxonomies'  => array( 'Product Type' ),
    'has_archive'   => true,
    'menu_icon' => 'dashicons-editor-table'
];
    register_post_type('c_order', $args);
}