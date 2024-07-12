<?php 
/*
    Template Name: Instrucciones para procedimientos
*/
$sistema_pestanas = get_field('sistema_pestanas');
$titulo = get_field('titulo_h1');
$titulo = ($titulo != "") ? $titulo : get_the_title();
get_header(); ?>
<?php echo get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="pagina-full">
    <div class="w-dxxl padding1 mx-auto">
        <h1><?= $titulo ?></h1>
    </div>
    <?php if(is_array($sistema_pestanas)): ?>
    <div class="proc_examenes">
        <div class="pestanas pb-0">
            <div class="pestanas__btns w-dxxl mx-auto">
                <?php $indice = 0; foreach($sistema_pestanas as $cadaUno): ?>
                    <a href="#" id="<?= $cadaUno["ancla"] ?>" class="<?php if($indice == 0 && $contenidos["interna"] == 0): ?>activa<?php elseif($contenidos["interna"] == 1 && $cadaUno["elegido"] == 1): ?>activa<?php endif ?>">
                        <span class="normal"><img src="<?= $cadaUno["icono_principal"] ?>" alt="icono" /></span> 
                        <span class="hover"><img src="<?= $cadaUno["icono_principal_hover"] ?>" alt="icono" /></span>
                        <?= $cadaUno["titulo"] ?>
                    </a>
                <?php $indice++; endforeach ?>
            </div>
            <div class="pestanas__contenedor pt-5">
                <?php $indice = 0; foreach($sistema_pestanas as $cadaUno): ?>
                    <?php foreach($cadaUno["contenido"] as $cadaTab): ?>
                        <div class="pestanas__indv <?php if($indice == 0 && $contenidos["interna"] == 0): ?>activa<?php elseif($contenidos["interna"] == 1 && $cadaUno["elegido"] == 1): ?>activa<?php endif ?>">
                            <div class="preparacionGeneral <?= $cadaUno["diseno"] ?>">
                                <div class="preparacionGeneral__titulo">
                                    <h2 class="text-center"><?= $cadaUno["titulo"] ?></h2>
                                </div>
                                <div class="preparacionGeneral__columnas">
                                    <div class="preparacionGeneral__imagen">
                                        <img src="<?= $cadaTab["imagen"]["url"] ?>" alt="<?= $cadaTab["imagen"]["alt"] ?>">
                                    </div>
                                    <div class="preparacionGeneral__texto">
                                        <?= $cadaTab["texto"] ?>
                                    </div>
                                </div>
                            </div>
                            <?php if(is_array($cadaUno["subpestanas"])): ?>
                                <div class="subpestanas pb-0">
                                    <div class="subpestanas__btns w-dxxl mx-auto">
                                        <?php $indice = 0; foreach($cadaUno["subpestanas"] as $cadaSub): ?>
                                        <a href="#" class="<?php if($indice == 0): ?>activa<?php endif ?>">
                                            <span class="normal"><img src="<?= $cadaSub["iconos"]["icono"]["url"] ?>" alt="<?= $cadaSub["iconos"]["icono"]["alt"] ?>" /></span> 
                                            <span class="hover"><img src="<?= $cadaSub["iconos"]["icono_hover"]["url"] ?>" alt="<?= $cadaSub["iconos"]["icono_hover"]["alt"] ?>" /></span>
                                            <?= $cadaSub["titulo"] ?>        
                                        </a>
                                        <?php $indice++;endforeach ?>
                                    </div>
                                    
                                    <div class="subpestanas__contenedor pt-5">
                                        <?php $indice = 0; foreach($cadaUno["subpestanas"] as $cadaTab): ?>
                                            <div class="subpestanas__indv <?php if($indice == 0): ?>activa<?php endif ?>">
                                                <div class="preparacionGeneralHijo">
                                                    <div class="preparacionGeneralHijo__columnas">
                                                        <div class="preparacionGeneralHijo__imagen">
                                                            <img src="<?= $cadaTab["imagen"]["url"] ?>" alt="<?= $cadaTab["imagen"]["alt"] ?>">
                                                        </div>
                                                        <div class="preparacionGeneralHijo__texto">
                                                            <h2 class="text-center"><?= $cadaUno["titulo"] ?></h2>
                                                            <?= $cadaTab["descripcion"] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $indice++ ; endforeach ?>
                                    </div>
    
                                </div>
                            <?php endif ?>
                        </div>
                    <?php endforeach ?>
                <?php $indice++; endforeach ?>
            </div>
        </div>
    </div>
    <?php endif ?>
</main>
<?php  get_footer(); ?>
