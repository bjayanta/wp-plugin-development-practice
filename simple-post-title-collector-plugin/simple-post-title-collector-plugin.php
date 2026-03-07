<?php
/*
Plugin Name: Simple Post Title Collector Plugin
Description: Collect all posts title and display them in a list
Version: 1.0
Author: Jayanta
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Register shortcode
// add_shortcode('list-posts-title', 'simple_post_title_collector_plugin_shortcode');
add_shortcode('list-posts-title', 'sp_handle_list_posts_wp_query_class');

function simple_post_title_collector_plugin_shortcode() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'posts';
    $posts = $wpdb->get_results("SELECT post_title FROM $table_name WHERE post_type = 'post' AND post_status = 'publish'");
    $outputHtml = "No posts found";

    if(count($posts) > 0) {
        $outputHtml = "<ul>";

        foreach($posts as $post) {
            $outputHtml .= "<li>" . $post->post_title . "</li>";
        }

        $outputHtml .= "</ul>";
    }

    return $outputHtml;
}

function sp_handle_list_posts_wp_query_class($attrs) {
    $attrs = shortcode_atts([
        'number' => 4
    ], $attrs, 'list-posts-title');

    $query = new WP_Query([
        'posts_per_page' => $attrs['number'],
        'post_type' => 'post',
        'post_status' => 'publish',
    ]);

    $outputHtml = "No posts found";

    if($query->have_posts()) {
        $outputHtml = "<ul>";

        while($query->have_posts()) {
            $query->the_post();
            $outputHtml .= '<li id="' . get_the_ID() . '">';
            $outputHtml .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
            $outputHtml .= '</li>';
        }

        $outputHtml .= "</ul>";
    }
    

    return $outputHtml;
}