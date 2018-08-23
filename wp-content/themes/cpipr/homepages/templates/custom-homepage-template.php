<?php
/**
 * Home Template: Custom Template
 * Description: A new way to display news.
 * Sidebars: Homepage Left Rail (An optional widget area that, when enabled, appears to the left of the main content area on the homepage)
 */

global $largo, $shown_ids, $tags;
$topstory_classes = (largo_get_active_homepage_layout() == 'LegacyThreeColumn') ? 'top-story span12' : 'top-story span8';
?>

<div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span9">
				<div class="row-fluid">
					<div class="span3">
						<div class="section-block">
							<h3>Lo más reciente</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea ipsam odit aspernatur maiores sapiente dolorum tempora ipsum, quod aliquid sit officia harum, unde vero.</p>
							<a href="#">Ver más historias</a>
						</div>
					</div>
					<div class="span9">
						<?php
							$topstory = largo_get_featured_posts( array(
								'tax_query' => array(
									array(
										'taxonomy' 	=> 'prominence',
										'field' 	=> 'slug',
										'terms' 	=> 'top-story'
									)
								),
								'posts_per_page' => 4
							) );
							if ( $topstory->have_posts() ) {
						?>
						<?php while ( $topstory->have_posts() ) { $topstory->the_post(); $shown_ids[] = get_the_ID(); ?>
							<article class="post-entry">
								<div class="row-fluid">
									<?php if (has_post_thumbnail()): ?>
									<div class="span6">
										<figure class="post-image">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
										</figure>
									</div>
									<?php endif;?>
									<div class="<?php echo has_post_thumbnail() ? 'span6' : 'span12'?>">
										<div class="post-body">
											<?php the_category();?>
											<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<h5 class="post-byline byline"><?php largo_byline(); ?></h5>
											<div class="post-excerpt">
												<?php the_excerpt(); ?>	
											</div>
											<div class="form-group pull-left">
												<a href="<?php the_permalink() ?>" class="btn btn-round btn-black"><?php _e('Read More', 'largo'); ?></a>	
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
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores minima, molestias tempora alias. Maiores repellendus, odio est cum eius modi dignissimos.</p>
							<a href="#">Ver más series</a>
						</div>
					</div>
					<div class="span9">
						<div class="row-fluid">
						<?php
							//default query args: by date, descending
							$args = array(
								'p' => '',
								'post_type' => 'post',
								'taxonomy' => 'series',
								'order' => 'DESC',
								'posts_per_page' => 6
							);
							$series_query = new WP_Query($args);
							$odd = 0;
							while ($series_query->have_posts()) { $series_query->the_post();?>
							<?php if ($odd && $odd % 2 == 0) : ?>
									</div>
    							<div class="row-fluid">
							<?php endif; ?>
							<div class="span6">
								<a href="<?php the_permalink();?>" class="series-item">
									<div class="image">
										<?php the_post_thumbnail();?>
									</div>
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
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae iste itaque eligendi harum quisquam saepe, delectus rerum quasi optio alias adipisci aspernatur.</p>
							<a href="#">Ver más noticias</a>
						</div>
					</div>
					<div class="span9">
						<h2>News here</h2>
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
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem qui saepe quisquam laboriosam voluptates dolore doloremque.</p>
							<a href="#">Ver más opinión</a>
						</div>
					</div>
					<div class="span9">
						<?php
							$opinion_post = largo_get_featured_posts( array(
								'tax_query' => array(
									array(
										'taxonomy' 	=> 'prominence',
										'field' 	=> 'slug',
										'terms' 	=> 'top-story'
									)
								),
								'posts_per_page' => 2
							) );
							if ( $opinion_post->have_posts() ) {
						?>
						<?php while ( $opinion_post->have_posts() ) { $opinion_post->the_post(); $shown_ids[] = get_the_ID(); ?>
							<article class="post-entry post-entry-black">
								<div class="row-fluid">
									<?php if (has_post_thumbnail()): ?>
									<div class="span6">
										<figure class="post-image">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
										</figure>
									</div>
									<?php endif;?>
									<div class="<?php echo has_post_thumbnail() ? 'span6' : 'span12'?>">
										<div class="post-body">
											<?php the_category();?>
											<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<h5 class="post-byline byline"><?php largo_byline(); ?></h5>
											<div class="post-excerpt">
												<?php the_excerpt(); ?>	
											</div>
											<div class="form-group">
												<a href="<?php the_permalink() ?>" class="btn btn-round btn-black"><?php _e('Read More', 'largo'); ?></a>	
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
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus quasi minus voluptatem culpa porro assumenda quisquam, veniam reprehenderit.</p>
							<a href="#">Ver más</a>
						</div>
					</div>
					<div class="span9">
						<?php
							$ifp_post = largo_get_featured_posts( array(
								'tax_query' => array(
									array(
										'taxonomy' 	=> 'prominence',
										'field' 	=> 'slug',
										'terms' 	=> 'top-story'
									)
								),
								'posts_per_page' => 2
							) );
							if ( $ifp_post->have_posts() ) {
						?>
						<?php while ( $ifp_post->have_posts() ) { $ifp_post->the_post(); $shown_ids[] = get_the_ID(); ?>
							<article class="post-entry post-entry-white">
								<div class="row-fluid">
									<?php if (has_post_thumbnail()): ?>
									<div class="span6">
										<figure class="post-image">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
										</figure>
									</div>
									<?php endif;?>
									<div class="<?php echo has_post_thumbnail() ? 'span6' : 'span12'?>">
										<div class="post-body">
											<?php the_category();?>
											<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<h5 class="post-byline byline"><?php largo_byline(); ?></h5>
											<div class="post-excerpt">
												<?php the_excerpt(); ?>	
											</div>
											<div class="form-group">
												<a href="<?php the_permalink() ?>" class="btn btn-round btn-black"><?php _e('Read More', 'largo'); ?></a>	
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
			</div>
		</div>
	</div>
</div>
