<?php
/**
 * Plugin Name: Hello World
 * Description: A simple plugin that displays "Hello World" on the frontend.
 * Version: 1.0.0
 * Author: Jayanta Biswas
 * Author URI: https://jayanta.dev
 */

if(!defined('ABSPATH')) exit;

// Admin Notice
// Admin Dashboard Notice
add_action('admin_notices', 'hw_show_message');

function hw_show_message() {
    echo "<div class='notice notice-success'>";
    echo "<p>Hello World Plugin is Active</p>";
    echo "</div>";
}

function hello_world_plugin() {
    echo "<h1>Hello World</h1>";
}

add_action('wp_footer', 'hello_world_plugin');