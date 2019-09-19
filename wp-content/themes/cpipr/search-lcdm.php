<?php
/**
 * Template Name: Search LCDM
 * Description: Search Page for Los Chavos de Maria
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

        <!-- Bootstrap tagsinput -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/lib/tagify/dist/tagify.css' ?>">
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/tagify/dist/tagify.js' ?>" type="text/javascript"></script>

    </head>

    <body <?php body_class(); ?>>
        <?php
            $lang = isset($_GET['lang']) ? $_GET['lang'] : 'es';
        ?>
        <?php $lcdm_active_menu = 'historias'; ?>
        <?php get_template_part('partials/los-chavos-de-maria/' . ($lang == 'spanish' ? 'es' : 'en') .'/header'); ?>
        <?php get_template_part('partials/los-chavos-de-maria/' . ($lang == 'spanish' ? 'es' : 'en') .'/menu'); ?>


        <div class="lcdm-search-tags">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span9">
                        <form id="searchForm" action="<?php echo get_permalink( get_page_by_path( 'los-chavos-de-maria-busqueda' ) ) ?>">
                            <input id="searchInput" type="text" value="<?php echo strip_tags($_GET['q']) ?>" placeholder="<?php echo $lang == 'spanish' ? 'Búsqueda' : 'Search'; ?>"/>
                            <input id="searchInputValue" type="hidden" name="q" value="<?php echo strip_tags($_GET['q']) ?>"/>
                            <input type="hidden" name="lang" value="<?php echo $lang == 'spanish' ? 'es' : 'en'; ?>">
                        </form>
                    </div>
                    <div class="span3">
                        <div id="searchTags" class="search-tags"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Results section -->
        <div class="container-fluid">
            <h3 class="lcdm-title"><?php echo $lang == 'english' ? 'RESULTS' : 'RESULTADOS' ?></h3>
            <div id="posts-container"></div>
            <div class="text-center">
                <div class="lcdm-spinner"></div>
                <a id="load-more" href="#" class="btn btn-lg btn-black"><?php echo $lang == 'english' ? 'LOAD MORE' : 'CARGAR MÁS' ?></a>
            </div>
            <br/>
            <br/>
            <br/>
        </div>

        <?php get_template_part('partials/los-chavos-de-maria/' . ($lang == 'spanish' ? 'es' : 'en') . '/footer'); ?>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    var currentPage = 1;
                    function loadPosts() {
                        var loadMore = $('#load-more');
                        var url = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
                        var lang = '<?php echo $lang; ?>';
                        var q = $('#searchInputValue').val();
                        $.ajax({
                            beforeSend: function (qXHR) {
                                $('.lcdm-spinner').html('<i class="fa fa-spinner fa-spin"></i>');
                                loadMore.addClass('disabled');
                            },
                            type: 'get',
                            url: url + '?action=lcdm_historias&q=' + q + '&lang=' + lang + '&page=' + currentPage,
                            success: function (response) {
                                $('.lcdm-spinner').html('');
                                if (response) {
                                    currentPage++;
                                    $('#posts-container').append(response);                                    
                                    loadMore.removeClass('disabled');

                                    // Remove load more button if there is not 3 posts.
                                    if ($(response).find('.span4').length < 3) {
                                        loadMore.remove();
                                    }
                                } else {
                                    loadMore.remove();
                                    $('#posts-container').append('Su búsqueda no arrojó resultados.');
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
                $(document).ready(function () {
                    var searchForm = $('#searchForm');
                    var input = document.getElementById('searchInput');
                    var tagsContainer = document.getElementById('searchTags');

                    // init Tagify script on the above inputs
                    tagify = new Tagify(input, {
                        transformTag: function (a) {
                            return a.value;
                        }
                    });

                    // add a class to Tagify's input element
                    tagify.DOM.input.classList.add('tagify__input--outside');

                    // re-place Tagify's input element outside of the  element (tagify.DOM.scope), just before it
                    tagsContainer.appendChild(tagify.DOM.input);
                    //tagify.DOM.scope.parentNode.insertBefore(tagify.DOM.input, tagify.DOM.scope);

                    tagify.on('add', function (event) {
                        var values = [];
                        $.each(tagify.value, function (index, element) {
                            values.push(element.value);
                        });
                        $('#searchInputValue').val(values.join(','));
                        searchForm.submit();
                    });

                    tagify.on('remove', function (event) {
                        var values = [];
                        $.each(tagify.value, function (index, element) {
                            values.push(element.value);
                        });
                        $('#searchInputValue').val(values.join(','));
                        searchForm.submit();
                    });
                });
            })(jQuery);
        </script>
    </body>
</html>