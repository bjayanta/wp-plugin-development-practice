<?php

/**
 * Plugin Name: Simple Greeting Plugin
 * Description: Displays a greeting message based on the time of day.
 * Version: 1.0
 * Author: Jayanta Biswas
 * Author URI: https://jayanta.dev
 */

// Check security
if (!defined('ABSPATH')) exit;

// Add greeting to the content
function simple_greeting_plugin_display_greeting($attr) {
    $hour = date('G');
    $greeting = '';
    $attr = array_merge([
        'name' => 'Guest'
    ], $attr);

    if ($hour < 12) {
        $greeting = 'Good morning!';
    } elseif ($hour < 18) {
        $greeting = 'Good afternoon!';
    } else {
        $greeting = 'Good evening!';
    }

    return '<h3 style="color: blue;">' . $greeting . ' ' . $attr['name'] . '</h3>';
}

add_shortcode('greeting', 'simple_greeting_plugin_display_greeting');

// Admin notice
add_action('admin_notices', 'simple_greeting_plugin_admin_notice');

function simple_greeting_plugin_admin_notice() {
    echo '<div class="notice notice-success is-dismissible">';
    echo '<p>Simple Greeting Plugin is active.</p>';
    echo '</div>';
}
