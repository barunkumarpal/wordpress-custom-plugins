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
function show_portfolio_tabs(){
   require_once('tab_content.php');
}