<?php
/**
 * Home Template: Custom Template
 * Description: A new way to display news.
 * Sidebars: Homepage Left Rail (An optional widget area that, when enabled, appears to the left of the main content area on the homepage)
 */

global $largo, $home_post_ids, $tags;
$topstory_classes = (largo_get_active_homepage_layout() === 'LegacyThreeColumn') ? 'top-story span12' : 'top-story span8';
?>

<div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span9">
				<div class="row-fluid">
					<div class="span3">
						<div class="section-block">
							<h3>Lo más reciente</h3>
							<a href="/category/actualidad/">Ver más historias</a>
						</div>
					</div>
					<div class="span9">
						<?php
							$topstory = largo_get_featured_posts( array(
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' 	=> 'category',
										'field' 	=> 'slug',
										'terms' 	=> array('english'),
										'operator'  => 'NOT IN'
									),
									array(
										'taxonomy' 	=> 'prominence',
										'field' 	=> 'slug',
										'terms' 	=> array('homepage-featured')
									)
								),
								'posts_per_page' => 6,
								'post__not_in'   => $home_post_ids
							) );
							if ( $topstory->have_posts() ) {
						?>
						<?php while ( $topstory->have_posts() ) { $topstory->the_post(); $home_post_ids[] = get_the_ID(); ?>
							<article class="post-entry post-entry-fixed">
								<div class="row-fluid">
									<?php if (has_post_thumbnail()): ?>
									<div class="span6">
										<figure class="post-image">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'featured-square-medium' ); ?></a>
										</figure>
									</div>
									<?php endif;?>
									<div class="<?php echo has_post_thumbnail() ? 'span6' : 'span12'?>">
										<div class="post-body bottom-gradient white-gradient">
											<?php the_category();?>
											<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<h5 class="post-byline byline"><?php largo_byline(); ?></h5>
											<div class="post-excerpt">
												<?php largo_excerpt(); ?>
											</div>
										</div>
										<div class="clearfix">
											<div class="form-group pull-left">
												<a href="<?php the_permalink(); ?>" class="btn btn-round btn-black"><?php _e('Read More', 'largo'); ?></a>
											</div>
											<div class="social-media-list social-media-list-icons social-media-list-black text-right">
												<?php largo_post_social_links(); ?>
											</div>
										</div>
									</div>
								</div>
							</article>
						<?php } ?>
						<?php } else { ?>
							<h5>No entries found.</h5>
						<?php } ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span3">
						<div class="section-block">
							<h3>Series</h3>
							<a href="/series/">Ver más series</a>
						</div>
					</div>
					<div class="span9">
						<div class="row-fluid">
						<?php
							//default query args: by date, descending
							$args = array(
								'p' => '',
								'post_type' => 'cftl-tax-landing',
								'order' => 'DESC',
								'posts_per_page' => 6
							);
							$series_query = new WP_Query($args);
							$odd = 0;
							while ($series_query->have_posts()) { $series_query->the_post();?>
							<?php if ($odd && $odd % 2 === 0) : ?>
									</div>
								<div class="row-fluid">
							<?php endif; ?>
							<div class="span6">
								<a href="<?php the_permalink();?>" class="series-item">
									<div class="image" style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : 'https://dummyimage.com/400x400/ccc/ccc.jpg'; ?>')"></div>
									<div class="overlay"><p><?php the_title();?></p></div>
								</a>
							</div>
						<?php $odd++; } ?>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span3">
						<div class="section-block">
							<h3>Noticias CPI</h3>
							<a href="/category/trayectoria/">Ver más noticias</a>
						</div>
					</div>
					<div class="span9">
						<div class="row-fluid">
						<?php
							$cpiNews = largo_get_featured_posts( array(
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' 	=> 'category',
										'field' 	=> 'slug',
										'terms' 	=> array('english'),
										'operator'  => 'NOT IN'
									),
									array(
										'taxonomy' 	=> 'category',
										'field' 	=> 'slug',
										'terms' 	=> 'trayectoria'
									)
								),
								'posts_per_page' => 4,
								'post__not_in'   => $home_post_ids
							) );
							if ( $cpiNews->have_posts() ) {
						?>
						<?php
							$odd = 0;
							while ( $cpiNews->have_posts() ) { $cpiNews->the_post(); $home_post_ids[] = get_the_ID();
						?>
						<?php if ($odd && $odd % 2 === 0) : ?>
								</div>
							<div class="row-fluid">
						<?php endif; ?>
						<div class="span6">
							<article class="news-entry-cpipr post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
								<div class="entry-content entry-content-cpipr entry-content-fixed bottom-gradient white-gradient">
									<?php
										if ( largo_has_categories_or_tags() ) {
											largo_maybe_top_term();
										}

										if ( has_post_thumbnail() ) {
											echo '<div class="has-thumbnail '.$hero_class.'"><a href="' . get_permalink() . '">' . get_the_post_thumbnail() . '</a></div>';
										}
									?>
									<h2 class="entry-title">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => __( 'Permalink to', 'largo' ) . ' ' ) )?>" rel="bookmark"><?php the_title(); ?></a>
									</h2>

									<!--<h5 class="byline"><?php largo_byline(); ?></h5>-->

									<?php largo_excerpt(); ?>
								</div>
								<div class="clearfix">
									<div class="form-group pull-left">
										<a href="<?php the_permalink() ?>" class="btn btn-round btn-black"><?php _e('Read More', 'largo'); ?></a>
									</div>
									<div class="social-media-list social-media-list-icons social-media-list-black text-right">
										<?php largo_post_social_links(); ?>
									</div>
								</div>
							</article>
						</div>
						<?php $odd++; } ?>
						<?php } else { ?>
							<h5>No entries found.</h5>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<!-- <div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span9">
				<div class="row-fluid">
					<div class="span3">
						<h2>Video</h2>
					</div>
					<div class="span9">
						<h2>Video here</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="bg-gray section-wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span9">
				<div class="row-fluid">
					<div class="span3">
						<div class="section-block">
							<h3>Opinión <span>De la libreta del periodista</span></h3>
							<a href="/category/de-la-libreta-del-periodista/">Ver más opinión</a>
						</div>
					</div>
					<div class="span9">
						<?php
							$opinion_post = largo_get_featured_posts( array(
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' 	=> 'category',
										'field' 	=> 'slug',
										'terms' 	=> array('english'),
										'operator'  => 'NOT IN'
									),
									array(
										'taxonomy' 	=> 'category',
										'field' 	=> 'slug',
										'terms' 	=> 'de-la-libreta-del-periodista'
									)
								),
								'offset' => '1',
								'posts_per_page' => 2,
								'post__not_in'   => $home_post_ids
							) );
							if ( $opinion_post->have_posts() ) {
						?>
						<?php while ( $opinion_post->have_posts() ) { $opinion_post->the_post(); $home_post_ids[] = get_the_ID(); ?>
							<article class="post-entry post-entry-fixed post-entry-black">
								<div class="row-fluid">
									<?php if (has_post_thumbnail()): ?>
									<div class="span6">
										<figure class="post-image">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'featured-square-medium' ); ?></a>
										</figure>
									</div>
									<?php endif;?>
									<div class="<?php echo has_post_thumbnail() ? 'span6' : 'span12'?>">
										<div class="post-body bottom-gradient gray-gradient">
											<?php the_category();?>
											<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<h5 class="post-byline byline"><?php largo_byline(); ?></h5>
											<div class="post-excerpt">
												<?php largo_excerpt(); ?>
											</div>
										</div>
										<div class="form-group">
											<a href="<?php the_permalink() ?>" class="btn btn-round btn-black"><?php _e('Read More', 'largo'); ?></a>
										</div>
									</div>
								</div>
							</article>
						<?php } ?>
						<?php } else { ?>
							<h5>No entries found.</h5>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="bg-red section-wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span9">
				<div class="row-fluid">
					<div class="span3">
						<div class="section-block section-block-white">
							<h3>Instituto de formación periodística</h3>
							<a href="/category/instituto-de-formacion-periodistica/">Ver más</a>
						</div>
					</div>
					<div class="span9">
						<?php
							$ifp_post = largo_get_featured_posts( array(
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' 	=> 'category',
										'field' 	=> 'slug',
										'terms' 	=> array('english'),
										'operator'  => 'NOT IN'
									),
									array(
										'taxonomy' 	=> 'category',
										'field' 	=> 'slug',
										'terms' 	=> 'instituto-de-formacion-periodistica'
									)
								),
								'posts_per_page' => 2,
								'post__not_in'   => $home_post_ids
							) );
							if ( $ifp_post->have_posts() ) {
						?>
						<?php while ( $ifp_post->have_posts() ) { $ifp_post->the_post(); $home_post_ids[] = get_the_ID(); ?>
							<article class="post-entry post-entry-fixed post-entry-white">
								<div class="row-fluid">
									<?php if (has_post_thumbnail()): ?>
									<div class="span6">
										<figure class="post-image">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'featured-square-medium' ); ?></a>
										</figure>
									</div>
									<?php endif;?>
									<div class="<?php echo has_post_thumbnail() ? 'span6' : 'span12'; ?>">
										<div class="post-body bottom-gradient red-gradient">
											<?php the_category();?>
											<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<h5 class="post-byline byline"><?php largo_byline(); ?></h5>
											<div class="post-excerpt">
												<?php largo_excerpt(); ?>
											</div>
										</div>
										<div class="form-group">
											<a href="<?php the_permalink() ?>" class="btn btn-round btn-black"><?php _e('Read More', 'largo'); ?></a>
										</div>
									</div>
								</div>
							</article>
						<?php } ?>
						<?php } else { ?>
							<h5>No entries found.</h5>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
