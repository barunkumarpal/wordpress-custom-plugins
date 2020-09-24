<?php
function activate_this_plugin(){

    // Flush Product Type Slug
    register_product_type();
    flush_rewrite_rules();
}