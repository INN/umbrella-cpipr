<div class="clearfix nocontent">
    <footer id="cpi-footer">

        <div class="footer-bg">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <a href="/"><img src="<?php echo get_stylesheet_directory_uri() . '/images/footer-logo.png' ?>"/></a>
                    </div>
                    <div class="span8">
                        <?php if ( is_active_sidebar( 'footer_lcdm_english' ) ) : ?>
                        <?php dynamic_sidebar( 'footer_lcdm_english' ); ?>
                        <?php endif; ?> 
                    </div>
                </div>

                <p class="back-to-top visuallyhidden"><a href="#top"><?php _e('Back to top', 'largo'); ?> &uarr;</a></p>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="container-fluid">
                <p class="copyright"><?php largo_copyright_message(); ?></p>
            </div>
        </div>
    </footer>
</div>