<?php
/**
 * Single Post Template: One Column (Standard Layout)
 * Template Name: One Column (Standard Layout)
 * Description: Shows the post with a small right sidebar
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
                <input id="switchlang" type="checkbox" checked="checked" data-href="<?php echo get_permalink(get_page_by_path('donaciones')) ?>"/>
                <label for="switchlang" class="label-default"></label>
            </div>
            <span class="lbl-curr-lang">Español</span>
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
                    <h4 class="cpi-widget-title cpi-widget-title-lg">PLEASE DONATE, <strong>KEEP CPI GOING STRONG</strong></h4>
                </div>
            </div>
            <?php while (have_posts()): the_post();?>
			                <article id="post-<?php the_ID();?>" <?php post_class('clearfix');?>>
			                    <?php the_content();?>
			                </article><!-- #post-<?php the_ID();?> -->
			            <?php endwhile;?>
            <div class="cpi-widget">
                <div class="cpi-widget-header">
                    <h4 class="cpi-widget-title">MORE WAYS TO SUPPORT CPI</h4>
                </div>
                <div class="cpi-widget-body">
                    <ul class="other-gateway-radio-list">
                        <li>
                            <a target="_blank" href="https://www.paypal.com/donate/?token=pvGTri2GX_4FzPW4qAz3zV4VHx7sml5oPEjLsy2GjobTeHjOgmF2cEHdAFo_t6-V1pdSI0&country.x=US&locale.x=US">DONATE VIA PAYPAL</a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.networkforgood.org/donation/ExpressDonation.aspx?ORGID2=660705065&vlrStratCode=k%2faPABkV7YzpiRc3p4Hx%2bjTsN8tqKDZzbFYVpDHSXOMWa2vRcIAvmA%2fJCkuQjte1">DONATE VIA NETWORK FOR GOOD</a>
                        </li>
                    </ul>
                    <p>
                        Centro de Periodismo Investigativo (Center for Investigative Journalism) is 
                        an independent, 501(c)(3) tax-exempt non-profit media organization 
                        that does not accept any kind of government support. 
                        Our organization receives donations and support from foundations, 
                        institutions, and citizens who share 
                        our vision of civic empowerment and value the quality of good and ethical journalism. 
                        Donations received are tax-deductible in Puerto Rico and the United States.
                    </p>
                    <p>
                        <a href="https://periodismoinvestigativo.com/wp-content/uploads/2013/11/Pol%C3%ADtica-sobre-auspicios-y-donativos-CPI-REV.docx">Read our sponsorship and donation policy</a>
                    </p>
                    <br/>
                    <br/>
                </div>
            </div>
        </div>
        <div class="span1"></div>
        <div class="span3">
            <div class="cpi-widget">
                <div class="cpi-widget-header">
                    <h4 class="cpi-widget-title">MORE WAYS TO SUPPORT CPI</h4>
                </div>
                <div class="cpi-widget-body">
                    <p>Send a check by mail to:</p>
                    <p>
                        P.O. Box 6834<br/>
                        San Juan PR<br/>
                        00914-6834
                    </p>
                    <p class="text-center">
                        <a href="https://quiosco.periodismoinvestigativo.com/">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kiosk.jpeg" class="img-responsive img-circle" />
                        </a>
                    </p>
                    <div class="form-group text-center">
                        <a href="https://quiosco.periodismoinvestigativo.com/" class="btn btn-lg btn-round btn-white-orange">CPI KIOSK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php do_action('largo_after_content');?>

<?php get_footer();
