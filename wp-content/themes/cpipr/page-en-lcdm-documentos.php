<?php
    get_template_part('partials/los-chavos-de-maria/header');
    
    $lcdm_active_menu = 'documentos';
    get_template_part('partials/los-chavos-de-maria/en/header');
    get_template_part('partials/los-chavos-de-maria/en/menu');
?>
    
    <!-- Ingegration Documentos section -->
    <div class="lcdm-section">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2"></div>
                <div class="span8">
                    <div id="DC-search-projectid-45731-los-chavos-de-mar-a" class="DC-embed DC-embed-search DC-search-container"></div>
                    <script src="//assets.documentcloud.org/embed/loader.js"></script>
                    <script>
                    dc.embed.load('https://www.documentcloud.org/search/embed/', {
                        q: "projectid: 45731-los-chavos-de-mar-a ",
                        container: "#DC-search-projectid-45731-los-chavos-de-mar-a",
                        title: "",
                        order: "created_at",
                        per_page: 10,
                        search_bar: true,
                        organization: 1726
                    });
                    </script>
                    <noscript>
                    <a href="https://www.documentcloud.org/public/search/projectid%3A%2045731-los-chavos-de-mar-a%20">View/search document collection</a>
                    </noscript>
                </div>
            </div>
        </div>
    </div>

<?php get_template_part('partials/los-chavos-de-maria/footer'); ?>
