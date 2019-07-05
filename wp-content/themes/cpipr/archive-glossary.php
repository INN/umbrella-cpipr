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
        <!-- ScrollTo -->
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/scrollTo/jquery.scrollTo.min.js' ?>" type="text/javascript"></script>
    </head>

    <body <?php body_class(); ?>>
        <?php $lcdm_active_menu = 'glosario'; ?>
        <?php get_template_part('partials/los-chavos-de-maria/header'); ?>
        <?php get_template_part('partials/los-chavos-de-maria/menu'); ?>


        <!-- Hero Page Title  -->
        <div class="lcdm-hero-page-title-wrapper">
            <div class="lcdm-hero-page-title-overlay">
                <div class="lcdm-hero-page-title-media">
                    <div class="lcdm-hero-page-title-icon">
                        <i class="lcdm-icon lcdm-icon-glosario"></i>
                    </div>
                    <div class="lcdm-hero-page-title">
                        <h1>GLOSSARY</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="lcdm-section lcdm-section-glosario">
            <div class="container-fluid">
                <div class="glossary-terms">
                    <?php 
                        $html        = '';
                        $alpha_index = $alpha_terms = array();
                        $args  = array(
                            'post_type'      => 'glossary',
                            'posts_per_page' => -1,
                            'order'          => 'ASC',
                            'orderby'        => 'title',
                        );
                        $terms    = new WP_Query( $args );
                        // $base_url = gl_get_base_url();
                        foreach ( $terms->posts as $post ) {
                            $initial_index = $post->post_title;
                            if ( gl_is_latin( $initial_index ) ) {
                                $initial_index = mb_strtolower( $initial_index );
                            }

                            $initial_index = mb_substr( $initial_index, 0, 1 );
                            // $link          = '#' . $initial_index;
                            // if ( $atts[ 'anchor' ] === 'false' ) {
                            //     $link = add_query_arg( 'az', $initial_index, $base_url );
                            // }

                            $alpha_index[ $initial_index ]              = '<option value="' . $initial_index . '">' . strtoupper($initial_index) . '</option>';
                            $alpha_terms[ $initial_index ][ $post->ID ] = $post->post_title;
                        }

                        $letters = range( 'A', 'Z' );
                        foreach ( $letters as $letter ) {
                            if ( !isset( $alpha_index[ strtolower( $letter ) ] ) ) {
                                $alpha_index[ strtolower( $letter ) ] = '<option value="' . strtolower($letter) . '">' . strtoupper( $letter ) . '</option>';
                            }
                        }

                        if ( extension_loaded( 'intl' ) ) {
                            collator_asort( collator_create( 'root' ), $alpha_index );
                        } else {
                            ksort( $alpha_index );
                            ksort( $alpha_terms );
                        }

                        foreach ( $alpha_terms as $letter => $terms ) {
                            $html .= '<div class="glossary-block glossary-block-' . $letter . '">';
                            $html .= '<span class="glossary-letter" id="' . $letter . '">' . $letter . '</span>';
                            $html .= '<div class="glossary-term">';
                            foreach ( $terms as $id => $title ) {
                                $html  .= '<div class="row-fluid">';
                                // $anchor = $title;
                                // if ( $atts[ 'noanchorterms' ] === 'false' ) {
                                //     $anchor = '<a href="' . get_permalink( $id ) . '">' . $title . '</a>';
                                // }

                                $html .= '<div class="span6">';
                                $html .= '<h2 class="glossary-title">' . $title . '</h2>';
                                $html .= '</div>' . "\n";

                                //$html .= '<span class="glossary-link-item">' . $anchor;
                                // if ( $atts[ 'excerpt' ] === 'true' ) {
                                //     $excerpt = get_the_excerpt( $id );
                                //     if ( !empty( $excerpt ) ) {
                                //         $html .= $separator . '<span class="glossary-list-term-excerpt">' . $excerpt . '</span>';
                                //     }
                                // }

                                $content = get_post_field( 'post_content', $id );
                                $content = apply_filters( 'the_content', $content );
                                $content = str_replace( ']]>', ']]&gt;', $content );
                                if ( !empty( $content ) ) {
                                    $html .= '<div class="span6">';
                                    $html .= '<div class="glossary-description">' . $content . '</div>' . "\n";
                                    $html .= '</div>';
                                    // $html .= $separator . '<span class="glossary-list-term-content">' . $content . '</span>';
                                }                        

                                $html .= '</div>' . "\n";
                            }

                            $html .= '</div>' . "\n";
                            $html .= '</div>';
                        }

                        $html .= '</div>';
                    ?>

                    <div class="glossary-term-bar clearfix">
                        <div class="jsmaps-select mobile">
                            <select id="glossary-select">
                                <option value="">Búsqueda según letra</option>
                                <?php echo implode( "\n", $alpha_index ); ?>
                            </select>
                            <div class="jsmaps-select-icon">
                                <div class="jsmaps-icon jsmaps-icon-chevron jsmaps-icon-chevron-down jsmaps-theme-light"></div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="glossary-term-list">
                        <?php echo $html; ?>
                    </div>
                </div>
            </div>
        </div>
            

        <?php get_template_part('partials/los-chavos-de-maria/footer'); ?>

        <script type="text/javascript">
            (function ($) {
                $('#glossary-select').change(function (event) {
                    var letter = $(this).val();
                    if (letter) {
                        $.scrollTo($('#' + letter), 500);
                    }
                });
            })(jQuery);
        </script>
    </body>
</html>