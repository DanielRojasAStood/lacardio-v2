<?php
$titulo = block_field('titulo', false); 
$descripcion = block_field('descripcion', false); 
$tipo = block_field('tipo', false); 
?>
<div class="bannerhome">
    <div class="bannerhome__int">
        <div class="bannerhome__imgmobile">
            <img src="<?= block_field('imagen-mobile') ?>" alt="<?= $titulo ?>">
        </div>
        <div class="bannerhome__content">
            <div class="bannerhome__content__int">
                <<?= $tipo ?>><?= $titulo ?></<?= $tipo ?>>
                <p><?= $descripcion ?></p>
            </div>
        </div>
        <div class="bannerhome__bg">
            <img src="<?= block_field('imagen-desktop') ?>" alt="<?= $titulo ?>">
        </div>
    </div>
</div>