<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}

function cwpur_customize_register($wp_customize){
    // Panel Option
    $wp_customize->add_panel(
        'cwpur_user_register_panel', 
        array(
            'title' => __( 'Custom WP User Registration Options', 'CWPUR' ),   
            'description' => '<p>Custom WP User Registration Options</p>',         
            'priority' => 160
          )
    );

    // Section Option
    $wp_customize->add_section( 
        'cwpur_plugin_panel_section', 
        array(
            'title' => __( 'User Registration Url' ),            
            'panel' => 'cwpur_user_register_panel',
            'priority' => 160,        
        ) );


    // Setting
    $wp_customize->add_setting(
        'cwpur_user_register_setting',
        [
            'transport' => 'postMessage', // or refresh
        ]
    );

    // Control
    $wp_customize->add_control( 
        'user_register_id', 
        array(
            'label' => __( 'User Registration Url', 'CWPUR' ),
            'type' => 'text',            
            'section' => 'cwpur_plugin_panel_section',          
            'settings' => 'cwpur_user_register_setting'
        )
    );


// Registratio Button Location Select

$choices_array = get_registered_nav_menus();

    // Setting
    $wp_customize->add_setting(
        'cwpur_user_register_location',
        [
            // 'transport' => 'postMessage', // or refresh
            'default'    => 'primary'
        ]
    );

    // Control
    $wp_customize->add_control( 
        'user_register_menu_location_id', 
        array(
            'label' => __( 'Registration Button Menu Location', 'CWPUR' ),
            'type' => 'select',            
            'section' => 'cwpur_plugin_panel_section',          
            'settings' => 'cwpur_user_register_location',
            'choices' => $choices_array // Associative Array ['key' => 'value']
        )
    );
}