<?php
/**
 * Template Name: Calentamiento Series Landing Page
 * Description: The default template for a series landing page. Many display options are set via admin.
 */
get_header();

// Load up our meta data and whatnot
the_post();

//make sure it's a landing page.
if ('cftl-tax-landing' == $post->post_type) {
    $opt = get_post_custom($post->ID);
    foreach ($opt as $key => $val) {
        $opt[$key] = $val[0];
    }
    $opt['show'] = maybe_unserialize($opt['show']); //make this friendlier
    if ('all' == $opt['per_page']) {
        $opt['per_page'] = -1;
    }

    /**
     * $opt will look like this:
     *
     *    Array (
     *        [header_enabled] => boolean
     *        [show_series_byline] => boolean
     *        [show_sharebar] => boolean
     *        [header_style] => standard|alternate
     *        [cftl_layout] => one-column|two-column|three-column
     *        [per_page] => integer|all
     *        [post_order] => ASC|DESC|top, DESC|top, ASC
     *        [footer_enabled] => boolean
     *        [footerhtml] => {html}
     *        [show] => array with boolean values for keys byline|excerpt|image|tags
     *    )
     *
     * The post description is stored in 'excerpt' and the custom HTML header is the post content
     */
}

// #content span width helper
$content_span = array('one-column' => 12, 'two-column' => 8, 'three-column' => 5);
?>
<?php $heroImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');?>
<?php if ($opt['header_enabled']): ?>
	<div class="hero-main">
		<div class="wrapper-image" style="background: url('<?php echo $heroImage['0']; ?>') no-repeat center/cover;">
				<?php
					$hero_video = get_post_meta( $post->ID, 'hero_video', true );
					if( !empty( $hero_video ) ) {
							echo '<video autoplay muted loop id="videoHero" class="video-hero">
												<source src="' . $hero_video . '" type="video/mp4">
										</video>';
					}
				?>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span8 offset2 mobile-no-offset">
						<p class="text--important">Serie especial</p>
						<h2>
							<?php the_title();?>
						</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="wrapper-text">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span8 offset2 mobile-no-offset text--big">
						<?php echo apply_filters('the_content', $post->post_excerpt); ?>
						<p class="date-text"><?php the_time('j F, Y')?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="social-media-main">
		<div class="container-fluid mobile-full-width">
			<div class="row-fluid">
				<div class="span10 offset2 mobile-no-offset">
					<span class="by-author">
						<span class="by">por</span> 
							<span class="author vcard" itemprop="author">
								<?php
									if ( function_exists( 'get_coauthors' ) ) {
										$authors = get_coauthors();
										foreach($authors as $author) {
											$archive_link = get_author_posts_url( $author->ID, $author->user_nicename );
											$avatar = coauthors_get_avatar( $author, 128 );
											$name =  $author->display_name;
											echo $avatar . '<a class="url fn n" href="' . $archive_link . '" rel="author">' . $name . '</a><span class="and">y</span>';
										}
									} else {
										$authors = array();
										error_log( 'This theme depends upon Co-Authors Plus!' );
									}
								?>
						</span>
					</span>
					<div class="social-media-list">
						<?php largo_post_social_links();?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
	<div class="wrapper-main-white">
		<div class="container-fluid">
			<div class="row-fluid wrapper-post">
				<div class="span2">
					<h3 class="title-post">Resumen</h3>
				</div>
				<div class="span7 mobile-no-offset">
				<?php
					$abstract_body = get_post_meta( $post->ID, 'abstract_body', true );
					if( !empty( $abstract_body ) ) {
							echo $abstract_body; 
					}
				?>
				</div>
				<div class="span3">
					<a href="<?php echo esc_url(home_url()); ?>/donaciones/">
						<div class="blockquote">
							<p class="primary-text">Para hacer que investigaciones como esta sigan siendo posibles</p>
							<p>Dona ahora</p>
						</div>
					</a>
				</div>
			</div>
			<?php
				$abstract_video = get_post_meta( $post->ID, 'abstract_video', true );
					if( !empty( $abstract_video ) ) {
						echo  '<div class="row-fluid wrapper-video">
											<div class="span2">
												<h3 class="title-post">Video</h3>
											</div>
											<div class="span10">
												<iframe class="iframe-youtube" width="560" height="315" src="https://www.youtube.com/embed/' . $abstract_video . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
												<!-- <p class="text-information">Noel Zamot durante su participación en el Puerto Rico Investment Summit 2018.</p> -->
											</div>
										</div>';
					}
				?>
		</div>
	</div>
	<div class="wrapper-main-gray">
		<div class="container-fluid">
			<div class="row-fluid wrapper-post">
				<div class="span2">
					<h3 class="title-post">
						Historias en la serie
					</h3>
				</div>
				<div class="span10 mobile-no-offset">
					<div class="row-fluid">
						<?php global $wp_query, $post;

						// Make sure we're actually a series page, and pull posts accordingly
						if (
							isset(  $wp_query->query_vars['term'] )
							&& isset($wp_query->query_vars['taxonomy'])
							&& 'series' == $wp_query->query_vars['taxonomy']
						) {

							$series = $wp_query->query_vars['term'];

							//default query args: by date, descending
							$args = array(
								'p' => '',
								'post_type' => 'post',
								'taxonomy' => 'series',
								'term' => $series,
								'order' => 'DESC',
								'posts_per_page' => $opt['per_page'],
							);

							//stores original 'paged' value in 'pageholder'
							global $cftl_previous;
							if ( isset( $cftl_previous['pageholder'] ) && $cftl_previous['pageholder'] > 1 ) {
									$args['paged'] = $cftl_previous['pageholder'];
									global $paged;
									$paged = $args['paged'];
							}

							//change args as needed
							//these unusual WP_Query args are handled by filters defined in cftl-series-order.php
							switch ($opt['post_order']) {
								case 'ASC':
									$args['orderby'] = 'ASC';
									break;
								case 'custom':
									$args['orderby'] = 'series_custom';
									break;
								case 'featured, DESC':
								case 'featured, ASC':
									$args['orderby'] = $opt['post_order'];
									break;
							}

							$series_query = new WP_Query($args);
							$counter = 1;
							while ($series_query->have_posts()) {
								$series_query->the_post();
								get_template_part('partials/content', 'series');
								do_action('largo_loop_after_post_x', $counter, $context = 'archive');
								$counter++;
							}

							wp_reset_postdata();

							// Enqueue the LMP data
							$posts_term = of_get_option('posts_term_plural');
							largo_render_template('partials/load-more-posts', array(
								'nav_id' => 'nav-below',
								'the_query' => $series_query,
								'posts_term' => ($posts_term) ? $posts_term : 'Posts',
							));
						} // end series posts loop
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
			if ( $opt['cftl_layout'] !== 'one-column' ) {
				if (!empty($opt['right_region']) && $opt['right_region'] !== 'none') {
					$right_rail = $opt['right_region'];
				} else {
					$right_rail = 'single';
				}
			}
		?>
	</div>
	<div class="wrapper-main-black">
		<div class="container-fluid">
			<div class="row-fluid wrapper-post">
				<div class="span2">
					<h3 class="title-post">Autores en la serie</h3>
				</div>
				<div class="span7">
					<?php dynamic_sidebar('sidebar-4');?>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper-mobile-orange">
		<div class="container-fluid">
			<div class="wrapper-content">
				<h3>¡APOYA AL CENTRO DE PERIODISMO INVESTIGATIVO!</h3>
				<p>Necesitamos tu apoyo para seguir haciendo y ampliando nuestro trabajo.</p>
			</div>
			<div class="wrapper-buttons">
				<a href="<?php echo esc_url(home_url()); ?>/donaciones/" class="btn-black">Donar</a>
			</div>
		</div>
	</div>
	<div class="wrapper-main-white wrapper-special">
		<div class="container-fluid">
			<div class="row-fluid wrapper-post">
				<div class="span2">
					<h3 class="title-post">Series especiales</h3>
				</div>
				<div class="span10">
					<div class="row-fluid container-special">
						<?php $other_series = $wp_query->query_vars['post_type'];
						//default query args: by date, descending
						$args = array(
								'p' => '',
								'post_type' => 'cftl-tax-landing',
								'order' => 'DESC',
								'posts_per_page' => 6,
								'post__not_in' => array($post->ID),
						);
						$other_series_query = new WP_Query($args);
						while ($other_series_query->have_posts()): $other_series_query->the_post();?>
						<div class="span6">
							<a href="<?php the_permalink();?>" class="item-special">
							<div style="position:relative;background: #000;">	<?php the_post_thumbnail();?>
									<div class="overlay">
										<div class="container-text">
											<p><?php the_title();?></p>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php endwhile;?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
//display series footer
if ('none' != $opt['footer_style']): ?>
	<section id="series-footer">
		<?php
/*
 * custom footer html
 * If we don't reset the post meta here, then the footer HTML is from the wrong post. This doesn't mess with LMP, because it happens after LMP is enqueued in the main column.
 */
wp_reset_postdata();
if ('custom' == $opt['footer_style']) {
    echo apply_filters('the_content', $opt['footerhtml']);
} else if ('widget' == $opt['footer_style'] && is_active_sidebar($post->post_name . "_footer")) {?>
				<aside id="sidebar-bottom">
				<?php dynamic_sidebar($post->post_name . "_footer");?>
				</aside>
			<?php }
?>
	</section>
<?php endif;?>

<!-- /.grid_4 -->
<?php get_footer();
