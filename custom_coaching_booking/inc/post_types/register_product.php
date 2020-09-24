<?php
function register_product_type(){
// Register Taxonomy 
$lables = [
    'name' => 'Product Types',
    'singular_name' => 'Product Type',
    'search_items' => 'Search Product Type',
    'all_items' => 'All Product Types',
    'edit_item' => 'Edit Product Type',
    'view_item' => 'View Product Type',
    'add_new' => 'Add New Product Type',
    'add_new_item' => 'Add New Product Type',        
    'new_item_name' => 'New Product Type',        
    'not_found' => 'No Product Type Found'
];

$args = [
    'label' => 'Product Types',
    'lables' => $lables,
    'public' => true,
    'hierarchical' => true,

];
register_taxonomy( 'Product Type', 'booking', $args);


$lables =[
    'name' => 'Coachings',
    'singular_name' => 'Coaching',
    'add_new' => 'Add New Coaching',
    'add_new_item' => 'Add New Coaching',
    'edit_item' => 'Edit Coaching',
    'new_item' => 'Add New Coaching',
    'all_items' => 'All Coachings',
    'not_found' => 'No Coaching Found'
];

$args=[
    'label' => 'Coachings',
    'labels' => $lables,
    'public' => true,
    'hierarchical' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'supports' => [
        'title',
        'editor',        
        'thumbnail'
    ],
    'taxonomies'  => array( 'Product Type' ),
    'has_archive'   => true,
    'menu_icon' => 'dashicons-admin-users'
];
    register_post_type('c_product', $args);
}