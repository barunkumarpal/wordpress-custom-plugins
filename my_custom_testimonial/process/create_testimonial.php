<?php
function mct_create_testimonial(){
    $output = ['status' => 0 ];

    if(empty($_POST['title']) && empty($_POST['content'])){
        wp_send_json($output);
    }

    $testimonial_title = sanitize_text_field($_POST['title']);
    $content = wp_kses_post($_POST['content']);
    
    $postarr =[
        'post_type' => 'testimonial',
        'post_status' => 'pending',
        'post_title' => $testimonial_title,
        'post_content' => $content
    ];
    
    wp_insert_post( $postarr, true );

    $output = ['status' => 1 ];

    wp_send_json($output);
}