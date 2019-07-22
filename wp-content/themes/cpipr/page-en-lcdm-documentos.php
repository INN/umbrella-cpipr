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
        <?php $lcdm_active_menu = 'documentos'; ?>
        <?php get_template_part('partials/los-chavos-de-maria/en/header'); ?>
        <?php get_template_part('partials/los-chavos-de-maria/en/menu'); ?>


        <!-- Hero Page Title  -->
        <div class="lcdm-hero-page-title-wrapper">
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

        <?php get_template_part('partials/los-chavos-de-maria/en/footer'); ?>
    </body>
</html>