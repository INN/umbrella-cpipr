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
        <div></div>

        <!-- Mapa de la recuepracion section -->
        <div>
            <div>
                <img src=""/>
                MAPA DE LA RECUPERACIÓN
            </div>
        </div>

        <!-- Infografias section -->
        <div>
            <div>
                <img src=""/>
                INFOGRÁFICAS
            </div>
        </div>

        <!-- Video slider -->
        <div>
            <div>
                <img src=""/>
                VIDEOS
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
        <div>
            <div>
                <img src=""/>
                DOCUMENTOS
            </div>
        </div>

        <!-- Glosario section -->
        <div>
            <div>
                <img src=""/>
                GLOSARIO
            </div>
            <div class="container">
                <a href="#" class="btn">VER TODOS</a>
                <p>TÉRMINOS DEL DÍA</p>
                <div class="owl-carousel-1">
                    <div class="item">
                        <div class="row-fluid">
                            <div class="span6">
                                <h2>ASISTENCIA FEDERAL</h2>
                            </div>
                            <div class="span6">
                                <p>La asistencia federal es un programa, servicio o actividad federal que ayuda directamente a organizaciones, individuos o gobiernos estatales, locales, tribales. Los sectores incluyen educación, salud, seguridad pública y bienestar público, por nombrar algunos. La asistencia financiera se distribuye de muchas formas, incluidas subvenciones, préstamos, pagos directos o seguros.</p>
                            </div>
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
    </body>
</html>