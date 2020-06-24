<?php
/**
 * Template Name: Donations page
 * Description: Based on Single Post Template: One Column (Standard Layout)
 */

global $shown_ids;

add_filter('body_class', function ($classes) {
    $classes[] = 'normal';
    return $classes;
});

get_header();
?>

<div id="content" role="main">
    <div class="clearfix">
        <div class="material-switch-lang pull-right">
            <span class="lbl-lang">Language</span>
            <div class="material-switch">
                <input id="switchlang" type="checkbox" data-href="<?php echo get_permalink(get_page_by_path('donate')) ?>"/>
                <label for="switchlang" class="label-default"></label>
            </div>
            <span class="lbl-curr-lang">English</span>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery('#switchlang').click(function(event) {
                    event.preventDefault();
                    var url = jQuery(this).data('href');
                    window.location.href = url;
                });
            });
        </script>
    </div>
    <div class="row-fluid">
        <div class="span8">
            <div class="cpi-widget">
                <div class="cpi-widget-header">
                    <h4 class="cpi-widget-title cpi-widget-title-lg">HAZ TU DONACIÓN, <strong>POR MÁS CPI</strong></h4>
                </div>
            </div>
            <?php while (have_posts()): the_post();?>
				                <article id="post-<?php the_ID();?>" <?php post_class('clearfix');?>>
				                    <?php the_content();?>
				                </article><!-- #post-<?php the_ID();?> -->
				            <?php endwhile;?>
            <div class="cpi-widget">
                <div class="cpi-widget-header">
                    <h4 class="cpi-widget-title">OTRAS MANERAS DE DONAR</h4>
                </div>
                <div class="cpi-widget-body">
                    <ul class="other-gateway-radio-list">
                        <li>
                            <a target="_blank" href="https://www.paypal.com/donate/?token=pvGTri2GX_4FzPW4qAz3zV4VHx7sml5oPEjLsy2GjobTeHjOgmF2cEHdAFo_t6-V1pdSI0&country.x=US&locale.x=US">DONAR VIA PAYPAL</a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.networkforgood.org/donation/ExpressDonation.aspx?ORGID2=660705065&vlrStratCode=k%2faPABkV7YzpiRc3p4Hx%2bjTsN8tqKDZzbFYVpDHSXOMWa2vRcIAvmA%2fJCkuQjte1">DONAR VIA NETWORK FOR GOOD</a>
                        </li>
                    </ul>
                    <p>
                        Los donativos que recibe el Centro de Periodismo Investigativo
                        están exentos de contribuciones en Puerto Rico y Estados
                        Unidos. Nuestra organización recibe donativos y apoyo de
                        fundaciones, instituciones y ciudadanos que comparten su visión
                        de apoderamiento cívico y valoran la verticalidad y calidad del
                        ejercicio periodístico.
                    </p>
                    <p>
                        <a href="https://periodismoinvestigativo.com/wp-content/uploads/2013/11/Pol%C3%ADtica-sobre-auspicios-y-donativos-CPI-REV.docx">Lea nuestra Política sobre auspicios y donativos al CPI</a>
                    </p>
                    <p>
                        Las principales fuentes de ingresos del Centro de Periodismo
                        Investigativo son los donativos de fundaciones, corporaciones
                        y los auspicios a eventos. Además de otros donantes
                        individuales que prefieren mantener su identidad anónima o no
                        han sido consultados sobre la divulgación de sus nombres.
                    </p>
                    <H5 class="cpi-widget-title">LISTADO DE DONANTES:</H5>
                        <ul class="cpi-donations-list">
                            <li>Open Society Foundations</li>
                            <li>IEEFA- Rockefeller Brothers Fund</li>
                            <li>Maria Fund</li>
                            <li>Espacios Abiertos</li>
                            <li>Red de Fundaciones de Puerto Rico</li>
                            <li>Miranda Foundation</li>
                            <li>Para la Naturaleza</li>
                            <li>Fundación Ángel Ramos</li>
                            <li>Universidad Interamericana</li>
                            <li>Fundación Puertorriqueña de las Humanidades</li>
                            <li>CUNY Graduate School of Journalism – Ravitch Fiscal Reporting Program</li>
                            <li>Lourdes Miranda</li>
                            <li>Oscar Serrano</li>
                            <li>Adam Schweigert</li>
                            <li>Matty García y Rubén Carbonell</li>
                            <li>Osvaldo Burgos</li>
                            <li>Efrén Rivera Ramos</li>
                            <li>Michel Godreau</li>
                        </ul>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
        <div class="span1"></div>
        <div class="span3">
            <div class="cpi-widget">
                <div class="cpi-widget-header">
                    <h4 class="cpi-widget-title">OTRAS MANERAS DE DONAR</h4>
                </div>
                <div class="cpi-widget-body">
                    <p>Envio de cheque por correo:</p>
                    <p>
                        P.O. Box 6834<br/>
                        San Juan PR<br/>
                        00914-6834
                    </p>
                    <p class="text-center">
                        <a href="https://quiosco.periodismoinvestigativo.com/">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kiosk.jpeg" src="https://dummyimage.com/200x200/ccc/fff" class="img-responsive img-circle" />
                        </a>
                    </p>
                    <div class="form-group text-center">
                        <a href="https://quiosco.periodismoinvestigativo.com/" class="btn btn-lg btn-round btn-white-orange">KIOSKO CPI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php do_action('largo_after_content');?>

<?php get_footer();
