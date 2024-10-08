<?php
$sitename            = get_bloginfo('name');
$grupo_banner_slider = get_field('grupo_banner_slider');

if (isset($grupo_banner_slider) && !empty($grupo_banner_slider)) {
    $degradado = isset($grupo_banner_slider['degradado']) ? sanitize_text_field($grupo_banner_slider['degradado']) : '';
    $slides = isset($grupo_banner_slider['slides']) ? $grupo_banner_slider['slides'] : array();

    if (!empty($slides)) {
        ?>
        <style>
            .seccionBannerSlide__contenido {
                background: linear-gradient(0deg, #000 20%, <?php echo esc_html($degradado); ?> 100%);
                }
                
                @media (min-width: 1024px) {
                    .seccionBannerSlide__contenido {
                    background: linear-gradient(90deg, #000 20.5%, <?php echo esc_html($degradado); ?> 100%);
                }   
            }
        </style>

        <section class="seccionBannerSlides">
            <div class="slickBannerSlide slickPersonalizado">
                <?php
                foreach ($slides as $key => $slide) {
                    $color_texto   = isset($slide['color_texto']) ? sanitize_text_field($slide['color_texto']) : '';
                    $titulo        = isset($slide['titulo']) ? $slide['titulo'] : '';
                    $imagen        = isset($slide['imagen']) ? esc_url($slide['imagen']) : '';
                    $imagen_mobile = isset($slide['imagen_mobile']) ? esc_url($slide['imagen_mobile']) : '';
                    $descripcion   = isset($slide['descripcion']) ? $slide['descripcion'] : '';
                    $cta           = isset($slide['cta']) ? $slide['cta'] : array();
                    $cta_titulo    = isset($cta['title']) ? esc_html($cta['title']) : '';
                    $cta_url       = isset($cta['url']) ? esc_url($cta['url']) : '';
                    $cta_target    = isset($cta['target']) ? esc_html($cta['target']) : '';
                    ?>
                    <div class="seccionBannerSlide">
                        <style>
                            .seccionBannerSlide {
                                background-image: url(<?php echo $imagen_mobile; ?>);
                            }
                            @media (min-width: 1024px) {
                                .seccionBannerSlide {
                                    background-image: url(<?php echo $imagen; ?>);
                                }
                            }
                        </style>
                        <div class="seccionBannerSlide__contenido">
                            <?php if ($key === 0) : ?>
                                <?php if($titulo) : ?>
                                <h1 class="heading--64" style="color: <?php echo esc_html($color_texto); ?>"><?php echo $titulo; ?></h1>
                                <?php endif; ?>
                            <?php else : ?>
                                <?php if($titulo) : ?>
                                <h2 class="heading--64" style="color: <?php echo esc_html($color_texto); ?>"><?php echo $titulo; ?></h2>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if($descripcion) : ?>
                                <div class="font-sans heading--18" style="color: <?php echo esc_html($color_texto); ?>">
                                <?php echo $descripcion; ?>
                                </div>
                            <?php endif; ?>

                            <?php if($cta_titulo) : ?>
                            <a class="boton-v2 boton-v2--blanco" href="<?php echo $cta_url; ?>" target="<?php echo $cta_target; ?>"><?php echo $cta_titulo; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
        <?php
    }
}
?>