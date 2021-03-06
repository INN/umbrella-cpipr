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
    </head>

    <body <?php body_class(); ?>>
        <?php $lang = has_tag('spanish') ? 'spanish' : 'english'; ?>
        <?php $lcdm_active_menu = 'videos'; ?>
        <?php get_template_part('partials/los-chavos-de-maria/' . ($lang == 'spanish' ? 'es' : 'en') .'/header'); ?>
        <?php get_template_part('partials/los-chavos-de-maria/' . ($lang == 'spanish' ? 'es' : 'en') .'/menu'); ?>

        <div class="owl-hero-carousel">
            <div class="owl-theme">
                <div class="owl-hero-item"> 
                <div class="owl-hero-caption" style="margin-top:0;padding-top: 2px;padding-bottom: 2px;">
                        <div class="container-fluid">
                            <div class="owl-hero-post">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <!-- <h2 class="owl-hero-post-title"><?php the_title(); ?></h2> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lcdm-section lcdm-section-post" style="padding-bottom: 20px;padding-top: 10px;">
            <div class="container-fluid" style="max-width: 2000px; ">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="<?php echo get_the_content(); ?>"></iframe>
                </div>
            </div>
        </div>

        <div class="lcdm-section">
            <div class="container-fluid">
                <h3 class="lcdm-related-post-title"><?php echo $lang == 'spanish' ? 'Historias Relacionadas' : 'Related Stories' ?></h3>

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
                                    'terms'    => array('video'),
                                    'operator' => 'IN'
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
                                <!-- <div class="lcdm-owl-overlay"></div> -->
                                <?php echo the_post_thumbnail('horizontal_thumb') ?>
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

    </body>
</html>