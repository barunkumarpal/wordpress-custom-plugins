<?php
function ods_activate_plugin(){
    
    register_our_destinations();
    flush_rewrite_rules();

    // Create Table for Rating
    create_table_for_rating();
}