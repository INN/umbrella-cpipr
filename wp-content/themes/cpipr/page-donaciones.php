<?php
/**
 * Template Name: Donations page
 * Description: Based on Single Post Template: One Column (Standard Layout) 
 */

global $shown_ids;

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'normal';
    return $classes;
} );

get_header();
?>

<div id="content" role="main">
    <div class="clearfix">
        <div class="material-switch-lang pull-right">
            <span class="lbl-lang">Idioma</span>
            <div class="material-switch">
                <input id="switchlang" type="checkbox" data-href="<?php echo get_permalink(get_page_by_path('donate'))?>"/>
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
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
                    <?php the_content(); ?>
                </article><!-- #post-<?php the_ID(); ?> -->
            <?php endwhile; ?>
            <div class="cpi-widget">
                <div class="cpi-widget-header">
                    <h4 class="cpi-widget-title">OTRAS MANERAS DE DONAR</h4>
                </div>
                <div class="cpi-widget-body">
                    <ul class="other-gateway-radio-list">
                        <li>
                            <a href="#">DONAR VIA PAYPAL</a>
                        </li>
                        <li>
                            <a href="#">DONAR VIA NETWORK FOR GOOD</a>
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
                        <a href="#">Lea nuestra Política sobre auspicios y donativos al CPI</a>
                    </p>
                    <p>
                        Las principales fuentes de ingresos del Centro de Periodismo
                        Investigativo son los donativos de fundaciones, corporaciones
                        y los auspicios a eventos. Además de otros donantes
                        individuales que prefieren mantener su identidad anónima o no
                        han sido consultados sobre la divulgación de sus nombres.
                    </p>
                    <h5 class="text-third font-normal">
                        <a href="#">
                            CONOCE NUESTRA LISTA DE DONANTES Y NUESTRA POLÍTICA SOBRE
                            AUSPICIOS Y DONATIVOS AL CPI
                        </a>
                    </h5>
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
                        <a href="#">
                            <img src="https://dummyimage.com/200x200/ccc/fff" class="img-responsive img-circle" />
                        </a>
                    </p>
                    <div class="form-group text-center">
                        <a href="#" class="btn btn-lg btn-round btn-white-orange">TIENDA CPI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php do_action( 'largo_after_content' ); ?>

<?php get_footer();
