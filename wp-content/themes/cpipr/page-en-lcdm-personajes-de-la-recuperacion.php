<?php
    get_template_part('partials/los-chavos-de-maria/header');
    
    $lcdm_active_menu = 'personajes_de_la_recuperacion';
    get_template_part('partials/los-chavos-de-maria/en/header');
    get_template_part('partials/los-chavos-de-maria/en/menu');
?>

    <!-- Posts section -->
    <div class="lcdm-section">
        <div class="container-fluid">
            <div id="posts-container"></div></div>
            <div class="text-center">
                <div class="lcdm-spinner"></div>
                <a id="load-more" href="#" class="btn btn-lg btn-black">Load More</a>
            </div>
        </div>
    </div>

<?php get_template_part('partials/los-chavos-de-maria/footer'); ?>