<?php

function add_testimonial_page(){
    $postarr =[
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_title' => 'Testimonial Frontend Form',
        'post_content' => '[add_testimonial_form]'
    ];
    
    wp_insert_post( $postarr, true );
}
