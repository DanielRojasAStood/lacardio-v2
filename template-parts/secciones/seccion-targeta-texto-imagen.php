<?php 
$sitename                   = esc_html(get_bloginfo('name'));
$grupo_targeta_texto_imagen   = get_query_var('grupo_targeta_texto_imagen');

$subtitulo           = !empty($grupo_targeta_texto_imagen["subtitulo"]) ? $grupo_targeta_texto_imagen["subtitulo"] : '';
$titulo              = !empty($grupo_targeta_texto_imagen["titulo"]) ? $grupo_targeta_texto_imagen["titulo"] : '';
$descripcion         = !empty($grupo_targeta_texto_imagen["descripcion"]) ? $grupo_targeta_texto_imagen["descripcion"] : '';
$cta                 = !empty($grupo_targeta_texto_imagen["cta"]) ? $grupo_targeta_texto_imagen["cta"] : [];
$cta_titulo          = $cta['title'];
$cta_url             = $cta['url'];
$cta_target          = $cta['target'];
$imagen_id           = !empty($grupo_targeta_texto_imagen["imagen"]['ID']) ? $grupo_targeta_texto_imagen["imagen"]['ID'] : '';
?>

<section class="seccionTargetaTextoImagen">
    <div class="wrapper">
        <div class="seccionTargetaTextoImagen__grid">
            <div class="seccionTargetaTextoImagen__info">
                <?php if($subtitulo) : ?>
                    <p class="subheading color--fff"><?php echo $subtitulo; ?></p>
                <?php endif; ?>

                <?php if($titulo) : ?>
                    <h2 class="heading--48 color--fff"><?php echo $titulo; ?></h2>
                <?php endif; ?>

                <?php if($descripcion) :?>
                    <div class="heading--18 color--fff">
                        <?php echo $descripcion; ?>
                    </div>
                <?php endif; ?>

                <?php echo generar_cta_desde_array($cta, 'boton-v2 boton-v2--blanco-rojo'); ?>
            </div>
            <div class="seccionTargetaTextoImagen__img">
                <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            </div>
        </div>
    </div>
</section>