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




    // Menu Selection Control

    $choices_array = get_registered_nav_menus();


    $wp_customize->add_setting(
        'cwpl_all_menu_locations',
        [
            // 'transport' => 'postMessage', // or refresh
            // 'type' => 'option'
            'default'    => 'primary'
        ]
    );

    // Control
    $wp_customize->add_control( 
        'all_menu_locations_id', 
        array(
            'label' => __( 'Select Menu to show login button', 'cwpl' ),
            'description' => "Login button to which menu?",
            'type' => 'select',            
            'section' => 'cwpl_plugin_panel_section',                     
            'settings' => 'cwpl_all_menu_locations',
            'choices' => $choices_array // Associative Array ['key' => 'value']
        )
    );



    // Captcha Settings

    $wp_customize->add_setting(
        'cwpl_captcha_option',
        [ 'default'    => 1 ]
    );

    // Control
    $wp_customize->add_control( 
        'cwpl_captcha_option_id', 
        array(
            'label' => __( 'Yes', 'cwpl' ),
            'description' => "Do you want google captcha for login? Users need to verify them as human not a bot. Bots won't be able to login through this process",
            'type' => 'checkbox',            
            'section' => 'cwpl_plugin_panel_section',                     
            'settings' => 'cwpl_captcha_option',
            'value'        => '1'
        )
    );

    // Captcha Site Key

    $wp_customize->add_setting(
        'cwpl_captcha_sitekey',
        []
    );

    // Control
    $wp_customize->add_control( 
        'cwpl_captcha_sitekey_id', 
        array(
            'label' => __( 'Google Re-Captcha Sitekey', 'cwpl' ),
            'description' => "",
            'type' => 'text',            
            'section' => 'cwpl_plugin_panel_section',                     
            'settings' => 'cwpl_captcha_sitekey'            
        )
    );

    // Captcha Secret Key

    $wp_customize->add_setting(
        'cwpl_captcha_secret',
        []
    );

    // Control
    $wp_customize->add_control( 
        'cwpl_captcha_secret_id', 
        array(
            'label' => __( 'Google Re-Captcha Secret-key', 'cwpl' ),
            'description' => "",
            'type' => 'text',            
            'section' => 'cwpl_plugin_panel_section',                     
            'settings' => 'cwpl_captcha_secret'            
        )
    );
    
}