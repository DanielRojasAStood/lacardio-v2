<?php 
$sitename               = esc_html(get_bloginfo('name'));
$grupo_banner_principal = get_query_var('grupo_banner_principal');

$titulo              = !empty($grupo_banner_principal["titulo"]) ? $grupo_banner_principal["titulo"] : '';
$descripcion         = !empty($grupo_banner_principal["descripcion"]) ? $grupo_banner_principal["descripcion"] : '';
$cta                 = !empty($grupo_banner_principal["cta"]) ? $grupo_banner_principal["cta"] : [];
$cta_titulo          = $cta['title'];
$cta_url             = $cta['url'];
$cta_target          = $cta['target'];
$imagen_id           = !empty($grupo_banner_principal["imagen"]['ID']) ? $grupo_banner_principal["imagen"]['ID'] : '';
?>
<section class="seccionBannerPrincipal">
    <div class="seccionBannerPrincipal__grid">
        <div class="seccionBannerPrincipal__info">
            <div class="seccionBannerPrincipal__title">
                <?php if($titulo) :?>
                <h1 class="heading--64 color--002D72">
                    <?php echo $titulo; ?>
                </h1>
                <?php endif;?>
    
                <?php if($descripcion) :?>
                    <p class="heading--18 color--002D72">
                    <?php echo $descripcion; ?>
                    </p>
                <?php endif; ?>
    
                <a href="<?php echo $cta_url; ?>" class="boton-v2 boton-v2--blanco-rojo" target="<?php echo $cta_target; ?>">
                    <?php 
                        get_template_part('template-parts/content', 'icono');
                        display_icon('ico-email'); 
                    ?>
                    <?php echo $cta_titulo; ?>
                </a>
            </div>
        </div>
        <div class="seccionBannerPrincipal__img">
            <?php echo generar_imagen_responsive($imagen_id, 'custom-size', $sitename, '');?>
        </div>
    </div>
</section>