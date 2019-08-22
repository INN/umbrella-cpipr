<?php
    get_template_part('partials/los-chavos-de-maria/header');
    
    $lcdm_active_menu = 'personajes_de_la_recuperacion';
    get_template_part('partials/los-chavos-de-maria/en/header');
    get_template_part('partials/los-chavos-de-maria/en/menu');
?>

    <!-- Hero Page Title  -->
    <div class="lcdm-hero-page-title-wrapper">
        <div class="lcdm-hero-page-title-overlay">
            <div class="lcdm-hero-page-title-media">
                <div class="lcdm-hero-page-title-icon">
                    <i class="lcdm-icon lcdm-icon-personajes"></i>
                </div>
                <div class="lcdm-hero-page-title">
                    <h1>POWER<br/>PLAYERS</h1>
                </div>
            </div>
        </div>
    </div>

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