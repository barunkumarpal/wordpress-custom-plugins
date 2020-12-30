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
    $wp_customize->add_section( 
        'cwpl_plugin_panel_section', 
        array(
            'title' => __( 'Logout Url' ),            
            'panel' => 'cwpl_plugin_panel',
            'priority' => 160,        
        ) );


    // Setting
    $wp_customize->add_setting(
        'cwpl_logout_setting',
        [
            'transport' => 'postMessage', // or refresh
        ]
    );

    // Control
    $wp_customize->add_control( 
        'control_id', 
        array(
            'label' => __( 'Logout Url', 'cwpl' ),
            'type' => 'text',            
            'section' => 'cwpl_plugin_panel_section',          
            'settings' => 'cwpl_logout_setting'
        )
    );
}