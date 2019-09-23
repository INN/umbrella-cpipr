<!-- header landing page -->
<header class="header-chavos-maria">
    <div class="container-fluid clearfix">
        <?php if ( is_active_sidebar( 'top_bar_lcdm_english' ) ) : ?>
        <?php dynamic_sidebar( 'top_bar_lcdm_english' ); ?>
        <?php endif; ?> 
        <div class="lcdm-logo-wrapper">
            <a class="lcdm-logo" href="<?php echo get_permalink( get_page_by_path( 'en-los-chavos-de-maria' ) ) ?>">
                <img alt="" src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/logo-lcdm-en.png' ?>" srcset="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/logo-lcdm-en@2x.png 2x' ?>, <?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/logo-lcdm-en@3x.png 3x' ?>"/>
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="modal" data-target="#modalNavigation">
                <i class="lcdm-icon lcdm-icon-menu"></i>
            </button>
        </div>
    </div>
</header>