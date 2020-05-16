<?php
/**
 * Template Name: Series single
 * Template Post Type: post
 * Description: Shows the post with formatting for custom layout display?
 */

get_header();

// Load up our meta data and whatnot
the_post();

$post_terms = largo_custom_taxonomy_terms($post->ID);
$series = $post_terms[0]->slug;

//default query args: by date, descending
$args = array(
    'p' => '',
    'post_type' => 'post',
    'taxonomy' => 'series',
    'term' => $series,
    'order' => 'DESC',
    'posts_per_page' => $opt['per_page'],
);

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
$series_map = [];

if ($series_query->have_posts()) {
    while ($series_query->have_posts()) {
        $series_query->the_post();
        array_push($series_map, get_the_id());
    }
    /* Restore original Post Data */
    wp_reset_postdata();
} else {
    // no posts found
}

$current_post_position = array_search($post->ID, $series_map);

if (($current_post_position + 1) < count($series_map)) {
	$next_post = get_post($series_map[$current_post_position + 1]);
} else {
	$next_post = false;
}

$content_span = array('one-column' => 12, 'two-column' => 8, 'three-column' => 5);
?>
	<?php $heroImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');?>
	<div class="hero-main">
		<div class="wrapper-image" style="background: url('<?php echo esc_attr( $heroImage['0'] ); ?>') no-repeat center/cover;">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span8 offset2 mobile-no-offset">
						<p class="text--important"><?php echo wp_kses_post( __('Series', 'largo') ); ?></p>
						<h2 id="single-title">
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
						<?php
							$subtitle = get_post_meta( $post->ID, 'subtitle', true );
							if ( ! empty( $subtitle ) ) {
								printf(
									'<p>%1$s</p>',
									wp_kses_post( $subtitle )
								);
							}
						?>
						<p class="date-text">
							<?php
								if (has_category('english', $post->ID)) {
									echo date('j F Y', get_the_time( 'U', $post->ID ));
								} else {
									the_time('j F Y');
								}
							?>
						</p>
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
									if ( function_exists( 'get_coauthors') ) {
										$authors = get_coauthors();
										foreach($authors as $author) {
											$archive_link = get_author_posts_url( $author->ID, $author->user_nicename );
											$avatar = coauthors_get_avatar( $author, 128 );
											$name = $author->display_name;
											echo $avatar . '<a class="url fn n" href="' . esc_attr( $archive_link ) . '" rel="author">' . wp_kses_post( $name ) . '</a><span class="and">y</span>';
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
	</div>
	<div class="wrapper-main-white">
		<div class="container-fluid">
			<div class="row-fluid wrapper-post">
				<div class="span2">
				</div>
				<div class="span7 mobile-no-offset">
					<?php the_content();?>
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
		</div>
	</div>
	<?php
	if ( ! empty( $next_post ) ):
		$heroImageNext = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'full');
		$next_position = array_search($next_post->ID, $series_map);
	?>
		<div class="wrapper-main-next post-prev" id="wrapper-posts">
			<div class="wrapper-hero">
				<div class="hero-main">
					<div class="wrapper-image" style="background: url('<?php echo $heroImageNext['0']; ?>') no-repeat center/cover;">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span2">
									<div class="section-title">
										<h3><?php _e('Next in Series', 'largo'); ?></h3>
										<?php
											// arrays in PHP are zero-indexed, so add 1 to the position
											echo '<h3>' . ($next_position + 1) . ' / ' . count($series_map) . '</h3>';
										?>
									</div>
								</div>
								<div class="span8 mobile-no-offset">
									<div class="wrapper-post-serie">
										<h2>
											<a href="<?php echo esc_attr( get_permalink($next_post->ID) ); ?>"><?php echo wp_kses_post( $next_post->post_title ); ?></a>
										</h2>
										<p class="date-text">
											<?php
												if (has_category('english', $next_post->ID)) {
													echo date('j F Y', get_the_time( 'U', $next_post->ID ));
												} else {
													the_time('j F Y');
												}
											?>
										</p>
									</div>
								</div>
							</div>	
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
											$authors = get_coauthors($next_post->ID);
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
<?php get_footer();
