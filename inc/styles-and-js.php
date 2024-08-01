<?php
function enqueue_scripts() {
    // Enqueue CSS
    $cssFileURI = get_template_directory_uri() . '/assets/css/main-v2.css';
    wp_enqueue_style('main_css', $cssFileURI);
	
	$cssFileURI = get_template_directory_uri() . '/page-template-lg/page-revascularizacion.css';
    wp_enqueue_style('revascularizacion_css', $cssFileURI);
	
	$cssFileURI = get_template_directory_uri() . '/assets/css/slick.css';
    wp_enqueue_style('slick_css', $cssFileURI);
	
	$cssFileURI = get_template_directory_uri() . '/assets/css/slick-theme.css';
    wp_enqueue_style('slick_theme_css', $cssFileURI);
 
    // Enqueue jQuery
    wp_enqueue_script('jquery');
 
    // Enqueue slick.min.js
    $version = '1.0.0'; // Puedes ajustar la versión según necesites
    $slickFileURI = get_template_directory_uri() . '/assets/js/slick.min.js';
    wp_register_script('slickmin', $slickFileURI, array('jquery'), $version, true);
    wp_enqueue_script('slickmin');
 
    // Enqueue main-v2.js
    $jsFileURI = get_template_directory_uri() . '/assets/js/main-v2.js';
    wp_enqueue_script('main_js', $jsFileURI, array('jquery', 'slickmin'), null, true);
 
    // Localize Script
    wp_localize_script('main_js', 'lm_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
 
add_action('wp_enqueue_scripts', 'enqueue_scripts');