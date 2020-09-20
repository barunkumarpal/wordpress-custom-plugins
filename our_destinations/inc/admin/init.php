<?php
function out_dest_admin_init(){

    // Filter for Columns
    add_filter('manage_destination_posts_columns', 'our_dest_add_column');

    // Output Data for Custom Admin Columns
    add_action('manage_destination_posts_custom_column', 'our_dest_manage_columns', 10, 2);
}