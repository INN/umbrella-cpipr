<?php
/**
 * Template Name: Lcdm single
 * Template Post Type: post
 * Description: Shows the post with formatting for custom layout display?
 */

    // Load up our meta data and whatnot
    the_post();
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

        <!-- ScrollTo -->
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/scrollTo/jquery.scrollTo.min.js' ?>" type="text/javascript"></script>

        <!-- Simple Parallax -->
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/simpleParallax/dist/simpleParallax.min.js' ?>" type="text/javascript"></script>

    </head>

    <body <?php body_class(); ?>>
        <?php $lang = has_tag('spanish') ? 'spanish' : 'english'; ?>
        <?php $lcdm_active_menu = 'historias'; ?>
        <?php get_template_part('partials/los-chavos-de-maria/' . ($lang == 'spanish' ? 'es' : 'en') .'/header'); ?>
        <?php get_template_part('partials/los-chavos-de-maria/' . ($lang == 'spanish' ? 'es' : 'en') .'/menu'); ?>

        <div class="owl-hero-carousel">
            <div class="owl-theme">
                <div class="owl-hero-item owl-hero-item-parallax">
                    <div class="owl-hero-image">
                        <img src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/hero.jpg' ?>" />
                    </div>
                    <div class="owl-hero-caption">
                        <div class="container-fluid">
                            <div class="owl-hero-post">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <h2 class="owl-hero-post-title"><?php the_title(); ?></h2>
                                    </div>
                                </div>
                                <div class="owl-hero-journalist">
                                    <em>POR</em> <img src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/jennifer-wiscovitch.jpg' ?>" class="owl-hero-journalist-avatar"/> <span class="owl-hero-journalist-name">Jennifer Wiscovich</span> | <span class="owl-hero-post-date">27 de Febrero, 2019</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lcdm-section lcdm-section-post">
            <div class="container">
                <?php the_content();?>    
            </div>
        </div>
                

        <div class="lcdm-section lcdm-section-biography">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2"></div>
                    <div class="span8">
                        <div class="lcdm-journalist">
                            <h3>Biografía del Periodista</h3>
                            <div class="row-fluid">
                                <div class="span5">
                                    <div class="lcdm-journalist-picture">
                                        <img src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/jennifer-wiscovitch.jpg' ?>"/>
                                    </div>
                                </div>
                                <div class="span7">
                                    <div class="lcdm-journalist-personal-info">
                                        <h4>Jennifer Wiscovitch</h4>
                                        <p>Periodista con más de 10 años de experiencia, cubriendo temas de salud y medioambiente. Inició su labor periodística en la zona oeste de Puerto Rico, de donde es natal, luego de haber cursado estudios en periodismo en la Universidad del Sagrado Corazón. Ha trabajado en medios especializados en salud, como la revista de Medicina y Salud Pública. Su trabajo periodístico y su impacto a la comunidad ha sido reconocido por organizaciones comunitarias como el Club de Leones y la Unión de Mujeres de las Américas. Colabora en el CPI desde octubre de 2017.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lcdm-section">
            <div class="container-fluid">
                <h3 class="lcdm-related-post-title">Historias Relacionadas</h3>

                <div class="row-fluid">
                    <?php
                        $lang = has_tag('spanish') ? 'spanish' : 'english';
                        $args = array(
                            'post_type' => 'post',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'series',
                                    'field'    => 'slug',
                                    'terms'    => 'los-chavos-de-maria',
                                ),
                                array(
                                    'taxonomy' => 'post_tag',
                                    'field'    => 'slug',
                                    'terms'    => $lang
                                )
                            ),
                            'order' => 'DESC',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'post__not_in' => array(get_the_ID())
                        );
                        $chavos_query = new WP_Query($args);
                        while ($chavos_query->have_posts()) {
                            $chavos_query->the_post();
                    ?>
                    <div class="span4">
                        <div class="card card-inphographic">
                            <div class="card-image-top">
                                <?php echo the_post_thumbnail('full') ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                                <p class="card-text card-post-date clearfix">
                                    <?php echo get_the_date(); ?>
                                    <a href="<?php the_permalink();?>" class="btn btn-white-blue pull-right">LEER MAS</a>        
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_postdata();?>
                    
                </div>
            </div>
        </div>


        <?php get_template_part('partials/los-chavos-de-maria/' . ($lang == 'spanish' ? 'es' : 'en') . '/footer'); ?>

        <script type="text/javascript">
            (function ($) {
                var images = document.querySelectorAll('.wp-caption-img-wrap img');
                new simpleParallax(images, {
                    orientation: 'down',
                    delay: 0.2,
                    scale: 1.4
                });

                var heros = document.querySelectorAll('.owl-hero-image img');
                new simpleParallax(heros, {
                    orientation: 'down',
                    delay: 0.2,
                    scale: 1.4
                });
            })(jQuery);
        </script>

    </body>
</html>