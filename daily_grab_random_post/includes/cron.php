<?php
function mcw_daily_run_grab_post(){
    set_transient( 
        'daily_grab_post', 
        daily_grab_random_post() ,
        DAY_IN_SECONDS
    );
}