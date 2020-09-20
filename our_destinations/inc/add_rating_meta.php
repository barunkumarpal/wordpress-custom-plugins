<?php
function add_rating_meta_destination($post_id, $post, $update){

    $meta_data = get_post_meta($post_id, 'rating_meta_data', true); // Checking this post is a new post or old one which already has metadata of rating.
    $meta_data = empty($meta_data) ? []: $meta_data;
   
    $meta_data['rating'] = isset($meta_data['rating']) ? absint($meta_data['rating']) : 0;
    $meta_data['rating_count'] = isset($meta_data['rating_count'])?absint($meta_data['rating_count']) : 0;
    
    update_post_meta($post_id, 'rating_meta_data', $meta_data);
    
}
    