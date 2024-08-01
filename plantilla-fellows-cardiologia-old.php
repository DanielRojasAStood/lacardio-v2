<?php 
/* 
Template Name: Plantilla Fellows cardiologia Old
*/

$sitename                       = get_bloginfo('name');
$mostrar_banner                 = get_field('mostrar_banner');
$grupo_banner                   = get_field('grupo_banner');
set_query_var('sitename', $sitename);
set_query_var('grupo_banner', $grupo_banner);

$mostrar_articulo_destacado     =  get_field('mostrar_articulo_destacado');
$mostrar_articulos              =  get_field('mostrar_articulos');

$mostrar_barra_lateral          =  get_field('mostrar_barra_lateral');
$grupo_barra_lateral            =  get_field('grupo_barra_lateral');
set_query_var('grupo_barra_lateral', $grupo_barra_lateral);

get_header();
?>

<!-- CONTENIDO PÁGINA -->
<main>
    <!-- Banner -->
    <?php if($mostrar_banner) { ?>
        <?php get_template_part('template-parts/secciones/seccion', 'banner-texto-imagen') ?>
    <?php } ?>
    <!-- Fin Banner -->

    <!-- Articulos más buscados -->
    <?php if($mostrar_articulos) { ?>
        <?php get_template_part('template-parts/secciones/seccion', 'articulos-buscados-estilo-1') ?>
    <?php } ?>
    <!-- Fin Articulos más buscados -->

    <div class="seccionGrid">
        <div class="container--large">
            <div class="seccionGrid__grid">
                <div class="seccionArticulos">
                    <?php if($mostrar_articulo_destacado) { ?>
                    <!-- Targeta articulo destacado -->
                        <?php get_template_part('template-parts/secciones/seccion', 'targeta-articulo-destacado-lg') ?>
                    <!-- Fin targeta articulo destacado -->
                    <?php } ?>
        
                    <!-- Últimos articulos -->
                        <?php get_template_part('template-parts/secciones/seccion', 'articulos-buscados-estilo-2') ?>
                    <!-- Fin últimos articulos -->
                </div>
    
                <?php if($mostrar_barra_lateral) { ?>
                    <!-- Barra lateral -->
                    <?php get_template_part('template-parts/secciones/seccion', 'articulos-barra-lateral') ?>
                    <!-- fin Barra lateral -->
                <?php } ?>
            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/secciones/seccion', 'targetas-lg'); ?>

</main>
<!-- FIN CONTENIDO PÁGINA -->

<?php get_footer('new');