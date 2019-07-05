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

        <!-- ScrollTo -->
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/scrollTo/jquery.scrollTo.min.js' ?>" type="text/javascript"></script>
    </head>

    <body <?php body_class(); ?>>
        <?php $lcdm_active_menu = 'videos'; ?>
        <?php get_template_part('partials/los-chavos-de-maria/header'); ?>
        <?php get_template_part('partials/los-chavos-de-maria/menu'); ?>


        <!-- Hero Page Title  -->
        <div class="lcdm-hero-page-title-wrapper">
            <div class="lcdm-hero-page-title-overlay">
                <div class="lcdm-hero-page-title-media">
                    <div class="lcdm-hero-page-title-icon">
                        <i class="lcdm-icon lcdm-icon-videos"></i>
                    </div>
                    <div class="lcdm-hero-page-title">
                        <h1>VIDEOS</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Videos section -->
        <div class="lcdm-section">
            <div class="container-fluid">
                <?php if (have_posts()) { the_post(); ?>
                <div id="video-player-section" class="cpipr-video-player">
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="video-player" class="embed-responsive-item" src="<?php echo get_the_excerpt(); ?>"></iframe>
                    </div>
                </div>
                <?php } ?>
                <div id="posts-container"></div>
                <div class="text-center">
                    <div class="lcdm-spinner"></div>
                    <a id="load-more" href="#" class="btn btn-lg btn-black">Cargar Más</a>
                </div>
            </div>
        </div>

        <?php get_template_part('partials/los-chavos-de-maria/footer'); ?>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    var currentPage = 1;
                    function loadPosts() {
                        var loadMore = $('#load-more');
                        var url = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
                        $.ajax({
                            beforeSend: function (qXHR) {
                                $('.lcdm-spinner').html('<i class="fa fa-spinner fa-spin"></i>');
                                loadMore.addClass('disabled');
                            },
                            type: 'get',
                            url: url + '?action=lcdm_videos&page=' + currentPage,
                            success: function (response) {
                                $('.lcdm-spinner').html('');
                                if (response) {
                                    currentPage++;
                                    $('#posts-container').append(response);                                    
                                    loadMore.removeClass('disabled');
                                } else {
                                    loadMore.remove();
                                }
                            }
                        });
                    }

                    $('#load-more').on('click', function (event) {
                        event.preventDefault();
                        loadPosts();
                    }).ready(loadPosts());
                });
            })(jQuery);
        </script>

        <script type="text/javascript">
            (function ($) {
                var videoPlayerSection = $('#video-player-section');
                var videoPlayer = $('#video-player');
                $(document).ready(function () {
                    $('#posts-container').on('click', '.card-video-play', function (event) {
                        event.preventDefault();
                        var href = $(this).attr('href');
                        videoPlayer.attr('src', href);
                        $.scrollTo(videoPlayerSection, 500);
                    });
                });
            })(jQuery);
        </script>
    </body>
</html>