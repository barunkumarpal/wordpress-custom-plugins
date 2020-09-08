<?php
function mct_plugin_enqueue_scripts(){
    wp_enqueue_script('main_js_mct', plugins_url( '/js/main_js.js', MCT_PLUGIN_URL ), ['jquery'], '1.0.0', true);

    wp_enqueue_style( 'main_style_mct', plugins_url( '/css/main_style.css', MCT_PLUGIN_URL ), [], '1.0.0', 'all' );

    wp_localize_script( 'main_js_mct', 'mct_plugin_ajax_obj', [
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ] );
}