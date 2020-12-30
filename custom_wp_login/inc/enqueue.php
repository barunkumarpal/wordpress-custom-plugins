<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}

function cwps_enqueue_styles(){
    wp_enqueue_style( 'cwpl_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css');
    wp_enqueue_style( 'cwpl_custom_css', plugins_url('assets/custom.css', CWPL_PLUGIN_PATH) );



    wp_enqueue_script( 'cwpl_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', [], '4.4.1', true );
    wp_enqueue_script( 'cwpl_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', [], '3.4.1', true );
    wp_enqueue_script( 'cwpl_custom_js', plugins_url('assets/custom.js', CWPL_PLUGIN_PATH), ['cwpl_jquery'], '1.0.0', true );

    wp_localize_script( 'cwpl_custom_js', 'cwpl_wp_ajax_obj', [
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ] );
}