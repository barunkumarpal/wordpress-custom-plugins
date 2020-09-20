<?php

function mcw_activate_plugin(){
    wp_schedule_event( time(), 'daily', 'mcw_daily_grab_post' );
}