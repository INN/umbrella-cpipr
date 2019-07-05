<?php
/**
 * Landing page "Los chavos de maría"
 */
?>
<!DOCTYPE html>
    <!--[if lt IE 7]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
    <!--[if IE 7]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
    <!--[if IE 8]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
    <!--[if IE 9]>    <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <?php
        /**
         * The template for displaying the header
         *
         * Contains the HEAD content and opening of the id=page and id=main DIV elements.
         *
         * @package Largo
         * @since 0.1
         */
        ?>
        <title>
            <?php
                global $page, $paged;
                wp_title( '|', true, 'right' );
                bloginfo( 'name' ); // Add the blog name.

                // Add the blog description for the home/front page.
                $site_description = get_bloginfo( 'description', 'display' );
                if ( $site_description && ( is_home() || is_front_page() ) )
                    echo " | $site_description";

                // Add a page number if necessary:
                if ( $paged >= 2 || $page >= 2 )
                    echo ' | ' . 'Page ' . max( $paged, $page );
            ?>
        </title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php
            if ( is_singular() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );
            wp_head();
        ?>

        <!-- Fancybox -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/lib/fancybox/dist/jquery.fancybox.css' ?>">
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/fancybox/dist/jquery.fancybox.min.js' ?>" type="text/javascript"></script>

        <!-- JsMaps -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/css/jsmaps.css' ?>">
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/js/jsmaps-libs.js' ?>" type="text/javascript"></script>
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/js/jsmaps-panzoom.js' ?>"></script>
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/js/jsmaps.min.js' ?>" type="text/javascript"></script>
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/maps/puertoRico.js' ?>" type="text/javascript"></script>
    </head>

    <body <?php body_class(); ?>>
        <?php get_template_part('partials/los-chavos-de-maria/header'); ?>


        <!-- Main slider -->
        <div>
            <div class="owl-hero-carousel">
                <div id="top-hero-carousel" class="owl-carousel owl-theme">
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'series',
                                    'field'    => 'slug',
                                    'terms'    => 'los-chavos-de-maria',
                                )
                            ),
                            'order' => 'DESC',
                            'posts_per_page' => 5,
                            'post_status' => 'publish'
                        );
                        $chavos_category = get_category_by_slug('los-chavos-de-maria');
                        $chavos_query = new WP_Query($args);
                        while ($chavos_query->have_posts()) {
                            $chavos_query->the_post();
                    ?>
                    <div class="owl-hero-item" style="background-image: url('<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/hero.jpg' ?>')">
                        <div class="owl-hero-caption">
                            <div class="container-fluid">
                                <div class="owl-hero-post">
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <h2 class="owl-hero-post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                                        </div>
                                        <div class="span6">
                                            <div class="owl-hero-links">
                                                <a href="<?php echo get_term_link('los-chavos-de-maria', 'series'); ?>" class="btn btn-white-blue">Ver más</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_postdata();?>
                </div>
                <div id="main-hero-controls" class="owl-carousel owl-loaded owl-theme owl-hero-controls">
                    <div class="container-fluid">
                        <div class="owl-controls">
                            <div class="owl-nav owl-nav-lcdm"></div>
                            <div class="owl-dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $lcdm_navbar_theme = 'dark'; ?>
        <?php get_template_part('partials/los-chavos-de-maria/menu'); ?>

        <!-- Emergency response embed -->
        <div>
            <iframe src="https://embed.kumu.io/1ef45532e322f0bc09ef906a778c662f#dummy-personajes" width="940" height="600" frameborder="0"></iframe>
        </div>

        <!-- Mapa de la recuepracion section -->
        <div class="lcdm-section lcdm-section-map">
            <div class="lcdm-section-title">
                <i class="lcdm-icon lcdm-icon-mapa"></i>
                <div>MAPA DE LA<br/>RECUPERACIÓN</div>
            </div>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2"></div>
                    <div class="span8">
                        <div id="jsmap-puertorico" class="jsmaps-wrapper"></div>
                        <div id="jsmap-description" class="jsmaps-table-wrapper"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Infografias section -->
        <div class="lcdm-section lcdm-section-graficas">
            <div class="lcdm-section-title">
                <i class="lcdm-icon lcdm-icon-graficas"></i>
                <div>GRÁFICAS</div>
            </div>

            <div class="container-fluid">
                <br/>
                <br/>
                <br/>
                <div class="owl-hero-carousel">
                    <div id="inphographic-hero-carousel" class="owl-carousel owl-theme">
                        <?php
                            $args = array(
                                'post_type' => 'cpipr_inphographic',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'post_tag',
                                        'field'    => 'slug',
                                        'terms'    => 'featured',
                                    )
                                ),
                                'order' => 'DESC',
                                'posts_per_page' => 5,
                                'post_status' => 'publish'
                            );
                            $cpipr_inphographic_link = get_post_type_archive_link('cpipr_inphographic');
                            $chavos_query = new WP_Query($args);
                            while ($chavos_query->have_posts()) {
                                $chavos_query->the_post();
                        ?>
                        <div class="owl-hero-item">
                            <?php echo the_post_thumbnail('full') ?>
                        </div>
                        <?php } wp_reset_postdata();?>
                    </div>
                </div>
                <div id="inphographic-controls" class="owl-carousel owl-loaded owl-theme owl-theme-blue owl-default-controls owl-inline-controls">
                    <div class="owl-controls">
                        <div class="owl-nav owl-nav-lcdm"></div>
                        <div class="owl-dots"></div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $cpipr_inphographic_link ?>" class="btn btn-blue">Ver más</a>
                </div>
            </div>
        </div>

        <!-- Video slider -->
        <div class="lcdm-section lcdm-section-videos">
            <div class="lcdm-section-title">
                <i class="lcdm-icon lcdm-icon-videos"></i>
                <div>VIDEOS</div>
            </div>

            <div class="owl-hero-carousel">
                <div id="video-hero-carousel" class="owl-carousel owl-theme">
                    <?php
                        $args = array(
                            'post_type' => 'cpipr_video',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'post_tag',
                                    'field'    => 'slug',
                                    'terms'    => 'featured',
                                )
                            ),
                            'order' => 'DESC',
                            'posts_per_page' => 5,
                        );
                        $cpipr_video_link = get_post_type_archive_link('cpipr_video');
                        $chavos_query = new WP_Query($args);
                        while ($chavos_query->have_posts()) {
                            $chavos_query->the_post();
                    ?>
                    <div class="owl-hero-item" style="background-image: url('<?php echo the_post_thumbnail_url('full') ?>')">
                        <div class="owl-hero-caption">
                            <div class="container-fluid">
                                <div class="owl-hero-post owl-hero-video-post">
                                    <a data-fancybox href="<?php echo get_the_excerpt(); ?>" class="owl-play-icon"></a>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <h2 class="owl-hero-post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                                        </div>
                                        <div class="span6">
                                            <div class="owl-hero-links">
                                                <a href="<?php echo $cpipr_video_link ?>" class="btn btn-white-blue">Ver más</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_postdata();?>
                </div>
                <div id="video-hero-controls" class="owl-carousel owl-loaded owl-theme owl-hero-controls">
                    <div class="container-fluid">
                        <div class="owl-controls">
                            <div class="owl-nav owl-nav-lcdm"></div>
                            <div class="owl-dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ingegration Documentos section -->
        <div class="lcdm-section lcdm-section-documentos">
            <div class="lcdm-section-title">
                <i class="lcdm-icon lcdm-icon-documentos"></i>
                <div>DOCUMENTOS</div>                
            </div>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2"></div>
                    <div class="span8">
                        <div id="DC-search-projectid-43548-pruebas-para-los-chavos-de-mar-a" class="DC-embed DC-embed-search DC-search-container"></div>
                        <script src="//assets.documentcloud.org/embed/loader.js"></script>
                        <script>
                            dc.embed.load('https://www.documentcloud.org/search/embed/', {
                            q: "projectid: 43548-pruebas-para-los-chavos-de-mar-a ",
                            container: "#DC-search-projectid-43548-pruebas-para-los-chavos-de-mar-a",
                            title: "",
                            order: "created_at",
                            per_page: 8,
                            search_bar: true,
                            organization: 2426
                            });
                        </script>
                        <noscript>
                            <a href="https://www.documentcloud.org/public/search/projectid%3A%2043548-pruebas-para-los-chavos-de-mar-a%20">View/search document collection</a>
                        </noscript>
                    </div>
                </div>
            </div>
        </div>

        <!-- Glosario section -->
        <div class="lcdm-section lcdm-section-glosario">
            <div class="lcdm-section-title">
                <i class="lcdm-icon lcdm-icon-glosario"></i>
                <div>GLOSARIO</div>
            </div>
            <div class="container-fluid">
                <br/>
                <br/>
                <br/>
                <br/>
                <div class="owl-glossary-carousel">
                    <div id="glossary-carousel" class="owl-carousel owl-theme">
                        <?php
                            $args = array(
                                'post_type' => 'glossary',
                                'order' => 'DESC',
                                'posts_per_page' => 5,
                            );
                            $chavos_category = get_category_by_slug('los-chavos-de-maria');
                            $chavos_query = new WP_Query($args);
                            while ($chavos_query->have_posts()) {
                                $chavos_query->the_post();
                        ?>
                        <div class="owl-glossary-item">
                            <div class="row-fluid">
                                <div class="span6">
                                    <h2 class="glossary-title"><?php the_title(); ?></h2>
                                </div>
                                <div class="span6">
                                    <div class="glossary-description">
                                        <?php the_content(); ?>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } wp_reset_postdata();?>
                    </div>
                    <div id="glossary-controls" class="owl-carousel owl-loaded owl-theme owl-theme-white owl-default-controls owl-inline-controls">
                        <div class="owl-controls">
                            <div class="owl-nav owl-nav-lcdm"></div>
                            <div class="owl-dots"></div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_post_type_archive_link( 'glossary' ); ?>" class="btn btn-white-blue">VER TODOS</a>    
                    </div>
                </div>                    
            </div>
        </div>

        <!-- Twitter feed -->
        <div class="lcdm-section lcdm-section-twitter">
            <div class="container-fluid">
                <div class="lcdm-twitter-feed-wrapper">
                    <div class="lcdm-twitter-feed">
                        <div class="lcdm-hashtag">#LOSCHAVOSDEMARÍA</div>
                        <div class="lcdm-twitter-box">
                            <h4>LIVE TWITTER FEED</h4>
                            <div></div>
                        </div>
                    </div>
                    <div class="lcdm-twitter-feed-body">
                        <div class="lcdm-twitter-feed-body-border">
                            <div class="lcdm-twitter-box">
                                <h2>¿SABES DE ALGÚN MAL MANEJO DE FONDOS DE RECUPERACIÓN?</h2>
                                <br/>
                                <br/>
                                <h2 class="text-black">CUÉNTANOS.</h2>
                            </div>
                            <div class="lcdm-twitter-feed-info-box">
                                <a href="#" class="btn btn-white-blue">ENVIAR INFO</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php get_template_part('partials/los-chavos-de-maria/footer'); ?>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    $('#top-hero-carousel').owlCarousel({
                        autoplay: false,
                        loop: true,
                        items: 1,
                        nav: true,
                        dots: true,
                        mergeControls: true,
                        autoHeight: true,
                        navContainer: '#main-hero-controls .owl-nav',
                        dotsContainer: '#main-hero-controls .owl-dots',
                        navText: [
                            '<span class="lcdm-icon lcdm-icon-arrow-left" aria-label="' + 'Previous' + '"></span>',
                            '<span class="lcdm-icon lcdm-icon-arrow-right" aria-label="' + 'Next' + '"></span>'
                        ],
                    });
                });
            })(jQuery);
        </script>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    function buildContractRow(row) {
                        var template =
                            '<tr>' +
                                '<td>' + row.agencia + '</td>' +
                                '<td>' + row.fecha + '</td>' +
                                '<td>' + row.fuente + '</td>' +
                                '<td>' + row.uso_fondos + '</td>' +
                                '<td>' + row.total_separado + '</td>' +
                                '<td>' + row.total_desembolsado + '</td>' +
                            '</tr>';
                        return template;
                    }

                    function buildContractsHeader() {
                        var template = '<thead>' +
                            '<tr>' +
                                '<th>Agencia</th>' +
                                '<th>Fecha</th>' +
                                '<th>Fuente</th>' +
                                '<th>Uso de Fondos</th>' +
                                '<th>Total Separado</th>' +
                                '<th>Total Desembolsado</th>' +
                            '</tr>'
                        '</thead>';
                        return template;
                    }

                    function buildContractsTable (data) {
                        var template = '<div class="table-responsive"><table>';
                        template += buildContractsHeader();
                        template += '<tbody>';

                        for (var i=0; i < data.length; i++) {
                            var row = buildContractRow(data[i]);
                            template += row;
                        }
                        template += '</tbody>';
                        template += '</table></div>';

                        return template;
                    }

                    $('#jsmap-puertorico').JSMaps({
                        map: 'puertoRico',
                        onStateClick: function (data) {
                            /* data = { name: '', text: '' } */
                            var url = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
                            $.ajax({
                                beforeSend: function (qXHR) {
                                    $('#jsmap-puertorico .jsmaps-text').html('Cargando...');
                                    $('#jsmap-description').html('');
                                },
                                type: 'get',
                                url: url + '?action=pr_cities_contracts&city=' + data.name,
                                success: function (response) {
                                    var content = data.text;
                                    var table = buildContractsTable(response.data);
                                    $('#jsmap-puertorico .jsmaps-text').html(content);
                                    $('#jsmap-description').html(table);
                                }
                            });
                        }
                    });

                    $('#jsmap-puertorico').trigger('stateClick', 'San Juan');
                });
            })(jQuery);
        </script>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    $('#inphographic-hero-carousel').owlCarousel({
                        autoplay: false,
                        loop: true,
                        items: 1,
                        nav: true,
                        dots: true,
                        mergeControls: true,
                        autoHeight: true,
                        navContainer: '#inphographic-controls .owl-nav',
                        dotsContainer: '#inphographic-controls .owl-dots',
                        navText: [
                            '<span class="lcdm-icon lcdm-icon-arrow-left" aria-label="' + 'Previous' + '"></span>',
                            '<span class="lcdm-icon lcdm-icon-arrow-right" aria-label="' + 'Next' + '"></span>'
                        ],
                    });
                });
            })(jQuery);
        </script>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    $('#video-hero-carousel').owlCarousel({
                        autoplay: false,
                        loop: true,
                        items: 1,
                        nav: true,
                        dots: true,
                        mergeControls: true,
                        autoHeight: true,
                        navContainer: '#video-hero-controls .owl-nav',
                        dotsContainer: '#video-hero-controls .owl-dots',
                        navText: [
                            '<span class="lcdm-icon lcdm-icon-arrow-left" aria-label="' + 'Previous' + '"></span>',
                            '<span class="lcdm-icon lcdm-icon-arrow-right" aria-label="' + 'Next' + '"></span>'
                        ],
                    });
                });
            })(jQuery);
        </script>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    $('#glossary-carousel').owlCarousel({
                        autoplay: false,
                        loop: true,
                        items: 1,
                        nav: true,
                        dots: true,
                        mergeControls: true,
                        autoHeight: true,
                        navContainer: '#glossary-controls .owl-nav',
                        dotsContainer: '#glossary-controls .owl-dots',
                        navText: [
                            '<span class="lcdm-icon lcdm-icon-arrow-left" aria-label="' + 'Previous' + '"></span>',
                            '<span class="lcdm-icon lcdm-icon-arrow-right" aria-label="' + 'Next' + '"></span>'
                        ],
                    });
                });
            })(jQuery);
        </script>
    </body>
</html>