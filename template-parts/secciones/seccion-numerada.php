<?php 
$sitename               = esc_html(get_bloginfo('name'));
$grupo_seccionnumerada = get_query_var('grupo_seccionnumerada');

$subtitulo           = !empty($grupo_seccionnumerada["subtitulo"]) ? $grupo_seccionnumerada["subtitulo"] : '';
$titulo              = !empty($grupo_seccionnumerada["titulo"]) ? $grupo_seccionnumerada["titulo"] : '';
$elementos           = !empty($grupo_seccionnumerada["elementos"]) ? $grupo_seccionnumerada["elementos"] : '';

?>
<section class="seccionNumerada">
    <div class="seccionNumerada__bckg">
        <div class="wrapper">
            <div class="seccionNumerada__title">
                <?php if($subtitulo) :?>
                <p class="subheading color--fff">
                    <?php echo $subtitulo; ?>
                </p>
                <?php endif; ?>

                <?php if($titulo) :?>
                    <h2 class="heading--48 color--fff">
                        <?php echo $titulo; ?>
                    </h2>
                <?php endif; ?>
            </div>
            <div class="seccionNumerada__elementos">
                <?php foreach ($elementos as $key => $elemento) { ?>
                    <div class="seccionNumerada__elemento">
                        <span class="number">0<?php echo $key + 1; ?></span>
                        <p class="heading--24"><?php echo $elemento['titulo'] ?></p>
                        <p class="heading--18 color--fff"><?php echo $elemento['detalle'] ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>