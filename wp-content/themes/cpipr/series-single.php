<?php
/*
Template Name: Series single
Template Post Type: post
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

function getNextPost($post, $series_map)
{
    $current_id = array_search($post->ID, $series_map);
    if ($current_id < count($series_map)) {
        return get_post($series_map[$current_id + 1]);
    }
}

$content_span = array('one-column' => 12, 'two-column' => 8, 'three-column' => 5);
?>
<?php $heroImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');?>
	<div class="hero-main">
		<div class="wrapper-image" style="background: url('<?php echo $heroImage['0']; ?>') no-repeat center/cover;">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span8 offset2 mobile-no-offset">
						<p class="text--important">Serie especial</p>
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
				<div class="span8 offset2 mobile-no-offset">
				<span class="by-author">
						<span class="by">por</span> 
							<span class="author vcard" itemprop="author">
								<?php
									$authors = get_coauthors();
									foreach($authors as $author) {
										$archive_link = get_author_posts_url( $author->ID, $author->user_nicename );
										$avatar = coauthors_get_avatar( $author, 128 );
										$name =  $author->display_name;
										echo $avatar . '<a class="url fn n" href="' . $archive_link . '" rel="author">' . $name . '</a><span class="and">y</span>';
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
	<div class="wrapper-main-next post-prev" id="wrapper-posts">
		<div class="wrapper-hero">
			<?php
$next_post = getNextPost($post, $series_map);
if (!empty($next_post)):
    $heroImageNext = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'full');
    ?>
        <div class="hero-main">
          <div class="wrapper-image" style="background: url('<?php echo $heroImageNext['0']; ?>') no-repeat center/cover;">
            <div class="container-fluid">
              <div class="row-fluid">
                <div class="span2">
                  <h3 class="title-post">Siguiente en la serie</h3>
                </div>
                <div class="span8 mobile-no-offset">
                  <div class="wrapper-post-serie">
                    <h2>
                      <a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo $next_post->post_title; ?></a>
                    </h2>
                    <p class="date-text"><?php the_time('j F, Y')?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif;?>
		</div>
	</div>
	<div class="social-media-main">
		<div class="container-fluid mobile-full-width">
			<div class="row-fluid">
				<div class="span8 offset2 mobile-no-offset">
        <span class="by-author">
						<span class="by">por</span> 
							<span class="author vcard" itemprop="author">
								<?php
									$authors = get_coauthors();
									foreach($authors as $author) {
										$archive_link = get_author_posts_url( $author->ID, $author->user_nicename );
										$avatar = coauthors_get_avatar( $author, 128 );
										$name =  $author->display_name;
										echo $avatar . '<a class="url fn n" href="' . $archive_link . '" rel="author">' . $name . '</a><span class="and">y</span>';
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
<!-- /.grid_4 -->
<?php get_footer();
