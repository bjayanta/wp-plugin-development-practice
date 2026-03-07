<?php

/**
 * Plugin Name: Simple Widget Plugin
 * Description: A simple widget plugin to display a widget in the dashboard.
 * Version: 1.0
 * Author: Your Name
 */

add_action('wp_dashboard_setup', 'simple_widget_plugin_display_widget');

function simple_widget_plugin_display_widget() {
    wp_add_dashboard_widget(
        'simple_widget_plugin_display_widget',
        'Simple Widget Plugin',
        'simple_widget_plugin_display_widget_callback'
    );
}

function simple_widget_plugin_display_widget_callback() {
    echo '<p>Simple Widget Plugin is now active.</p>';
}

// Notice
add_action('admin_notices', 'simple_widget_plugin_notice');

function simple_widget_plugin_notice() {
    echo '<div class="notice notice-success is-dismissible">';
    echo '<p>Simple Widget Plugin is now active.</p>';
    echo '</div>';
}
