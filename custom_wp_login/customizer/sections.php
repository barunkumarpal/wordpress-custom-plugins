<?php

if(!defined('ABSPATH')){
    exit('Direct access not allowed');
}

function cwpl_customizer_sectons($wp_customize){
    $wp_customize->add_section( 
        'cwpl_plugin_panel_section', 
        array(
            'title' => __( 'Logout Url' ),            
            'panel' => 'cwpl_plugin_panel',
            'priority' => 160,        
        ) );


    
}