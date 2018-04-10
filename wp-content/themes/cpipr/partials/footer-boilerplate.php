<div id="boilerplate">
	<div class="row-fluid clearfix">
		<div class="span8">
			<h1 class="logo-main">
				<a href="/">
					Centro de periodismo investigativo
				</a>
			</h1>

			<div class="footer-bottom clearfix">

				<!-- If you enjoy this theme and use it on a production site we would appreciate it if you would leave the credit in place. Thanks :) -->
				<p class="footer-credit"><?php largo_copyright_message(); ?></p>
				<?php do_action('largo_after_footer_copyright'); ?>
				<?php largo_nav_menu(
					array(
						'theme_location' => 'footer-bottom',
						'container' => false,
						'depth' => 1
					) );
				?>
			</div>
		</div>

		<div class="span1"></div>

		<div class="span3 right">
			<?php $args = array(
				'theme_location' => 'main-nav',
				'depth' => 0,
				'container' => false,
				'items_wrap' => '%3$s',
				'menu_class' => 'nav',
				'walker' => new Bootstrap_Walker_Nav_Menu()
			);
			largo_nav_menu( $args );?>
		</div>
	</div>

	<p class="back-to-top visuallyhidden"><a href="#top"><?php _e('Back to top', 'largo'); ?> &uarr;</a></p>
</div>
