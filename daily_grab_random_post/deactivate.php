<?php
function mcw_deactivate_plugin(){
    wp_clear_scheduled_hook( 'mcw_daily_grap_post' );
}