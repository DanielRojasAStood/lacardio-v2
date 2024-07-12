<?php 
$grupo_bloque_texto = get_query_var('grupo_bloque_texto');
$texto              = !empty($grupo_bloque_texto["texto"]) ? $grupo_bloque_texto["texto"] : '';
?>

<section class="seccionBloqueTexto">
    <div class="seccionBloqueTexto__bckg">
        <div class="wrapper">
            <div class="seccionBloqueTexto__texto">
                <?php if($texto) :?>
                <p class="heading--36 color--002D72">
                    <?php echo $texto; ?>
                </p>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>