<?php 
$sitename            = get_bloginfo('name');
$headerFooterCardioU = get_page_by_path('cardiou-contenido-header-footer')->ID;
$grupo_header        = ($headerFooterCardioU) ? get_field('grupo_header', $headerFooterCardioU) : null;
$grupo_logo          = !empty($grupo_header['grupo_logo']) ? $grupo_header['grupo_logo'] : '';
$logo                = $grupo_logo['imagen'];
$items               = !empty($grupo_header['grupo_menu']) ? $grupo_header['grupo_menu'] : [];

$pagesTemplates = array(
    'page-template-lg/page-cardio-u-cursos.php', 
    'page-template-lg/page-cardio-u-escuelas.php',
    'page-template-lg/page-cardio-u-nosotros.php'
);
?>

<header class="seccionCardioUHeader">
    <div class="wrapper">
        <div class="seccionCardioUHeader__grid">
            <!-- Logo -->
            <div class="seccionCardioUHeader__logo">
                <a href="/cardio-u" title="Cardio u">
                    <img src="<?php echo $logo; ?>" alt="CardioU - <?php echo $sitename; ?>" title="CardioU">
                </a>
            </div>
            <!-- Menu -->
            <div class="seccionCardioUHeader__menu">
                <a href="#" class="heading--18 color--E40046 nivel-0">
                    <?php echo $items['titulo_menu']?>
                    <?php 
                        get_template_part('template-parts/content', 'icono');
                        display_icon('arrow-rojo'); 
                    ?>
                </a>
                <div class="seccionCardioUHeader__menuitems">
                    <ul class="seccionCardioUHeader__wrapper">
                        <?php foreach ($items['menu'] as $key => $item) { 
                            $url    = $item['enlace']['url']   ; 
                            $titulo = $item['enlace']['title']; 
                            $target = $item['enlace']['target']; 
                        ?>
                            <li class="nivel-1">
                                <a class="heading--18" href="<?php echo $url ?>" target="<?php echo $target ?>" title="<?php echo $titulo ?>">
                                    <?php echo $titulo ?>
                                    <?php 
                                        get_template_part('template-parts/content', 'icono');
                                        display_icon('arrow-rojo'); 
                                    ?>
                                </a>
                                <ul class="submenu">
                                    <p class="heading--12 color--677283"><?php echo $titulo ?></p>
                                    <?php foreach ($item['cursos'] as $key => $curso) {  
                                        setup_postdata($curso);
                                        $id           = $curso->ID;
                                        $titulo_curso = get_the_title($id);
                                        $modalidad    = get_field('modalidad', $id);
                                        $horas        = get_field('horas', $id);
                                        $imagen       = get_field("imagen_curso", $id);
                                        $imagen_id    = $imagen['ID'];
                                    ?>
                                        <li>
                                            <a class="heading--18 color--002D72" href="<?php the_permalink($id); ?>" title="<?php echo $titulo_curso; ?>"><?php echo $titulo_curso; ?></a>
                                        </li>
                                    <?php } ?>
                                    <a href="" class="boton-v2 boton-v2--blanco-rojo">Ver todo de <?php echo $titulo ?></a>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- Enlace Acerca de nosotros -->
            <div class="seccionCardioUHeader__menuacerca">
                <a class="heading--18 color--E40046" href="<?php echo $items['acerca']['url']?>" target="<?php echo $items['acerca']['target']?>"><?php echo $items['acerca']['title']?></a>
            </div>
            <!-- Buscador por el momento innabilitado -->
            <div></div>
            <!-- Boton de inscribirse -->
            <div class="seccionCardioUHeader__cta">
                <a class="boton-v2 boton-v2--rojo-rojo" href="<?php echo $items['inscribirme']['url']?>" target="<?php echo $items['inscribirme']['target']?>"><?php echo $items['inscribirme']['title']?></a>
                <button type="button" aria-label="boton abrir menu" class="customHeader-boton__menu" id="js-toggle-button">
                    <span></span>
                </button>
            </div>
            
        </div>
    </div>
    <div class="customHeaderMobile__nav" id="js-menu-mobile">
        hello
    </div>
</header>
<?php 
if(is_page_template($pagesTemplates)) : ?>
<?php get_template_part('template-parts/cardio-u/content', 'breadcrumbs') ?>
<?php endif; ?>



