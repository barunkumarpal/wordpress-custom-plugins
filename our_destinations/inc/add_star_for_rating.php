<?php

function add_star_for_rating( $content ){ 

    if(is_singular('destination')){       
    

    global $post, $wpdb;

    $rating_meta = get_post_meta( $post->ID, 'rating_meta_data', true);
    $rating_html = file_get_contents('destination_rating_html.php', true );
    
    $rating_html = str_replace('RATING', 'Rating', $rating_html);
    $rating_html = str_replace('POST_ID', $post->ID, $rating_html);
    $rating_html = str_replace('POST_RATE_AVG', $rating_meta['rating'], $rating_html);

    // Set Readonly property in the html
    $user_IP = $_SERVER['REMOTE_ADDR'];

    $rating_count = $wpdb->get_var(
        "SELECT COUNT(*) FROM `".$wpdb->prefix."dest_rating`
        WHERE dest_post_id='".$post->ID."' AND user_ip='".$user_IP."'"
    );

    if($rating_count > 0){
        $rating_html = str_replace('READONLY_PLACEHOLDER', 'data-rateit-READONLY="true"', $rating_html);
    }else{
        $rating_html = str_replace('READONLY_PLACEHOLDER', '', $rating_html);
    }
    
    return $rating_meta['rating_count'].$rating_html.$content;

    }

    return $content;
}