<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}

function cwpl_customize_register($wp_customize){
    // Panel Option
    $wp_customize->add_panel(
        'cwpl_plugin_panel', 
        array(
            'title' => __( 'Custom WP Logout Options', 'cwpl' ),   
            'description' => '<p>Custom WP Logout Options</p>',         
            'priority' => 160
          )
    );

    // Section Option
    cwpl_customizer_sectons($wp_customize);


    // Setting
    cwpl_customizer_settings($wp_customize);
}