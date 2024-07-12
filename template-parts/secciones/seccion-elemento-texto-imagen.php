<?php 
$sitename                       = esc_html(get_bloginfo('name'));
$grupo_elemento_texto_imagen    = get_query_var('grupo_elemento_texto_imagen', $grupo_elemento_texto_imagen);

$subtitulo           = !empty($grupo_elemento_texto_imagen["subtitulo"]) ? $grupo_elemento_texto_imagen["subtitulo"] : '';
$titulo              = !empty($grupo_elemento_texto_imagen["titulo"]) ? $grupo_elemento_texto_imagen["titulo"] : '';
$descripcion         = !empty($grupo_elemento_texto_imagen["descripcion"]) ? $grupo_elemento_texto_imagen["descripcion"] : '';
$cta                 = !empty($grupo_elemento_texto_imagen["cta"]) ? $grupo_elemento_texto_imagen["cta"] : [];
$cta_titulo          = $cta['title'];
$cta_url             = $cta['url'];
$cta_target          = $cta['target'];
$imagen_id           = !empty($grupo_elemento_texto_imagen["imagen"]['ID']) ? $grupo_elemento_texto_imagen["imagen"]['ID'] : '';
?>
<section class="seccionElementTextoImagen">
    <div class="wrapper">
        <div class="seccionElementTextoImagen__grid">
            <div class="seccionElementTextoImagen__info">
                <div class="seccionElementTextoImagen__title">
    
                    <?php if($subtitulo) :?>
                    <p class="subheading color--002D72"><?php echo $subtitulo; ?></p>
                    <?php endif;?>
    
                    <?php if($titulo) :?>
                    <h2 class="heading--48 color--002D72">
                        <?php echo $titulo; ?>
                    </h2>
                    <?php endif;?>
        
                    <?php if($descripcion) :?>
                        <p class="heading--18 color--263956">
                        <?php echo $descripcion; ?>
                        </p>
                    <?php endif; ?>
    
                    <a href="<?php echo $cta_url; ?>" class="boton-v2 boton-v2--blanco-rojo" target="<?php echo $cta_target; ?>">
                        <?php echo $cta_titulo; ?>
                    </a>
                </div>
            </div>
            <div class="seccionElementTextoImagen__img">
                <?php 
                    echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
                ?>
            </div>
        </div>
    </div>
</section>