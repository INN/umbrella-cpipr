<!-- header landing page -->
<header class="header-chavos-maria">
    <div class="container-fluid clearfix">
        <?php if ( is_active_sidebar( 'top_bar_lcdm_spanish' ) ) : ?>
        <?php dynamic_sidebar( 'top_bar_lcdm_spanish' ); ?>
        <?php endif; ?>
        <div class="lcdm-logo-wrapper">
            <a href="/" class="lcdm-cpi">
                <span>
                    <i class="fa fa-home"></i><br/>
                </span>
                <div class="hidden-xs">
                    Volver a<br/>
                    página CPI
                </div>
            </a>
            <a class="lcdm-logo" href="<?php echo get_term_link( 'los-chavos-de-maria', 'series' ) ?>">
                <img alt="" src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/logo-lcdm.png' ?>" srcset="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/logo-lcdm@2x.png 2x' ?>, <?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/logo-lcdm@3x.png 3x' ?>"/>
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="modal" data-target="#modalNavigation">
                <i class="lcdm-icon lcdm-icon-menu"></i>
            </button>
        </div>
    </div>
</header>