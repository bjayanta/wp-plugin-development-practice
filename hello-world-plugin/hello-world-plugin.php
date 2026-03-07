<?php
/**
 * Plugin Name: Hello World
 * Description: A simple plugin that displays "Hello World" on the frontend.
 * Version: 1.0.0
 * Author: Jayanta Biswas
 * Author URI: https://jayanta.dev
 */

if(!defined('ABSPATH')) exit;

function hello_world_plugin() {
    echo "<h1 style='text-align:center;color:blue;'>Hello World!</h1>";
}

add_action('wp_footer', 'hello_world_plugin');