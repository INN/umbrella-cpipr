<?php
/**
 * Single Post Template: Video Hero single
 * Template Name: Video Hero single
 * Description: Shows the post with a small right sidebar 
 */


global $shown_ids;

add_filter( 'body_class', function( $classes ) {
	$classes[] = 'normal';
	return $classes;
} );

get_header();
?>
<div id="content" role="main">
<div class="container-fluid">
	<?php
		while ( have_posts() ) : the_post();

			$shown_ids[] = get_the_ID();

			$partial = ( is_page() ) ? 'page' : 'videohero';

			get_template_part( 'partials/content', $partial );

			if ( $partial === 'single' ) {

				do_action( 'largo_before_post_bottom_widget_area' );

				do_action( 'largo_post_bottom_widget_area' );

				do_action( 'largo_after_post_bottom_widget_area' );

				do_action( 'largo_before_comments' );

				comments_template( '', true );

				do_action( 'largo_after_comments' );
			}

		endwhile;
	?>
</div>
</div>

<?php do_action( 'largo_after_content' ); ?>

<?php get_footer();
