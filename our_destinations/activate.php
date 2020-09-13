<?php
function ods_activate_plugin(){
    
    register_our_destinations();
    flush_rewrite_rules();
}