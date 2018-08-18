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
		<h1 class="logo-main">
			<a href="/">
				Centro de periodismo investigativo
			</a>
		</h1>
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
