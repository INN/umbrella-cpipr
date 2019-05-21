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
                                                <a href="<?php echo get_category_link($chavos_category) ?>" class="btn btn-white-blue"><?php _e('View All', 'cpipr'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_postdata();?>
                </div>
                <div class="owl-carousel owl-loaded owl-theme owl-hero-controls text-right">
                    <div class="container-fluid">
                        <div class="owl-controls">
                            <div class="owl-nav"></div>
                            <div class="owl-dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Emergency response embed -->
        <!-- <div>
            <iframe src="https://embed.kumu.io/1ef45532e322f0bc09ef906a778c662f#dummy-personajes" width="940" height="600" frameborder="0"></iframe>
        </div> -->

        <!-- Mapa de la recuepracion section -->
        <div class="lcdm-section lcdm-section-map">
            <div class="lcdm-section-title">
                <img src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/icon-mapa-recperacion.png' ?>"/>
                <div>MAPA DE LA RECUPERACIÓN</div>
            </div>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span1"></div>
                    <div class="span10">
                        <div id="jsmap-puertorico" class="jsmaps-wrapper"></div>
                        <br/>
                        <br/>
                        <p class="text-center">
                            <a href="<?php echo get_permalink( get_page_by_path( 'los-chavos-de-maria-mapas-de-la-recuperacion' ) ) ?>" class="btn btn-white-blue">VER MÁS</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Infografias section -->
        <div class="lcdm-section">
            <div class="lcdm-section-title">
                <img src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/icon-infografias.png' ?>"/>
                <div>INFOGRÁFICAS</div>
            </div>
        </div>

        <!-- Video slider -->
        <div class="lcdm-section">
            <div class="lcdm-section-title">
                <img src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/icon-videos.png' ?>"/>
                <div>VIDEOS</div>
            </div>
            <div class="owl-carousel-1 owl-theme">
                <div class="item">
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen=""></iframe>
                    </div>
                    <div>
                        <div class="row-fluid">
                            <div class="span6">
                                <h2>
                                    Proceso de trabajo de la investigación 'Los Muertos de María'
                                    <small>27 de febrero, 2019</small>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ingegration Documentos section -->
        <div class="lcdm-section lcdm-section-documentos">
            <div class="lcdm-section-title">
                <img src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/icon-historias.png' ?>"/>
                DOCUMENTOS
            </div>
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
                        <br/>
                        <p class="text-center">
                            <a href="<?php echo get_permalink( get_page_by_path( 'los-chavos-de-maria-documentos' ) ) ?>" class="btn btn-white-blue">VER MÁS</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Glosario section -->
        <div class="lcdm-section lcdm-section-glosario">
            <div class="lcdm-section-title">
                <img src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/icon-glosario.png' ?>"/>
                <div>GLOSARIO</div>
            </div>
            <div class="container-fluid">
                <div class="text-right">
                    <a href="<?php echo get_post_type_archive_link( 'glossary' ); ?>" class="btn btn-white-blue">VER TODOS</a>    
                </div>
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
                    <div class="owl-carousel owl-loaded owl-theme owl-default-controls text-right">
                        <div class="owl-controls">
                            <div class="owl-nav"></div>
                            <div class="owl-dots"></div>
                        </div>
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
                        navContainer: '.owl-hero-controls .owl-nav',
                        dotsContainer: '.owl-hero-controls .owl-dots',
                        navText: [
                            '<span aria-label="' + 'Previous' + '"></span>',
                            '<span aria-label="' + 'Next' + '"></span>'
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

                        for (var i=0; i < data.length; i++) {
                            var row = buildContractRow(data[i]);
                            template += row;
                        }

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
                                },
                                type: 'get',
                                url: url + '?action=pr_cities_contracts&city=' + data.name,
                                success: function (response) {
                                    var content = data.text;
                                    content += buildContractsTable(response.data);
                                    $('#jsmap-puertorico .jsmaps-text').html(content);
                                }
                            });
                        }
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
                        navContainer: '.owl-default-controls .owl-nav',
                        dotsContainer: '.owl-default-controls .owl-dots',
                        navText: [
                            '<span aria-label="' + 'Previous' + '"></span>',
                            '<span aria-label="' + 'Next' + '"></span>'
                        ],
                    });
                });
            })(jQuery);
        </script>
    </body>
</html>