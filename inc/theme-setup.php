<?php

/* 
*   Configuración tema
*/

if ( ! function_exists('themelacardio_setup')) {
    function themelacardio_setup()
    {
        if (function_exists('add_theme_support')) {
            add_theme_support('custom-logo'); // Soporte para logo
        }
    }
}
add_action('after_setup_theme', 'themelacardio_setup');

/* 
*   Habilitación de menu
*/
function slacip_menus()
{
    register_nav_menus(array(
        'menu-principal' => 'Menu Principal',
    ));
}
add_action('init', 'slacip_menus');

/* Menu Escritorio */
class Custom_Nav_Walker extends Walker_Nav_Menu {
    // Almacena la imagen del elemento de menú actual
    private $current_item_image = ''; 

    // Función para comenzar un nivel de menú
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $classes = array('sub-menu-nivel-' . $depth);
        $class_names = join(' ', $classes);
        $output .= "\n$indent<div class=\"$class_names\">\n";
        $output .= "$indent<ul class=\"$class_names-wrapper\">\n";

        // Inserta la imagen del primer nivel en el sub-menú de nivel 0
        if ($depth === 0 && !empty($this->current_item_image)) {
            $output .= "$indent<li class=\"sub-menu-img\"><img src=\"{$this->current_item_image}\" alt=\"Menu Image\"></li>\n";
        }

        // Agrega el título si es el nivel 1 o 2 o 3
        if ($depth == 1 || $depth == 2 || $depth == 3) {
            $output .= "$indent<li class=\"link $class_names-title\">$args->item_title</li>\n";
        }
    }

    // Función para finalizar un nivel de menú
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
        $output .= "$indent</div>\n";
    }

    // Función para comenzar un elemento de menú
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Resetea la imagen del primer nivel si estamos comenzando a procesar el primer nivel
        if ($depth === 0) {
            $this->current_item_image = ''; // Resetea para cada elemento de nivel superior
        }

        $atts = array(
            'title' => !empty($item->attr_title) ? $item->attr_title : '',
            'target' => !empty($item->target) ? $item->target : '',
            'rel' => !empty($item->xfn) ? $item->xfn : '',
            'href' => !empty($item->url) ? $item->url : '',
        );
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // Comprueba si el elemento de menú tiene hijos
        $has_submenu_class = '';
        $menu_items = wp_get_nav_menu_items($args->menu);
        foreach ($menu_items as $menu_item) {
            if ($menu_item->menu_item_parent == $item->ID) {
                $has_submenu_class = ' has-submenu';
                break;
            }
        }

        // Obtener el valor del campo ACF 'menu_imagen'
        $menu_image = get_field('menu_imagen', $item);
        if (!empty($menu_image) && $depth === 0) {
            $this->current_item_image = $menu_image; // Guarda la imagen para uso en sub-menús
        }

        $item_output = $args->before;
        $item_output .= $indent . '<li class="link' . $has_submenu_class . '">';

        $item_output .= '<span class="icon-blanco"></span>';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= '</li>';
        $item_output .= $args->after;

        // Guardamos el título del elemento de menú en una variable
        $args->item_title = $item->title;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/* Menu Mobile */
class Custom_Nav_Walker_Mobile extends Walker_Nav_Menu {
    // Función para comenzar un nivel de menú
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $classes = array('sub-menu-mobile-nivel-' . $depth);
        $class_names = join(' ', $classes);
        $output .= "\n$indent<div class=\"$class_names\">\n";
        $output .= "$indent<ul class=\"$class_names-wrapper\">\n";

        // Agrega el título si es el nivel 1 o 2 o 3
        if ($depth == 0 || $depth == 1 || $depth == 2 || $depth == 3) {
            $output .= "$indent<li class=\"link $class_names-title\">";
            $output .= "<span class='icon-rojo'></span>";
            $output .= "$args->item_title </li>\n";
        }
    }

    // Función para finalizar un nivel de menú
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
        $output .= "$indent</div>\n";
    }

    // Función para comenzar un elemento de menú
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $atts = array(
            'title' => !empty($item->attr_title) ? $item->attr_title : '',
            'target' => !empty($item->target) ? $item->target : '',
            'rel' => !empty($item->xfn) ? $item->xfn : '',
            'href' => !empty($item->url) ? $item->url : '',
        );
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // Comprueba si el elemento de menú tiene hijos
        $has_submenu_class = '';
        $menu_items = wp_get_nav_menu_items($args->menu);
        foreach ($menu_items as $menu_item) {
            if ($menu_item->menu_item_parent == $item->ID) {
                $has_submenu_class = ' has-submenu-mobile';
                break;
            }
        }

        $item_output = $args->before;
        $item_output .= $indent . '<li class="link' . $has_submenu_class . '">';

        $item_output .= '<span class="icon-rojo"></span>';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= '</li>';
        $item_output .= $args->after;

        // Guardamos el título del elemento de menú en una variable
        $args->item_title = $item->title;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/* 
*   Habilitación subida de SVG
*/
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

/* 
*   Resoluciones de imagenes
*/
function img_setup_theme() {
    add_image_size('custom-size', 423, 519, true); // Normal resolution
    add_image_size('custom-size-2x', 846, 1038, true); // High resolution
}
add_action('after_img_setup_theme', 'setup_theme');

/* 
* Guarda archivos JSON de ACF en la carpeta '/acf-json' dentro del tema activo.
*/
function my_acf_json_save_point( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );

function cptui_register_my_cpts_blog_fellows() {

	/**
	 * Post Type: Blog Fellows.
	 */

	$labels = [
		"name" => esc_html__( "Blog Fellows", "jwm" ),
		"singular_name" => esc_html__( "Blog Fellows", "jwm" ),
	];

	$args = [
		"label" => esc_html__( "Blog Fellows", "jwm" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "blog_fellows", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "blog_fellows", $args );

    register_taxonomy(
        'blog_fellows_category',
        'blog_fellows',
        array(
            'label' => __( 'Categorías' ),
            'rewrite' => array( 'slug' => 'blog_fellows_category' ),
            'hierarchical' => true,
        )
    );
}

add_action( 'init', 'cptui_register_my_cpts_blog_fellows' );

// Función para registrar opciones de personalización
function mi_tema_customize_register($wp_customize) {
    // Sección para el logo secundario
    $wp_customize->add_section('secundary_logo_section', array(
        'title' => __('Logo Secundario', 'mi_tema'),
        'priority' => 30,
    ));

    // Campo para subir la imagen del logo secundario
    $wp_customize->add_setting('secundary_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'secundary_logo', array(
        'label' => __('Subir Logo Secundario', 'mi_tema'),
        'section' => 'secundary_logo_section',
        'settings' => 'secundary_logo',
    )));

    // Campo para ingresar la URL a la que llevará el logo secundario
    $wp_customize->add_setting('secundary_logo_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('secundary_logo_url', array(
        'label' => __('URL del Logo Secundario', 'mi_tema'),
        'section' => 'secundary_logo_section',
        'type' => 'url',
    ));
}
add_action('customize_register', 'mi_tema_customize_register');