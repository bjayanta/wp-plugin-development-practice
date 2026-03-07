<?php
/**
 * Plugin Name: Simple Content Restriction Plugin
 * Description: Restrict content to logged-in users
 * Version: 1.0.0
 * Author: Jayanta
 */

// Check security
if(!defined('ABSPATH')) exit;

// Add shortcode
add_shortcode('private_content', 'private_content_shortcode');

function private_content_shortcode($atts, $content = null) {
    // Set default attributes
    $attrs = shortcode_atts([
        'message' => 'You must be logged in to view this content. Please ',
    ], $atts);

    // Check if user is logged in
    if (!is_user_logged_in()) {
        // Get login URL
        $login_url = wp_login_url(get_permalink());

        return '<div style="color: red;">' 
            . esc_html($attrs['message']) 
            . '<a href="' . esc_url($login_url) . '">Login</a>'
            . '</div>';
    }

    // Return content if user is logged in
    return '<div style="color: green;">'. $content . '</div>';
}
