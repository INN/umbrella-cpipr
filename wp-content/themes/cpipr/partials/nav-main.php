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
	<div class="menu-header-wrapper">
		<div class="container-fluid">
			<nav class="menu-header" id="menu-header">
				<ul>
					<?php
					/*
					 * Before Main Nav List Items
					 *
					 * Use add_action( 'largo_before_main_nav_list_items', 'function_to_add');
					 *
					 * @link https://codex.wordpress.org/Function_Reference/add_action
					 * @since 0.5.5
					 	 */
					do_action( 'largo_before_main_nav_list_items' );
					
					/*
					 * Generate the Main Navigation shown mainly on homepages
					 *
					 * A Bootstrap Navbar is generated from a walker.
					 *
					 * @see inc/nav-menus.php
					 */
					$args = array(
						'theme_location' => 'main-nav',
						'depth' => 0,
						'container' => false,
						'items_wrap' => '%3$s',
						'menu_class' => 'nav',
						'walker' => new Bootstrap_Walker_Nav_Menu()
					);
					largo_nav_menu( $args );
					
					/*
					 * After Main Nav List Items
					 *
					 * Use add_action( 'largo_after_main_nav_list_items', 'function_to_add');
					 *
					 * @link https://codex.wordpress.org/Function_Reference/add_action
					 * @since 0.5.5
					 	 */
					do_action( 'largo_after_main_nav_list_items' );
					?>
				</ul>
			</nav>

			<div class="hamburguer-menu" id="menu-btn">
				<span></span>
			</div>
		</div>
	</div>
</header>
<?php }
