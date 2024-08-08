<?php
function enqueue_scripts() {
    // Enqueue CSS
    $mainFileURI = get_template_directory_uri() . '/assets/css/main-v2.css';
    wp_enqueue_style('main_css', $mainFileURI);
	
	$revascularizacionFileURI = get_template_directory_uri() . '/page-template-lg/page-revascularizacion.css';
    wp_enqueue_style('revascularizacion_css', $revascularizacionFileURI);

    // TODO
    $pages          = array('cardio-u-nosotros', 'cardio-u-inicio', 'cardio-u-escuelas');
    $pagesTemplates = array(
        'page-template-lg/page-cardio-u-cursos.php', 
        'page-template-lg/page-cardio-u-escuelas.php',
        'page-template-lg/page-cardio-u-incio.php',
        'page-template-lg/page-cardio-u-nosotros.php'
    );

    if(is_page($pages) || is_page_template($pagesTemplates)) {
        $cardioUCssFileURI = get_template_directory_uri() . '/page-template-lg/page-cardio-u.css';
        wp_enqueue_style('cardioU_css', $cardioUCssFileURI);
    }
	
	$slickFileURI = get_template_directory_uri() . '/assets/css/slick.css';
    wp_enqueue_style('slick_css', $slickFileURI);
	
	$slickThemecssFileURI = get_template_directory_uri() . '/assets/css/slick-theme.css';
    wp_enqueue_style('slick_theme_css', $slickThemecssFileURI);
 
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

    if(is_page($pages) || is_page_template($pagesTemplates)) {
        $cardioUJsFileURI = get_template_directory_uri() . '/page-template-lg/page-cardio-u.js';
        wp_register_script('cardioU_js', $cardioUJsFileURI, array('jquery'), $version, true);
        wp_enqueue_script('cardioU_js');
    }
 
    // Localize Script
    wp_localize_script('main_js', 'lm_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
 
add_action('wp_enqueue_scripts', 'enqueue_scripts');