<?php
    $numero = block_field('numero', false); 
    $descripcion = block_field('descripcion', false); 
?>
<div class="historia__puntos">
    <div class="historia__puntos--numero">
        <h4><?= $numero ?></h4>
    </div>
    <div class="historia__puntos--descripcion">
        <p><?= $descripcion ?></p>
    </div>
</div>