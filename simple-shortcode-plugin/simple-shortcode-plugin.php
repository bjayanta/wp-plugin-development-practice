<?php

/**
 * Plugin Name: Simple Shortcode Plugin
 * Description: Get current user details
 * Version: 1.0
 * Author: Jayanta
 */

add_shortcode('user_info', 'get_user_info');

function get_user_info($attrs) {
    $output = '';

    // Merge default attributes with user-provided attributes
    $attrs = shortcode_atts([
        'field' => 'name',
    ], $attrs);

    // Get current user object
    $current_user = wp_get_current_user();

    if($attrs['field'] === 'name') {
        $output = $current_user->display_name;
    }

    if($attrs['field'] === 'email') {
        $output = $current_user->user_email;
    }

    // Return user details
    return '<h3>'.$output.'</h3>';
}
