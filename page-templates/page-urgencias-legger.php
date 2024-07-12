<?php 
/* 
Template Name: Página Urgencias
*/
get_header();

$mostrar_banner_principal = get_field("mostrar_banner_principal");
$grupo_banner_principal = get_field('grupo_banner_principal');
set_query_var('grupo_banner_principal', $grupo_banner_principal);

$mostrar_elementotextoimagen = get_field("mostrar_elementotextoimagen");
$grupo_elemento_texto_imagen = get_field('grupo_elemento_texto_imagen');
set_query_var('grupo_elemento_texto_imagen', $grupo_elemento_texto_imagen);

$mostrar_bloque_texto = get_field("mostrar_bloque_texto");
$grupo_bloque_texto = get_field('grupo_bloque_texto');
set_query_var('grupo_bloque_texto', $grupo_bloque_texto);

$mostrar_contenidoextenso = get_field("mostrar_contenidoextenso");
$grupo_contenido_extenso = get_field('grupo_contenido_extenso');
set_query_var('grupo_contenido_extenso', $grupo_contenido_extenso);

$mostrar_seccionnumerada = get_field("mostrar_seccionnumerada");
$grupo_seccionnumerada = get_field('grupo_seccionnumerada');
set_query_var('grupo_seccionnumerada', $grupo_seccionnumerada);

$mostrar_soluciones = get_field("mostrar_soluciones");
$grupo_bloque_icono = get_field('grupo_bloque_icono');
set_query_var('grupo_bloque_icono', $grupo_bloque_icono);

$mostrar_tarjetaimagentexto = get_field("mostrar_tarjetaimagentexto");
$grupo_tarjetaimagentexto = get_field('grupo_tarjetaimagentexto');
set_query_var('grupo_tarjetaimagentexto', $grupo_tarjetaimagentexto);


$mostrar_targeta_texto_imagen = get_field("mostrar_targeta_texto_imagen");
$grupo_targeta_texto_imagen = get_field('grupo_targeta_texto_imagen');
set_query_var('grupo_targeta_texto_imagen', $grupo_targeta_texto_imagen);

$mostrar_profesionales_urg = get_field("mostrar_profesionales_urg");
$grupo_profesionales_urg = get_field('grupo_profesionales_urg');
set_query_var('grupo_profesionales_urg', $grupo_profesionales_urg);
?>
<!-- CONTENIDO -->
<main>
    <?php if($mostrar_banner_principal) : ?>
        <?php get_template_part('template-parts/secciones/seccion', 'banner-principal' );?>
    <?php endif; ?>

    <?php if($mostrar_elementotextoimagen) : ?>
        <?php get_template_part('template-parts/secciones/seccion', 'elemento-texto-imagen' );?>
    <?php endif; ?>

    <?php if($mostrar_bloque_texto) : ?>
        <?php get_template_part('template-parts/secciones/seccion', 'bloque-texto' );?>
    <?php endif; ?>

    <?php if($mostrar_contenidoextenso) : ?>
        <?php get_template_part('template-parts/secciones/seccion', 'contenido-extenso' );?>
    <?php endif; ?>

    <?php if($mostrar_seccionnumerada) : ?>
        <?php get_template_part('template-parts/secciones/seccion', 'numerada' );?>
    <?php endif; ?>

    <?php if($mostrar_soluciones) : ?>
        <?php get_template_part('template-parts/secciones/seccion', 'grupo-bloque-icono' );?>
    <?php endif; ?>

    <?php if($mostrar_tarjetaimagentexto) : ?>
        <?php get_template_part('template-parts/secciones/seccion', 'tarjeta-imagen-texto' );?>
    <?php endif; ?>

    <?php if($mostrar_targeta_texto_imagen) : ?>
        <?php get_template_part('template-parts/secciones/seccion', 'targeta-texto-imagen' );?>
    <?php endif; ?>

    <?php if($mostrar_profesionales_urg) : ?>
        <?php get_template_part('template-parts/secciones/seccion', 'profesionales-urg' );?>
    <?php endif; ?>

</main>
<!-- FIN CONTENIDO -->


<?php get_footer();