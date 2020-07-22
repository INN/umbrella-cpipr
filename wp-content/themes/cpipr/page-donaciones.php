<?php
/**
 * Template Name: Spanish language Donations page
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
      <span class="lbl-lang">Idioma</span>
      <div class="material-switch">
        <input id="switchlang" type="checkbox" data-href="<?php echo get_permalink(get_page_by_path('donate')) ?>"/>
        <label for="switchlang" class="label-default"></label>
      </div>
      <span class="lbl-curr-lang">Español</span>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function() {
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
      <div class="cpi-widget-spacer"></div>
      <div class="cpi-widget">
        <div class="cpi-widget-header"></div>
        <div class="cpi-widget-spacer"></div>
        <div class="cpi-widget-spacer"></div>
        <div class="cpi-widget-body">
          <ul class="other-gateway-radio-list">
            <li>
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input name="cmd" type="hidden" value="_donations" />
                <input name="business" type="hidden" value="info@periodismoinvestigativo.com" />
                <input name="lc" type="hidden" value="US" />
                <input name="item_name" type="hidden" value="Centro de Periodismo Investigativo" />
                <input name="no_note" type="hidden" value="0" />
                <input name="currency_code" type="hidden" value="USD" />
                <input name="bn" type="hidden" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest" />
                <button class="cpi-paypal-button" alt="PayPal, la forma más segura y rápida de pagar en línea."
                  name="submit" type="submit">
                  DONAR VÍA PAYPAL
                </button>
              </form>
            </li>
            <li>
              <a target="_blank"
                href="https://www.networkforgood.org/donation/ExpressDonation.aspx?ORGID2=660705065&vlrStratCode=k%2faPABkV7YzpiRc3p4Hx%2bjTsN8tqKDZzbFYVpDHSXOMWa2vRcIAvmA%2fJCkuQjte1">
                DONAR VÍA NETWORK FOR GOOD</a>
            </li>
          </ul>
        </div>
        <div class="cpi-widget-spacer"></div>
      </div>
      <div class="cpi-widget">
        <div class="cpi-widget-header">
          <h4 class="cpi-widget-title">ENVÍO DE CHEQUE POR CORREO:</h4>
        </div>
        <div class="cpi-widget-body">
          <p style="font-weight: bold">
            P.O. Box 6834<br />
            San Juan PR<br />
            00914-6834
          </p>
        </div>
      </div>
      <div class="cpi-widget hidden-desktop">
        <div class="cpi-widget-body">
          <p class="text-center">
            <a href="https://quiosco.periodismoinvestigativo.com/">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kiosk.jpeg"
                class="img-responsive img-circle" />
            </a>
          </p>
          <div class="form-group text-center">
            <a href="https://quiosco.periodismoinvestigativo.com/" class="give-btn">QUIOSCO CPI</a>
          </div>
        </div>
      </div>
      <div class="cpi-widget">
        <div class="cpi-widget-body">
          <p>
          Los donativos que recibe el Centro de Periodismo Investigativo están exentos de contribuciones en Puerto Rico y Estados Unidos. Nuestra organización recibe donativos y apoyo de fundaciones, instituciones y ciudadanos que comparten su visión de apoderamiento cívico y valoran la verticalidad y calidad del ejercicio periodístico.
            <p><a
                href="<?php echo get_stylesheet_directory_uri(); ?>/images/legal-donations-espanol.pdf">LEA NUESTRA POLÍTICA SOBRE AUSPICIOS Y DONATIVOS AL CPI.</a></p>
          </p>
          <p>
          Las principales fuentes de ingresos del Centro de Periodismo Investigativo son los donativos de fundaciones, los auspicios a eventos y los donantes individuales. Aquí divulgamos los donativos mayores de $500.00.
            <p><a href="<?php echo get_stylesheet_directory_uri(); ?>/images/donor-list-07-20-2020.pdf">LISTA DE DONANTES DE 2019</a></p>
          </p>
        </div>
      </div>
      <div class="cpi-widget-spacer"></div>
    </div>
    <div class="span3 hidden-phone">
      <div class="cpi-widget-body">
        <p class="text-center">
          <a href="https://quiosco.periodismoinvestigativo.com/">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kiosk.jpeg"
              class="img-responsive img-circle" />
          </a>
        </p>
        <div class="form-group text-center">
          <a href="https://quiosco.periodismoinvestigativo.com/" class="give-btn">QUIOSCO CPI</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php do_action('largo_after_content');?>

<?php get_footer();
