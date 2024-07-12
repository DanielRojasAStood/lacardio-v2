<?php
    $sitename   = get_bloginfo('name');
    $homeurl    = get_home_url();
    $logo_id    = get_theme_mod('custom_logo');
    $logo       = wp_get_attachment_image_src($logo_id, 'full');
?>

<header class="customHeader">
    <div class="customHeader__wrapper">
        <!-- logo -->
        <div class="customHeader__logo">
            <a href="<?php echo esc_url($homeurl) ?>">
                <?php if ($logo) { ?>
                    <img src="<?php echo esc_url($logo[0]) ?>" alt="Logo <?php echo esc_attr($sitename) ?>" width="127" height="46" />
                <?php } ?>
            </a>
        </div>
        <!-- Fin Logo -->
        <button class="customHeader-boton__menu" type="button" id="js-toggle-button">
            <span></span>
        </button>
        <!-- Menu Escritorio -->
        <?php get_template_part('template-parts/page/header/content', 'header-escritorio') ?>
        <!-- Fin Menu Escritorio -->
        <!-- Menu Escritorio -->
        <?php get_template_part('template-parts/page/header/content', 'header-mobile') ?>
        <!-- Fin Menu Escritorio -->
        <div class="customHeader__logo contenedor-logo-fundacion">
            <a href="https://fundacion.cardioinfantil.org/">									
								    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/general/logo_50fundacion.jpg" alt="Fundación Cardioinfantil" style="max-width: 200px;">
            </a>
        </div>            
        

    </div>
</header>