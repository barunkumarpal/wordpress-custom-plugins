<?php
function mct_activate_plugin(){
    register_custom_testimonial();
    flush_rewrite_rules();

    // Create Page with the Given Shortcode
    add_testimonial_page();
}