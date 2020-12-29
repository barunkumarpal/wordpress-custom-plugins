<?php
if(!defined('ABSPATH')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
    die;
}
if(!function_exists('add_action')){
    exit('Direct access not allowed');
    die('Direct access not allowed');
    die;
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Portfolio',
		'menu_title'	=> 'Portfolio Options',
		'menu_slug' 	=> 'act-option-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Add/Edit/Delete Portfolio',
		'menu_title'	=> 'All Portfolio',
		'parent_slug'	=> 'act-option-settings',
	));	
	
	
}