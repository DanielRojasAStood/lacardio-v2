<?php
function enqueue_scripts() {
    $cssFileURI = get_template_directory_uri() . '/assets/css/menu.css';
    wp_enqueue_style('main_css', $cssFileURI);

    $jsFileURI = get_template_directory_uri() . '/assets/js/menu.js';
    wp_enqueue_script('main_js', $jsFileURI, null, null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_scripts');