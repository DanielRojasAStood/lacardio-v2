<?php 
$sitename                   = esc_html(get_bloginfo('name'));
$grupo_tarjetaimagentexto   = get_query_var('grupo_tarjetaimagentexto');

$subtitulo           = !empty($grupo_tarjetaimagentexto["subtitulo"]) ? $grupo_tarjetaimagentexto["subtitulo"] : '';
$titulo              = !empty($grupo_tarjetaimagentexto["titulo"]) ? $grupo_tarjetaimagentexto["titulo"] : '';
$descripcion         = !empty($grupo_tarjetaimagentexto["descripcion"]) ? $grupo_tarjetaimagentexto["descripcion"] : '';
$cta                 = !empty($grupo_tarjetaimagentexto["cta"]) ? $grupo_tarjetaimagentexto["cta"] : [];
$cta_titulo          = $cta['title'];
$cta_url             = $cta['url'];
$cta_target          = $cta['target'];
$imagen_id           = !empty($grupo_tarjetaimagentexto["imagen"]['ID']) ? $grupo_tarjetaimagentexto["imagen"]['ID'] : '';
?>

<section class="seccionTargetaImagenTexto">
    <div class="wrapper">
        <div class="seccionTargetaImagenTexto__grid">
            <div class="seccionTargetaImagenTexto__img">
                <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
            </div>
            <div class="seccionTargetaImagenTexto__info">
                <?php if($subtitulo) : ?>
                    <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
                <?php endif; ?>

                <?php if($titulo) : ?>
                    <h2 class="heading--48 color--002D72"><?php echo $titulo; ?></h2>
                <?php endif; ?>

                <?php if($descripcion) :?>
                    <div class="heading--18 color--263956">
                        <?php echo $descripcion; ?>
                    </div>
                <?php endif; ?>

                <?php echo generar_cta_desde_array($cta, 'boton-v2 boton-v2--blanco-rojo'); ?>
            </div>
        </div>
    </div>
</section>

