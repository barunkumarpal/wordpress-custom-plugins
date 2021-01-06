<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
}

function cwpl_external_menus($items, $args){
    $menu_location = get_theme_mod('cwpl_all_menu_locations');

    if($args->theme_location == $menu_location){
        // $new_link = "<li>".wp_loginout( site_url(), false )."</li>";

        if(!is_user_logged_in()){
            $cwpl_logout_url = get_theme_mod('cwpl_logout_setting');
            $cwpl_logout_url = site_url().$cwpl_logout_url;

            if(!empty($cwpl_logout_url)){
                $new_link = "<li><a href='$cwpl_logout_url'>Signin</a></li>";
                return $items.$new_link;
            }else{
                return $items;
            }
        }else{
            $new_link = "<li><a href='".wp_logout_url()."'>Logout</a></li>";
            return $items.$new_link;
        }
    }

    return $items;
}