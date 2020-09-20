<?php
function our_dest_add_column(){
    $new_columns = [];

    $new_columns['cb'] = '<input type="chekcbox"/>';
    $new_columns['title'] = 'Title';
    $new_columns['author'] = 'Author';
    $new_columns['categories'] = 'Categories';
    $new_columns['count'] = 'Total People Rated';
    $new_columns['rating'] = 'Average Rating';
    $new_columns['date'] = 'Date';


    return $new_columns;
}


function our_dest_manage_columns($column, $post_id){
    switch($column){
        case 'count':
            $rating_data = get_post_meta($post_id, 'rating_meta_data', true);
            echo isset($rating_data['rating_count']) ? $rating_data['rating_count'] : 0;
            break;
        case 'rating':
            $rating_data = get_post_meta($post_id, 'rating_meta_data', true);
            echo isset($rating_data['rating']) ? $rating_data['rating'] : 'N/A';
            break;
        default:
            break;
    }
}