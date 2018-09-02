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

if ( is_front_page() ) {
?>
<div id="main-slideshow-container">
	<div class="container-fluid">
		<div class="main-slideshow-wrapper">
			<div id="main-slideshow" class="owl-carousel owl-theme">
				<?php
					// Mostrar todos los posts.
					$featured_posts_query = largo_get_featured_posts(
						array(
							'tax_query' => array(
								array(
									'taxonomy' 	=> 'prominence',
									'field' 	=> 'slug',
									'terms' 	=> array('homepage-featured', 'prominence')
								)
							)
						)
					);
					while($featured_posts_query->have_posts()){ $featured_posts_query->the_post(); ?>
						<div class="owl-post-slide post-entry">
							<div class="row-fluid">
								<div class="span7">
									<figure class="post-image">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
									</figure>
								</div>
								<div class="span5">
									<article class="post-body">
										<?php the_category();?>
										<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<h5 class="post-byline byline"><?php largo_byline(); ?></h5>
										<div class="post-excerpt">
											<?php the_excerpt(); ?>	
										</div>
										<div class="row-fluid">
											<div class="span4">
												<div class="form-group">
													<a href="<?php the_permalink() ?>" class="btn btn-round btn-white"><?php _e('Read More', 'largo'); ?></a>	
												</div>
											</div>
											<div class="span8">
												<div class="social-media-list social-media-list-icons social-media-list-white text-right">
													<?php largo_post_social_links(); ?>
												</div>
											</div>
										</div>
									</article>
								</div>
							</div>
						</div>
					<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php }