<div class="customBreadcrumbs">
    <div class="customBreadcrumbs__wrapper">
        <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
        ?>
    </div>
</div>