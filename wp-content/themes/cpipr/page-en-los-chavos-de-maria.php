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

        <!-- Nice Select -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/lib/jquery-nice-select/css/nice-select.css' ?>">
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jquery-nice-select/js/jquery.nice-select.min.js' ?>" type="text/javascript"></script>

        <!-- JsMaps -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/css/jsmaps.css' ?>">
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/js/jsmaps-libs.js' ?>" type="text/javascript"></script>
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/js/jsmaps-panzoom.js' ?>"></script>
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/js/jsmaps.min.js' ?>" type="text/javascript"></script>
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/maps/puertoRico.js' ?>" type="text/javascript"></script>
    </head>

    <body <?php body_class(); ?>>
        <?php get_template_part('partials/los-chavos-de-maria/en/header'); ?>


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
                                ),
                                array(
                                    'taxonomy' => 'post_tag',
                                    'field'    => 'slug',
                                    'terms'    => 'english',
                                )
                            ),
                            'order' => 'DESC',
                            'posts_per_page' => 5,
                            'post_status' => 'publish'
                        );
                        $chavos_category = get_category_by_slug('los-chavos-de-maria');
                        $chavos_query = new WP_Query($args);
                        $has_history_posts = $chavos_query->have_posts();
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_postdata();?>
                </div>
                <?php if ($has_history_posts): ?>
                <div id="main-hero-controls" class="owl-carousel owl-loaded owl-theme owl-hero-controls owl-default-controls owl-inline-controls">
                    <div class="container-fluid">
                        <div class="owl-controls">
                            <div class="owl-nav owl-nav-lcdm"></div>
                            <div class="owl-dots"></div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_permalink( get_page_by_path( 'lcdm-historias' ) ) ?>" class="btn btn-white-blue">View All</a>
                    </div>
                </div>  
                <?php endif; ?>              
            </div>
        </div>

        <?php $lcdm_navbar_theme = 'dark'; ?>
        <?php get_template_part('partials/los-chavos-de-maria/en/menu'); ?>

        <!-- Power players section -->
        <div class="lcdm-section lcdm-section-graficas">
            <div class="lcdm-section-title">
                <i class="lcdm-icon lcdm-icon-personajes"></i>
                <div>POWER<br/>PLAYERS</div>
            </div>

            <div class="container-fluid">
                <br/>
                <br/>
                <br/>
                <div class="owl-hero-carousel">
                    <div id="power-players-hero-carousel" class="owl-carousel owl-theme">
                        <?php
                            $args = array(
                                'post_type' => 'cpipr_power_player',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'post_tag',
                                        'field'    => 'slug',
                                        'terms'    => 'featured',
                                    ),
                                    array(
                                        'taxonomy' => 'post_tag',
                                        'field'    => 'slug',
                                        'terms'    => 'english',
                                    )
                                ),
                                'order' => 'DESC',
                                'posts_per_page' => 5,
                                'post_status' => 'publish'
                            );
                            $chavos_query = new WP_Query($args);
                            $has_graficas_posts = $chavos_query->have_posts();
                            while ($chavos_query->have_posts()) {
                                $chavos_query->the_post();
                        ?>
                        <div class="owl-hero-item">
                            <a href="<?php the_permalink();?>">
                                <?php echo the_post_thumbnail('full') ?>    
                            </a>
                        </div>
                        <?php } wp_reset_postdata();?>
                    </div>
                </div>
                <?php if ($has_graficas_posts): ?>
                <div id="power-player-controls" class="owl-carousel owl-loaded owl-theme owl-theme-blue owl-default-controls owl-inline-controls">
                    <div class="owl-controls">
                        <div class="owl-nav owl-nav-lcdm"></div>
                        <div class="owl-dots"></div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_permalink( get_page_by_path( 'en-lcdm-personajes-de-la-recuperacion' ) ) ?>" class="btn btn-blue">Ver más</a>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Mapa de la recuepracion section -->
        <div class="lcdm-section lcdm-section-map">
            <div class="lcdm-section-title">
                <i class="lcdm-icon lcdm-icon-mapa"></i>
                <div>RECOVERY<br/>MAP</div>
            </div>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2"></div>
                    <div class="span8">
                        <div class="recovery-map">
                            <div class="lcdm-dropdown clearfix">
                                <select class="nice-select">
                                    <option value="Adjuntas">Adjuntas</option>
                                    <option value="Aguada">Aguada</option>
                                    <option value="Aguadilla">Aguadilla</option>
                                    <option value="Aguas Buenas">Aguas Buenas</option>
                                    <option value="Aibonito">Aibonito</option>
                                    <option value="Arecibo">Arecibo</option>
                                    <option value="Arroyo">Arroyo</option>
                                    <option value="Añasco">Añasco</option>
                                    <option value="Barceloneta">Barceloneta</option>
                                    <option value="Barranquitas">Barranquitas</option>
                                    <option value="Bayamón">Bayamón</option>
                                    <option value="Cabo Rojo">Cabo Rojo</option>
                                    <option value="Caguas">Caguas</option>
                                    <option value="Camuy">Camuy</option>
                                    <option value="Canóvanas">Canóvanas</option>
                                    <option value="Carolina">Carolina</option>
                                    <option value="Cataño">Cataño</option>
                                    <option value="Cayey">Cayey</option>
                                    <option value="Ceiba">Ceiba</option>
                                    <option value="Ciales">Ciales</option>
                                    <option value="Cidra">Cidra</option>
                                    <option value="Coamo">Coamo</option>
                                    <option value="Comerío">Comerío</option>
                                    <option value="Corozal">Corozal</option>
                                    <option value="Culebra">Culebra</option>
                                    <option value="Dorado">Dorado</option>
                                    <option value="Fajardo">Fajardo</option>
                                    <option value="Florida">Florida</option>
                                    <option value="Guayama">Guayama</option>
                                    <option value="Guayanilla">Guayanilla</option>
                                    <option value="Guaynabo">Guaynabo</option>
                                    <option value="Gurabo">Gurabo</option>
                                    <option value="Guánica">Guánica</option>
                                    <option value="Hatillo">Hatillo</option>
                                    <option value="Hormigueros">Hormigueros</option>
                                    <option value="Humacao">Humacao</option>
                                    <option value="Isabela">Isabela</option>
                                    <option value="Jayuya">Jayuya</option>
                                    <option value="Juana Díaz">Juana Díaz</option>
                                    <option value="Juncos">Juncos</option>
                                    <option value="Lajas">Lajas</option>
                                    <option value="Lares">Lares</option>
                                    <option value="Las Marías">Las Marías</option>
                                    <option value="Las Piedras">Las Piedras</option>
                                    <option value="Loíza">Loíza</option>
                                    <option value="Luquillo">Luquillo</option>
                                    <option value="Manatí">Manatí</option>
                                    <option value="Maricao">Maricao</option>
                                    <option value="Maunabo">Maunabo</option>
                                    <option value="Mayagüez">Mayagüez</option>
                                    <option value="Moca">Moca</option>
                                    <option value="Morovis">Morovis</option>
                                    <option value="Naguabo">Naguabo</option>
                                    <option value="Naranjito">Naranjito</option>
                                    <option value="Orocovis">Orocovis</option>
                                    <option value="Patillas">Patillas</option>
                                    <option value="Peñuelas">Peñuelas</option>
                                    <option value="Ponce">Ponce</option>
                                    <option value="Quebradillas">Quebradillas</option>
                                    <option value="Rincón">Rincón</option>
                                    <option value="Río Grande">Río Grande</option>
                                    <option value="Sabana Grande">Sabana Grande</option>
                                    <option value="Salinas">Salinas</option>
                                    <option value="San Germán">San Germán</option>
                                    <option value="San Juan" selected>San Juan</option>
                                    <option value="San Lorenzo">San Lorenzo</option>
                                    <option value="San Sebastián">San Sebastián</option>
                                    <option value="Santa Isabel">Santa Isabel</option>
                                    <option value="Toa Alta">Toa Alta</option>
                                    <option value="Toa Baja">Toa Baja</option>
                                    <option value="Trujillo Alto">Trujillo Alto</option>
                                    <option value="Utuado">Utuado</option>
                                    <option value="Vega Alta">Vega Alta</option>
                                    <option value="Vega Baja">Vega Baja</option>
                                    <option value="Vieques">Vieques</option>
                                    <option value="Villalba">Villalba</option>
                                    <option value="Yabucoa">Yabucoa</option>
                                    <option value="Yauco">Yauco</option>
                                </select>
                            </div>
                            <div id="jsmap-puertorico" class="jsmaps-wrapper"></div>
                            <div id="jsmap-description" class="jsmaps-table-wrapper"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Infografias section -->
        <div class="lcdm-section lcdm-section-graficas">
            <div class="lcdm-section-title">
                <i class="lcdm-icon lcdm-icon-graficas"></i>
                <div>GRAPHICS</div>
            </div>

            <div class="container-fluid">
                <br/>
                <br/>
                <br/>
                <div class="owl-hero-carousel">
                    <div id="inphographic-hero-carousel" class="owl-carousel owl-theme">
                        <?php
                            $args = array(
                                'post_type' => 'cpipr_infographic',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'post_tag',
                                        'field'    => 'slug',
                                        'terms'    => 'featured',
                                    ),
                                    array(
                                        'taxonomy' => 'post_tag',
                                        'field'    => 'slug',
                                        'terms'    => 'english',
                                    )
                                ),
                                'order' => 'DESC',
                                'posts_per_page' => 5,
                                'post_status' => 'publish'
                            );
                            $chavos_query = new WP_Query($args);
                            $has_graficas_posts = $chavos_query->have_posts();
                            while ($chavos_query->have_posts()) {
                                $chavos_query->the_post();
                        ?>
                        <div class="owl-hero-item">
                            <a href="<?php the_permalink();?>">
                                <?php echo the_post_thumbnail('full') ?>    
                            </a>
                        </div>
                        <?php } wp_reset_postdata();?>
                    </div>
                </div>
                <?php if ($has_graficas_posts): ?>
                <div id="inphographic-controls" class="owl-carousel owl-loaded owl-theme owl-theme-blue owl-default-controls owl-inline-controls">
                    <div class="owl-controls">
                        <div class="owl-nav owl-nav-lcdm"></div>
                        <div class="owl-dots"></div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_permalink( get_page_by_path( 'en-lcdm-graficas' ) ) ?>" class="btn btn-blue">Read More</a>
                </div>
                <?php endif; ?>
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
                                ),
                                array(
                                    'taxonomy' => 'post_tag',
                                    'field'    => 'slug',
                                    'terms'    => 'english',
                                )
                            ),
                            'order' => 'DESC',
                            'posts_per_page' => 5,
                        );
                        $cpipr_video_link = get_post_type_archive_link('cpipr_video');
                        $chavos_query = new WP_Query($args);
                        $has_video_posts = $chavos_query->have_posts();
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_postdata();?>
                </div>
                <?php if ($has_video_posts): ?>
                <div id="video-hero-controls" class="owl-carousel owl-loaded owl-theme owl-hero-controls owl-default-controls owl-inline-controls">
                    <div class="container-fluid">
                        <div class="owl-controls">
                            <div class="owl-nav owl-nav-lcdm"></div>
                            <div class="owl-dots"></div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_permalink( get_page_by_path( 'lcdm-videos' ) ) ?>" class="btn btn-white-blue">View All</a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Ingegration Documentos section -->
        <div class="lcdm-section lcdm-section-documentos">
            <div class="lcdm-section-title">
                <i class="lcdm-icon lcdm-icon-documentos"></i>
                <div>DOCUMENTS</div>                
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
                <div>GLOSSARY</div>
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
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'glossary-cat',
                                        'field'    => 'slug',
                                        'terms'    => 'english',
                                    )
                                ),
                                'order' => 'DESC',
                                'posts_per_page' => 5,
                            );
                            $chavos_category = get_category_by_slug('los-chavos-de-maria');
                            $chavos_query = new WP_Query($args);
                            $has_glosario_posts = $chavos_query->have_posts();
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
                    <?php if ($has_glosario_posts): ?>
                    <div id="glossary-controls" class="owl-carousel owl-loaded owl-theme owl-theme-white owl-default-controls owl-inline-controls">
                        <div class="owl-controls">
                            <div class="owl-nav owl-nav-lcdm"></div>
                            <div class="owl-dots"></div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_permalink( get_page_by_path( 'en-lcdm-glosario' ) ) ?>" class="btn btn-white-blue">VIEW ALL</a>    
                    </div>
                    <?php endif; ?>
                </div>                    
            </div>
        </div>

        <!-- Twitter feed -->
        <div class="lcdm-section lcdm-section-twitter">
            <div class="lcdm-section-title">
                <i class="lcdm-icon lcdm-icon-help"></i>
                <div>HELP US</div>
            </div>
            <div class="container-fluid">
                <br/>
                <div class="lcdm-twitter-feed-wrapper">
                    <div class="lcdm-twitter-feed">
                        <div class="lcdm-hashtag">#LOSCHAVOSDEMARÍA</div>
                        <div class="lcdm-twitter-box">
                            <div></div>
                        </div>
                    </div>
                    <div class="lcdm-twitter-feed-body">
                        <div class="lcdm-twitter-feed-body-border">
                            <div class="lcdm-twitter-form-info">
                                <div class="lcdm-twitter-box">
                                    <h2>DO YOU KNOW ABOUT MISMANAGEMENT IN THE RECOVERY FUNDING PROCESS?</h2>
                                    <br/>
                                    <br/>
                                    <h2 class="text-black">SEND US YOUR TIP.</h2>
                                </div>
                                <div class="lcdm-twitter-feed-info-box">
                                    <a id="btnSendInfo" href="https://docs.google.com/forms/d/e/1FAIpQLSepSTEr2BqCDXYjXHOHDBoVs73g5HyS6LdYjH6s5fyE6ewrNA/viewform" target="_blank" class="btn btn-white-blue btn-lg">SEND INFO</a>
                                </div>    
                            </div>
                            <div class="lcdm-twitter-form collapse">
                                <div class="lcdm-tell-us-wrapper">
                                    <h2>TELL US</h2>
                                    <form>
                                        <div class="form-group with-checkbox">
                                            <input type="text" name="" class="form-control input-lg" placeholder="NAME"/>
                                            <label class="checkbox">
                                                <input type="checkbox" name=""/> ANÓNIMO
                                            </label>
                                        </div>
                                        <div class="form-group with-checkbox">
                                            <input type="email" name="" class="form-control input-lg" placeholder="EMAIL"/>    
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="8" placeholder="INFORMATION"></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-blue btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SEND&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php get_template_part('partials/los-chavos-de-maria/en/footer'); ?>

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
                        var tipo_asistencia_class = '';
                        switch (row.tipo_asistencia) {
                            case 'Asistencia pública':
                                tipo_asistencia_class = 'bg-orange';
                            break;
                            case 'Asistencia individual':
                                tipo_asistencia_class = 'bg-yellow';
                            break;
                        }
                        var template =
                            '<tr class="' + tipo_asistencia_class + '">' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                            '</tr>' +
                            '<tr>' +
                                '<td>' + row.tipo_asistencia + '</td>' +
                                '<td>' + row.categoria + '</td>' +
                                '<td>' + row.total_obligado + '</td>' +
                                '<td>' + row.total_desembolsado + '</td>' +
                                '<td>' + row.fecha_ultimo_pago + '</td>' +
                            '</tr>';
                        return template;
                    }

                    function buildContractsHeader() {
                        var template =
                        '<thead>' +
                            '<tr>' +
                                '<th>TYPE OF ASSISTANCE</th>' +
                                '<th>CATEGORY / PROGRAM</th>' +
                                '<th>TOTAL OBLIGATED / APPROVED</th>' +
                                '<th>TOTAL DISBURSED</th>' +
                                '<th>DATE OF LAST PAYMENT</th>' +
                            '</tr>'
                        '</thead>';
                        return template;
                    }

                    function buildContractsTable (data, city) {
                        var template = '<div class="table-scroll"><div class="table-responsive"><table>';
                        template += buildContractsHeader();
                        template += '<tbody>';

                        for (var i=0; i < data.length; i++) {
                            var row = buildContractRow(data[i]);
                            template += row;
                        }
                        template += '</tbody>';
                        template += '</table></div></div>';

                        var download_link = '<?php echo esc_url( admin_url('admin-post.php') ); ?>?action=export_contracts&city=' + city + '&lang=en';

                        template += '<div class="contracts-export">' + 
                            '<div>Updated at: 15/08/2019' + 
                                '<a href="' + download_link + '" class="btn btn-blue" target="_blank">DOWNLOAD</a>' + 
                            '</div>' +
                        '</div>';
                        return template;
                    }

                    function buildAssistanceLegend () {
                        var template = 
                        '<div class="assistance-type-legend">' +
                            '<div class="assistance-type assistance-type-th">TYPE OF<br/>ASSISTANCE</div>' +
                            '<div class="assistance-type assistance-type-icon orange"><i class="fa fa-circle"></i> Public<br/>assistance</div>' +
                            '<div class="assistance-type assistance-type-icon yellow"><i class="fa fa-circle"></i> Individual<br/>assistance</div>' +
                        '</div>';
                        return template;
                    }

                    $('#jsmap-puertorico').JSMaps({
                        map: 'puertoRico',
                        onStateClick: function (data) {
                            /* data = { name: '', text: '' } */
                            var url = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
                            $.ajax({
                                beforeSend: function (qXHR) {
                                    $('#jsmap-description').html('<i class="fa fa-spinner fa-spin"></i>');
                                },
                                type: 'get',
                                url: url + '?action=pr_cities_contracts&city=' + data.name,
                                success: function (response) {
                                    var table = buildContractsTable(response.data, data.name);
                                    $('#jsmap-description').html(table);
                                    $('.jsmaps-text').append(buildAssistanceLegend());
                                }
                            });
                        }
                    });

                    $('.nice-select').niceSelect().on('change', function (event) {
                        $('#jsmap-puertorico').trigger('stateClick', $(this).val());
                    });

                    $('#jsmap-puertorico').trigger('stateClick', 'San Juan');
                });
            })(jQuery);
        </script>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    $('#power-players-hero-carousel').owlCarousel({
                        autoplay: false,
                        loop: true,
                        items: 1,
                        nav: true,
                        dots: true,
                        mergeControls: true,
                        autoHeight: true,
                        navContainer: '#power-player-controls .owl-nav',
                        dotsContainer: '#power-player-controls .owl-dots',
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