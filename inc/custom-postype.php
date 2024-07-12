<?php

function my_custom_post_eventos() {
  $labels = array(
      'name'               => _x('Eventos', 'nombre general del tipo de entrada', 'textdomain'),
      'singular_name'      => _x('Evento', 'nombre singular del tipo de entrada', 'textdomain'),
      'add_new'            => _x('Agregar nuevo', 'evento', 'textdomain'),
      'add_new_item'       => __('Agregar nuevo Evento', 'textdomain'),
      'edit_item'          => __('Editar Evento', 'textdomain'),
      'new_item'           => __('Nuevo Evento', 'textdomain'),
      'all_items'          => __('Todos los Eventos', 'textdomain'),
      'view_item'          => __('Ver Evento', 'textdomain'),
      'search_items'       => __('Buscar Eventos', 'textdomain'),
      'not_found'          => __('No se encontraron Eventos', 'textdomain'),
      'not_found_in_trash' => __('No se encontraron Eventos en la papelera', 'textdomain'),
      'parent_item_colon'  => '',
      'menu_name'          => 'Eventos'
  );
  $args = array(
      'labels'        => $labels,
      'description'   => 'Contiene nuestros eventos y detalles específicos de los mismos',
      'public'        => true,
      'menu_position' => 5,
      'menu_icon'     => 'dashicons-calendar', // Puedes elegir el icono que desees de la lista de Dashicons
      'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
      'has_archive'   => true,
      'taxonomies'    => array('categoria_evento')  // Usando una taxonomía personalizada
  );
  register_post_type('eventos', $args); 
}

// Hook para registrar el tipo de entrada personalizada
add_action('init', 'my_custom_post_eventos');


// Profesionales urgencias
function my_custom_post_profesionales_urgencias() {
  $labels = array(
      'name'               => _x('Profesionales de Urgencias', 'nombre general del tipo de entrada', 'textdomain'),
      'singular_name'      => _x('Profesional de Urgencias', 'nombre singular del tipo de entrada', 'textdomain'),
      'add_new'            => _x('Agregar nuevo', 'profesional de urgencias', 'textdomain'),
      'add_new_item'       => __('Agregar nuevo Profesional de Urgencias', 'textdomain'),
      'edit_item'          => __('Editar Profesional de Urgencias', 'textdomain'),
      'new_item'           => __('Nuevo Profesional de Urgencias', 'textdomain'),
      'all_items'          => __('Todos los Profesionales de Urgencias', 'textdomain'),
      'view_item'          => __('Ver Profesional de Urgencias', 'textdomain'),
      'search_items'       => __('Buscar Profesionales de Urgencias', 'textdomain'),
      'not_found'          => __('No se encontraron Profesionales de Urgencias', 'textdomain'),
      'not_found_in_trash' => __('No se encontraron Profesionales de Urgencias en la papelera', 'textdomain'),
      'parent_item_colon'  => '',
      'menu_name'          => 'Profesionales de Urgencias'
  );
  $args = array(
      'labels'        => $labels,
      'description'   => 'Contiene nuestros profesionales de urgencias y detalles específicos de los mismos',
      'public'        => true,
      'menu_position' => 5,
      'menu_icon'     => 'dashicons-heart', // Puedes elegir el icono que desees de la lista de Dashicons
      'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
      'has_archive'   => true,
      'taxonomies'    => array('categoria_profesional')  // Usando una taxonomía personalizada
  );
  register_post_type('profesionales_urgencias', $args); 
}

// Hook para registrar el tipo de entrada personalizada
add_action('init', 'my_custom_post_profesionales_urgencias');

