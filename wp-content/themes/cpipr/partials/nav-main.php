<?php
/*
 * Main Navigation
 *
 * This is the primary navigation for "verticals" on a homepage. Other pages use
 * sticky navigation if enabled.
 *
 * @package Largo
 * @link http://largo.readthedocs.io/users/themeoptions.html#navigation
 */

if ( ! is_single() && ! is_singular() || ! of_get_option( 'main_nav_hide_article', false ) ) {
?>

<header class="header-cpi">
	<div class="top-header">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span3">
					<h1 class="logo-main">
						<a href="/">
							Centro de periodismo investigativo
						</a>
					</h1>
				</div>
				<div class="span6"></div>
				<div class="span3">
					<!-- <ul class="">
						<li class="active"><a href="#">Español</a></li>
						<li><a href="#">English</a></li>
					</ul> -->
					<div class="header-search-wrapper">
						<form class="form-search text-right" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<div class="input-append">
								<input type="text" class="input-medium" placeholder="<?php _e('Search', 'largo'); ?>" name="s"><button class="btn" type="submit">&nbsp;</button>
							</div>
						</form>

						<div class="text-right">
						<?php
							/* Check to display Social Media Icons */
							if ( of_get_option( 'show_header_social') ) { ?>
							<ul class="social-media-icon-list social-media-icon-list-white">
								<?php largo_social_links(); ?>
							</ul>
						<?php }
							/* Check to display Donate Button */
							if ( of_get_option( 'show_donate_button') )
								largo_donate_button();
						?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- The new menú -->

	<div class="navbar navbar-cpipr navbar-static-top">
		<div class="container-fluid">

			<div class="navbar-header">
				<button id="cpipr-menu-btn" type="button" class="navbar-toggle" data-target="#cpipr-menu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div id="cpipr-menu" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<?php
						$args = array(
							'theme_location' => 'global-nav',
							'depth' => 1,
							'container' => false,
							'items_wrap' => '%3$s',
							'walker' => new Bootstrap_Walker_Nav_Menu()
						);
						largo_nav_menu( $args );
					?>

					<li class="dropdown megamenu">
						<a href="#" class="dropdown-toggle dropdown-toggle-cpipr" data-toggle="dropdown" aria-expanded="false"><span>MORE</span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<div class="container-fluid">
									<ul class="nav nav-justified">
										<?php
											$args = array(
												'theme_location' => 'main-nav',
												'depth' => 2,
												'container' => false,
												'items_wrap' => '%3$s',
												'menu_class' => 'nav'
											);
											largo_nav_menu( $args );
										?>
									</ul>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>
<?php }
