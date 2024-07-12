<?php 
$sitename               = esc_html(get_bloginfo('name'));
$grupo_bloque_icono = get_query_var('grupo_bloque_icono');

$subtitulo           = !empty($grupo_bloque_icono["subtitulo"]) ? $grupo_bloque_icono["subtitulo"] : '';
$titulo              = !empty($grupo_bloque_icono["titulo"]) ? $grupo_bloque_icono["titulo"] : '';
$descripcion         = !empty($grupo_bloque_icono["descripcion"]) ? $grupo_bloque_icono["descripcion"] : '';
$elementos           = !empty($grupo_bloque_icono["elementos"]) ? $grupo_bloque_icono["elementos"] : '';

?>
<section class="seccionGrupoBloqueIcono">
    <div class="seccionGrupoBloqueIcono__bckg">
        <div class="wrapper">
            <div class="seccionGrupoBloqueIcono__title">
                <?php if($subtitulo) :?>
                <p class="subheading color--002D72">
                    <?php echo $subtitulo; ?>
                </p>
                <?php endif; ?>

                <?php if($titulo) :?>
                    <h2 class="heading--48 color--002D72">
                        <?php echo $titulo; ?>
                    </h2>
                <?php endif; ?>

                <?php if($descripcion) :?>
                    <h2 class="heading--18 color--263956">
                        <?php echo $descripcion; ?>
                    </h2>
                <?php endif; ?>

            </div>
            <div class="seccionGrupoBloqueIcono__elementos">
                <?php foreach ($elementos as $key => $elemento) { ?>
                    <div class="seccionGrupoBloqueIcono__elemento">
                        <p class="heading--18">
                            <?php 
                                get_template_part('template-parts/content', 'icono');
                                display_icon('ico-check-circle'); 
                            ?>  
                            <?php echo $elemento['elemento'] ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>