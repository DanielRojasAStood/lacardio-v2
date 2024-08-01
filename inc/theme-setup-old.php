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
    private $current_item_image_data = array();

    // Función para comenzar un nivel de menú
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $classes = array('sub-menu-nivel-' . $depth);
        $class_names = join(' ', $classes);
        $output .= "\n$indent<li class=\"$class_names\">\n";
        $output .= "$indent<ul class=\"$class_names-wrapper\">\n";

        // Inserta la imagen del primer nivel en el sub-menú de nivel 0
        if ($depth === 0 && !empty($this->current_item_image_data)) {
            $output .= "$indent<li class=\"sub-menu-img\"><img src=\"{$this->current_item_image_data['url']}\" width=\"{$this->current_item_image_data['width']}\" height=\"{$this->current_item_image_data['height']}\" alt=\"{$this->current_item_image_data['alt']} - FCI\" title=\"{$this->current_item_image_data['title']}\" ></li>\n";
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
        $output .= "$indent</li>\n";
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
            $this->current_item_image_data = array(
                'url' => $menu_image['url'],
                'width' => $menu_image['width'],
                'height' => $menu_image['height'],
                'title' => $menu_image['title'],
                'alt' => $menu_image['alt'],
            );
        }

        $item_output = $args->before;
        $item_output .= $indent . '<li class="link' . $has_submenu_class . '">';

        $item_output .= '<span class="icon-blanco"></span>';
        $item_output .= '<a' . $attributes . ' title="' . $item->title .'">';
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
        $output .= "\n$indent<li class=\"$class_names\">\n";
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
        $output .= "$indent</li>\n";
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
        $item_output .= '<a' . $attributes . ' title="' . $item->title .'">';
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
