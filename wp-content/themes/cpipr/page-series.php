<?php
/*
Template Name: Series
*/
get_header();
?>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php edit_post_link(__('Edit This Page', 'largo'), '<h5 class="byline"><span class="edit-link">', '</span></h5>'); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php
						$tax_args = array(
							'orderby' 	=> 'name',
							'taxonomy' 	=> 'series',
						);

						$series = get_categories($tax_args);
						// shuffle($series);
						foreach ( $series as $out ) {
							echo '<div class="item">';
							echo '<h3><a href="'. get_term_link($out, $out->taxonomy) . '">' . $out->name . '</a></h3>';
							if ($out->category_description) echo '<p>' . $out->category_description . '</p>';
							echo '</div>';
						}
					?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->
		</div><!-- #content -->

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
