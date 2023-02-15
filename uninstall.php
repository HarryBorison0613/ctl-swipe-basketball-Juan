<?php
    global $wpdb;

    $wpdb->query( "DELETE FROM " . $wpdb->prefix .
        "ctl_arcade_games WHERE game_plugin_dir = 'ctl-swipe-basketball'");
    $wpdb->query( "DELETE FROM " . $wpdb->prefix .
        "ctl_arcade_scores WHERE game_plugin_dir = 'ctl-swipe-basketball'");
    $wpdb->query( "DELETE FROM " . $wpdb->prefix .
        "ctl_arcade_ratings WHERE game_plugin_dir = 'ctl-swipe-basketball'");

    delete_option('ctl-swipe-basketball_do_activation_redirect');