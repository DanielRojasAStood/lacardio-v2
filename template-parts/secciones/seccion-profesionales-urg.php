<?php
$args = array(
    'post_type' => 'profesional-de-urgen',
    'posts_per_page' => -1,
);

$query_profesionales = new WP_Query($args);

$sitename                   = esc_html(get_bloginfo('name'));
$grupo_profesionales_urg    = get_query_var('grupo_profesionales_urg');

$subtitulo = !empty($grupo_profesionales_urg["subtitulo"]) ? $grupo_profesionales_urg["subtitulo"] : '';
$titulo    = !empty($grupo_profesionales_urg["titulo"]) ? $grupo_profesionales_urg["titulo"] : '';
$fondo     = !empty($grupo_profesionales_urg["fondo"]) ? $grupo_profesionales_urg["fondo"] : '';
?>

<section class="seccionProfesionalesUrg">
    <div class="seccionProfesionalesUrg__bckg" style="background-color: <?php echo $fondo; ?>">
        <div class="wrapper">
            <div class="seccionProfesionalesUrg__title">
                <?php if($subtitulo) :?>
                    <p class="subheading color--002D72">
                        <?php echo $subtitulo; ?>
                    </p>
                <?php endif;?>

                <?php if($titulo) :?>
                    <h2 class="heading--48 color--002D72">
                        <?php echo $titulo; ?>
                    </h2>
                <?php endif;?>
            </div>
        </div>
        <?php if ($query_profesionales->have_posts()) : ?>
            <div class="seccionProfesionalesUrg__container">
                <div class="slickProfesionalesUrg slickPersonalizado">
                    <?php while ($query_profesionales->have_posts()) : $query_profesionales->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="">
                            <div class="seccionProfesionalesUrg__card">
                                <div class="seccionProfesionalesUrg__img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php 
                                        $post_id = get_the_ID(); 
                                        echo generar_thumbnail($post_id, 'full', '');
                                        ?>
                                    <?php endif; ?>
                                </div>
                                <div class="seccionProfesionalesUrg__info">
                                    <h3 class="heading--24"><?php the_title(); ?></h3>
                                    <div class="heading--18">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <span class="vermas--rojo">
                                        <span class="hover hover--rojo">
                                            Ver perfil
                                        </span>
                                        <?php 
                                            get_template_part('template-parts/content', 'icono');
                                            display_icon('arrow-rojo'); 
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>No se encontraron profesionales de urgencias.</p>
        <?php endif; ?>
    </div>
</section>


