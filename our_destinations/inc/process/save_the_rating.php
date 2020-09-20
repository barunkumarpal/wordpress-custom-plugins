<?php

function save_the_rating_process(){
    global $wpdb;

    $output = ['status' => 0 ];

    $post_ID = absint($_POST['rid']);
    $rating = round($_POST['rating'], 1);
    $user_IP = $_SERVER['REMOTE_ADDR'];

    $rating_count = $wpdb->get_var(
        "SELECT COUNT(*) FROM `".$wpdb->prefix."dest_rating`
        WHERE dest_post_id='".$post_ID."' AND user_ip='".$user_IP."'"
    );

    if($rating_count > 0){
        wp_send_json($output);
    }

    $wpdb->insert(
        $wpdb->prefix.'dest_rating',
        [
            'dest_post_id' => $post_ID,
            'rating' => $rating,
            'user_ip' => $user_IP
        ],
        [
            '%d', '%f', '%s'
        ]
    );

    // Rating Count
    $rating_data = get_post_meta( $post_ID, 'rating_meta_data', true);
    $rating_data['rating_count']++;

    // Avarage all Rating
    $rating_data['rating'] = round($wpdb->get_var(
        "SELECT AVG(`rating`) FROM `".$wpdb->prefix."dest_rating`
        WHERE dest_post_id='".$post_ID."'"
    ), 1);

    $output['rating'] = $rating_data;
    // Updata Post Meta Data for Rating
    update_post_meta($post_ID, 'rating_meta_data', $rating_data);

    $output['status'] = 1;

    wp_send_json($output);
}