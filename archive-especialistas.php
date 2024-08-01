<?php 
get_header(); 

$doctores = get_doctores_con_servicios();

global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'post_type' => 'especialistas',
    'posts_per_page' => 12,
    'paged' => $paged,
    'meta_key' => 'apellido',
    'orderby' => 'meta_value',
    'order' => 'ASC'
);
$entrada_index = 0;
$publicaciones = array();

$pagina = array();
$paginacion = "";

$idiomas = get_taxonomias_generales('idiomas', false);

$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    $id_publicacion = $post->ID;
    $imagen = get_field('image_doctor', $id_publicacion)["url"];
    $fecha_del_evento = get_field('fecha_del_evento', $id_publicacion);

    $nombre = get_field('nombre', $id_publicacion);
    $apellido = get_field('apellido', $id_publicacion);
    $especialidades_y_sub = get_field('specialties_doctor', $id_publicacion);
    $nombre_completo = (($nombre != "" && $apellido != "")) ? $nombre . " " . $apellido : get_the_title();
    $clase = '';
    if(!(isset($imagen))){
        $clase = 'sin_imagen';
    }

    $publicaciones[$id_publicacion] = array(
        "titulo" => $post->post_title,
        "slug" => $post->post_name,
        "nombre_completo" => $nombre_completo,
        "descripcion" => get_the_excerpt(),
        "fecha_del_evento" => $fecha_del_evento,
        "enlace" => get_the_permalink($id_publicacion),
        "imagen" => $imagen,
        "especialidades_y_sub" => $especialidades_y_sub,
        "clase" => $clase,
        "fecha" => get_the_date("d M"),
    );
    $entrada_index++;
    endwhile;

    if($query->max_num_pages > 1): /* Si hay más de 1 página */
        $paginacion .= '<div class="wp_pagination my-5" id="wp_pagination">';

        if($curpage > 1): /* Si estoy más adelante de la pag 1 */
            $paginacion .= '<a class="first page button" href="' . get_pagenum_link(1) . '">&laquo;</a>';
            $paginacion .= '<a class="previous page button" href="' . get_pagenum_link(($curpage - 1 > 0 ? $curpage - 1 : 1)) . '">&lsaquo;</a>';
        endif;
        
        for ($i = 1; $i <= $query->max_num_pages; $i++)
            $paginacion .= '<a class="' . ($i == $curpage ? 'active ' : '') . 'page button" href="' . get_pagenum_link($i) . '">' . $i . '</a>';

        if($curpage < $query->max_num_pages):
            $paginacion .= '<a class="next page button" href="' . get_pagenum_link(($curpage + 1 <= $query->max_num_pages ? $curpage + 1 : $query->max_num_pages)) . '">&rsaquo;</a>';
            $paginacion .= '<a class="last page button" href="' . get_pagenum_link($query->max_num_pages) . '">&raquo;</a>';
        endif;

        $paginacion .=  '</div>';
    endif;
    $pagina = $query;
    wp_reset_postdata();
endif;

?>
<?php echo get_template_part('template-parts/content', 'breadcrumbs'); ?>
<main class="especialistasgen">
    <div class="especialistasgen__int">
        <div class="especialistasgen__filtro">
            <div class="especialistasgen__filtro__int">
                <form id="filtro-form" name="filtro" class="filtro">
                    <input type="hidden" name="filtro_tipo" value="especialistas">
                    <div class="especialistasgen__filtro__bar">
                        <p>Limita tu búsqueda</p>
                    </div>
                    <div class="especialistasgen__filtro__content">
                        <div class="especialistasgen__filtro__content__ind">
                            <h4>Por servicios, especialidades y subespecialidades</h4>
                            <div class="mb-3">
                                <input type="text" name="servicio" id="servicio" class="form-control filtro_valores">
                            </div>
                        </div>
                        <div class="especialistasgen__filtro__content__ind d-none">
                            <h4>Por idioma</h4>
                            <div class="mb-3">
                                <ul>
                                    <?php foreach($idiomas as $ididioma => $idioma): ?>
                                        <li>
                                            <input class="form-check-input filtro_checkbox" type="checkbox" name="filtro_idiomas[<?= $ididioma ?>]" value="<?= $ididioma ?>" id="<?= $ididioma ?>">
                                            <label class="form-check-label" for="idioma_1">
                                                <?= $idioma ?>
                                            </label>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <div class="especialistasgen__filtro__content__ind">
                            <h4>Por apellido</h4>
                            <div class="mb-3">
                                <div class="filtro_apellido">
                                    <input type="hidden" name="letra" class="filtro_valores filtro_letra" value="">
                                    <?php echo get_template_part('template-parts/content', 'buscador_de_letras'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="especialistasgen__filtro__btn">
                        <button style="display:none;" type="submit">Buscar</button>
                        <a href="/especialistas/">Restablecer todos los filtros</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="especialistasgen__resultados">
        <?php foreach($publicaciones as $idPublicacion => $cadaPublicacion): ?>
            <div class="especialistaindv">
                <div class="especialistaindv__int <?= $cadaPublicacion["clase"] ?>">
                    <?php if($cadaPublicacion["clase"] != "sin_imagen"): ?>
                        <div class="especialistaindv__foto">
                            <a href="<?= $cadaPublicacion["enlace"] ?>">
                                <img src="<?= $cadaPublicacion["imagen"] ?>" alt="<?= $cadaPublicacion["titulo"] ?>">
                            </a>
                        </div>
                    <?php endif ?>
                    <div class="especialistaindv__contenido">
                        <h2><a href="<?= $cadaPublicacion["enlace"] ?>"><?= $cadaPublicacion["nombre_completo"] ?></a></h2>
                        <p><?= formatear_servicios($doctores[$cadaPublicacion["slug"]]); ?></p>
                        <h3>ESPECIALIDADES Y SUBESPECIALIDADES</h3>
                        <p><?= $cadaPublicacion["especialidades_y_sub"] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="container">
        <div class="row g-0">
            <div class="col-12">
                <?php get_template_part('template-parts/content', 'paginador'); ?>
            </div>
        </div>
    </div>
</main>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('filtro-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form from submitting normally

        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                updateResults(response);
            } else {
                console.error('Error en la solicitud AJAX');
            }
        };
        xhr.send(formData);
    });

    function updateResults(data) {
        const resultadosContainer = document.querySelector('.especialistasgen__resultados');
        resultadosContainer.innerHTML = ''; // Clear current results

        data.publicaciones.forEach(function(publicacion) {
            const div = document.createElement('div');
            div.className = 'especialistaindv';
            div.innerHTML = `
                <div class="especialistaindv__int ${publicacion.clase}">
                    ${publicacion.clase != 'sin_imagen' ? `<div class="especialistaindv__foto">
                        <a href="${publicacion.enlace}">
                            <img src="${publicacion.imagen}" alt="${publicacion.titulo}">
                        </a>
                    </div>` : ''}
                    <div class="especialistaindv__contenido">
                        <h2><a href="${publicacion.enlace}">${publicacion.nombre_completo}</a></h2>
                        <p>${publicacion.descripcion}</p>
                        <h3>ESPECIALIDADES Y SUBESPECIALIDADES</h3>
                        <p>${publicacion.especialidades_y_sub}</p>
                    </div>
                </div>
            `;
            resultadosContainer.appendChild(div);
        });
    }
});
</script>


<?php get_footer(); ?>
