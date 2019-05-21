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


        <!-- Hero Page Title  -->
        <div class="lcdm-hero-page-title">
            <div class="container-fluid">
                <img src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/icon-mapa-recperacion.png' ?>"/>
                <h1>MAPA DE LA RECUPERACIÓN</h1>
            </div>
        </div>

        <!-- Mapa de la recuepracion section -->
        <div class="lcdm-section lcdm-section-map">            
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span1"></div>
                    <div class="span10">
                        <div id="jsmap-puertorico" class="jsmaps-wrapper"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php get_template_part('partials/los-chavos-de-maria/footer'); ?>

        <script type="text/javascript">
            (function ($) {
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

            })(jQuery);
        </script>
    </body>
</html>