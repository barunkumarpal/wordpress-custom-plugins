<?php

if(!defined('ABSPATH')){
    exit('Direct access not allowed');
}


function cwpl_customizer_settings($wp_customize){
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


    $wp_customize->add_setting(
        'cwpl_all_logout_setting',
        [
            // 'transport' => 'postMessage', // or refresh
            // 'type' => 'option'
            // 'default'    => '0'
        ]
    );

    // Control
    $wp_customize->add_control( 
        'all_logout_id', 
        array(
            'label' => __( 'Yes', 'cwpl' ),
            'description' => "wp-login url redirect?",
            'type' => 'checkbox',            
            'section' => 'cwpl_plugin_panel_section',          
            'settings' => 'cwpl_all_logout_setting',
            'value'        => '1'
        )
    );


    
}