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

        <!-- Nice Select -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/lib/jquery-nice-select/css/nice-select.css' ?>">
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jquery-nice-select/js/jquery.nice-select.min.js' ?>" type="text/javascript"></script>

        <!-- JsMaps -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/css/jsmaps.css' ?>">
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/js/jsmaps-libs.js' ?>" type="text/javascript"></script>
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/js/jsmaps-panzoom.js' ?>"></script>
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/js/jsmaps.min.js' ?>" type="text/javascript"></script>
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/jsmaps/maps/puertoRico.js' ?>" type="text/javascript"></script>

        <!-- Numeral -->
        <script src="<?php echo get_stylesheet_directory_uri(). '/lib/numeral/numeral.min.js' ?>" type="text/javascript"></script>
    </head>

    <body <?php body_class(); ?>>
        <?php $lcdm_active_menu = 'mapas_de_la_recuperacion'; ?>
        <?php get_template_part('partials/los-chavos-de-maria/en/header'); ?>
        <?php get_template_part('partials/los-chavos-de-maria/en/menu'); ?>


        <!-- Hero Page Title  -->
        <div class="lcdm-hero-page-title-wrapper">
            <div class="lcdm-hero-page-title-overlay">
                <div class="lcdm-hero-page-title-media">
                    <div class="lcdm-hero-page-title-icon">
                        <i class="lcdm-icon lcdm-icon-mapa"></i>
                    </div>
                    <div class="lcdm-hero-page-title">
                        <h1>RECOVERY<br/>MAP</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mapa de la recuepracion section -->
        <div class="lcdm-section lcdm-section-map">            
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span1"></div>
                    <div class="span10">
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

        <?php get_template_part('partials/los-chavos-de-maria/en/footer'); ?>

        <script type="text/javascript">
            (function ($) {
                function buildContractRow(row) {
                    var tipo_asistencia_class = '';
                    switch (row.tipo_asistencia) {
                        case 'Public Assistance':
                            tipo_asistencia_class = 'bg-orange';
                        break;
                        case 'Individual Assistance':
                            tipo_asistencia_class = 'bg-yellow';
                        break;
                    }
                    var template =
                        '<tr class="' + tipo_asistencia_class + '">' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td>' + row.categoria + '</td>' +
                            '<td>' + numeral(row.total_obligado).format('$0,0.00') + '</td>' +
                            '<td>' + numeral(row.total_desembolsado).format('$0,0.00') + '</td>' +
                            '<td>' + row.fecha_ultimo_pago + '</td>' +
                        '</tr>';
                    return template;
                }

                function buildContractsHeader() {
                    var template =
                    '<thead>' +
                        '<tr>' +
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
                            url: url + '?action=pr_cities_contracts&lang=en&city=' + data.name,
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

            })(jQuery);
        </script>
    </body>
</html>