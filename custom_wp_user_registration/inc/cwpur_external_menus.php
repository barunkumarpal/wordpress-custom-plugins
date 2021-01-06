<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
}

function cwpur_external_menus($items, $args){
    $menu_location = get_theme_mod('cwpur_user_register_location');

    if($args->theme_location == $menu_location){
        // $new_link = "<li>".wp_loginout( site_url(), false )."</li>";

        if(!is_user_logged_in()){
            $cwpur_register_url = get_theme_mod('cwpur_user_register_setting');
            $cwpur_register_url = site_url().$cwpur_register_url;

            if(!empty($cwpur_register_url)){
                $new_link = "<li><a href='$cwpur_register_url'>Signup</a></li>";
                return $items.$new_link;
            }else{
                return $items;
            }
        }else{
            return $items;
        }
    }

    return $items;
}