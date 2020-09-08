<?php
function register_custom_testimonial(){
    $lables =[
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new' => 'Add New Testimonial',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'Add New Testimonial',
        'all_items' => 'All Testimonials',
        'not_found' => 'No Testimonial Found'
    ];

    $args=[
        'label' => 'Testimonials',
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
        'has_archive'   => true,
        'menu_icon' => 'dashicons-admin-comments'
    ];

    register_post_type( 'testimonial', $args );
}