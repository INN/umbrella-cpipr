<?php
    get_template_part('partials/los-chavos-de-maria/header');
    
    $lcdm_active_menu = 'documentos';
    get_template_part('partials/los-chavos-de-maria/en/header');
    get_template_part('partials/los-chavos-de-maria/en/menu');
?>
    
    <!-- Hero Page Title  -->
    <div class="lcdm-hero-page-title-wrapper" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')">
        <div class="lcdm-hero-page-title-overlay">
            <div class="lcdm-hero-page-title-media">
                <div class="lcdm-hero-page-title-icon">
                    <i class="lcdm-icon lcdm-icon-documentos"></i>
                </div>
                <div class="lcdm-hero-page-title">
                    <h1>DOCUMENTS</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Ingegration Documentos section -->
    <div class="lcdm-section">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2"></div>
                <div class="span8">
                <div id="DC-search-projectid-43264-los-chavos-de-mar-a" class="DC-embed DC-embed-search DC-search-container"></div>
                <script src="//assets.documentcloud.org/embed/loader.js"></script>
                <script>
                dc.embed.load('https://www.documentcloud.org/search/embed/', {
                    q: "projectid: 43264-los-chavos-de-mar-a ",
                    container: "#DC-search-projectid-43264-los-chavos-de-mar-a",
                    title: "",
                    order: "created_at",
                    per_page: 8,
                    search_bar: true,
                    organization: 2426
                });
                </script>
                <noscript>
                <a href="https://www.documentcloud.org/public/search/projectid%3A%2043264-los-chavos-de-mar-a%20">View/search document collection</a>
                </noscript>
                </div>
            </div>
        </div>
    </div>

<?php get_template_part('partials/los-chavos-de-maria/footer'); ?>
