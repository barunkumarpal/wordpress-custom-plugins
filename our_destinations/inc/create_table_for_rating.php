<?php
function create_table_for_rating(){

    global $wpdb;

    $createSQL = "CREATE TABLE `" . $wpdb->prefix . "dest_rating` (
        `ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `dest_post_id` BIGINT(20) UNSIGNED NOT NULL,
        `rating` FLOAT(3,2) UNSIGNED NOT NULL,
        `user_ip` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=MyISAM ". $wpdb->get_charset_collate() . ";";

    require( ABSPATH . '/wp-admin/includes/upgrade.php' );

    dbDelta($createSQL);
}