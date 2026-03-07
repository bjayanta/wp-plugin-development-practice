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
function simple_greeting_plugin_display_greeting($content) {
    $hour = date('G');
    $greeting = '';

    if ($hour < 12) {
        $greeting = 'Good morning!';
    } elseif ($hour < 18) {
        $greeting = 'Good afternoon!';
    } else {
        $greeting = 'Good evening!';
    }

    return $greeting . ' ' . $content;
}
add_filter('the_content', 'simple_greeting_plugin_display_greeting');
