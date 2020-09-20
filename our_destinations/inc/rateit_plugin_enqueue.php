<?php
function enqueue_rateit_plugin(){
    wp_enqueue_style( 'rateit_css', plugins_url( '/rateit_plugin/rateit.css', ODS_PLUGIN_URL ));

    // wp_enqueue_script( 'rateit_min_js', plugins_url( '/rateit_plsdfugin/jsdquery.rateitf.min.js', ODS_PLUGIN_URL ), ['Jquery'], '1.0.0', true );

    wp_register_script('rateit_min_js', plugins_url('/rateit_plugin/jquery.rateit.min.js', ODS_PLUGIN_URL),
    ['jquery'], '1.0.0', true );
    wp_enqueue_script('rateit_min_js');

    wp_enqueue_script( 'custom_js_rateit', plugins_url('/custom.js', ODS_PLUGIN_URL), ['jquery'], '1.0.0', true );

    // wp_register_script( 'custom_js_rateit', plugins_url( '/custom.js', ODS_PLUGIN_URL ), ['Jquery'], '1.0.0', true );
    // wp_enqueue_script('custom_js_rateit');
    wp_localize_script( 'custom_js_rateit', 'dest_ajax_obj', [
        'ajax_url' => admin_url('admin-ajax.php')
    ] );
}