<?php 
$sitename                   = esc_html(get_bloginfo('name'));
$grupo_contenido_extenso    = get_query_var('grupo_contenido_extenso');

$subtitulo           = !empty($grupo_contenido_extenso["subtitulo"]) ? $grupo_contenido_extenso["subtitulo"] : '';
$titulo              = !empty($grupo_contenido_extenso["titulo"]) ? $grupo_contenido_extenso["titulo"] : '';
$descripcion         = !empty($grupo_contenido_extenso["descripcion"]) ? $grupo_contenido_extenso["descripcion"] : '';
$segunda_descripcion = !empty($grupo_contenido_extenso["segunda_descripcion"]) ? $grupo_contenido_extenso["segunda_descripcion"] : '';
$imagen_id           = !empty($grupo_contenido_extenso["imagen"]['ID']) ? $grupo_contenido_extenso["imagen"]['ID'] : '';

?>
<section class="seccionContenidoExtenso">
    <div class="wrapper">
        <div class="seccionContenidoExtenso__grid">
            <div class="seccionContenidoExtenso__title">
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
            <div class="seccionContenidoExtenso__info">
                <?php if($descripcion) :?>
                    <p class="heading--18 color--002D72">
                        <?php echo $descripcion; ?>
                    </p>
                <?php endif;?>
            </div>
        </div>
        <div class="seccionContenidoExtenso__img">
            <?php 
                echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');
            ?>
        </div>
        <div>
            <?php if($segunda_descripcion) :?>
                <p class="heading--18 color--002D72">
                    <?php echo $segunda_descripcion; ?>
                </p>
            <?php endif;?>
        </div>
    </div>
</section>