<?php
/*
Template Name: Series single
Template Post Type: post
*/

get_header();

// Load up our meta data and whatnot
the_post();

//make sure it's a landing page.
if ( 'cftl-tax-landing' == $post->post_type ) {
	$opt = get_post_custom( $post->ID );
	foreach( $opt as $key => $val ) {
		$opt[ $key ] = $val[0];
	}
	$opt['show'] = maybe_unserialize($opt['show']);	//make this friendlier
	if ( 'all' == $opt['per_page'] ) $opt['per_page'] = -1;
	/**
	 * $opt will look like this:
	 *
	 *	Array (
	 *		[header_enabled] => boolean
	 *		[show_series_byline] => boolean
	 *		[show_sharebar] => boolean
	 *		[header_style] => standard|alternate
	 *		[cftl_layout] => one-column|two-column|three-column
	 *		[per_page] => integer|all
	 *		[post_order] => ASC|DESC|top, DESC|top, ASC
	 *		[footer_enabled] => boolean
	 *		[footerhtml] => {html}
	 *		[show] => array with boolean values for keys byline|excerpt|image|tags
	 *	)
	 *
	 * The post description is stored in 'excerpt' and the custom HTML header is the post content
	 */
}


// #content span width helper
$content_span = array( 'one-column' => 12, 'two-column' => 8, 'three-column' => 5 );
?>
<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>


	<div class="hero-main">
		<div class="wrapper-image" style="background: url('<?php echo $heroImage['0'];?>') no-repeat center/cover;">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span8 offset2 mobile-no-offset">
						<p class="text--important">Serie especial</p>
						<h2 id="single-title">
							<?php the_title(); ?>
						</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="wrapper-text">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span8 offset2 mobile-no-offset text--big">
						<?php echo apply_filters( 'the_content', $post->post_excerpt ); ?>
						<p class="date-text"><?php the_time('j F, Y') ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="social-media-main">
		<div class="container-fluid mobile-full-width">
			<div class="row-fluid">
				<div class="span8 offset2 mobile-no-offset">
					<?php largo_byline( true ) ?>
					<div class="social-media-list">
						<?php largo_post_social_links(); ?>
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
					<div class="blockquote">
						<p class="primary-text">Para hacer que investigaciones como esta sigan siendo posibles</p>
						<p>Dona ahora</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="wrapper-main-black">
		<div class="container-fluid">
			<div class="row-fluid wrapper-post">
				<div class="span2">
					<h3 class="title-post">Autores en la serie</h3>
				</div>

				<div class="span7">

					<?php
						dynamic_sidebar( 'sidebar-4' );
					?>
				</div>
			</div>
		</div>
	</div> -->

	<div class="wrapper-main-next post-prev" id="wrapper-posts">
		<?php $prev_post = get_previous_post(); ?>
		<?php $next_post = get_next_post(); ?>
		<?php if ( !empty( $prev_post ) ) : ?>
			<?php if ( !empty( $next_post ) ) : ?>
				<div class="arrow-posts arrow-left" id="post-prev">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/arrow-left.png">
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<div class="wrapper-hero">
			<?php 
				if ( !empty( $prev_post ) ) : 
					$heroImagePrev = wp_get_attachment_image_src( get_post_thumbnail_id($prev_post->ID), 'full' );
			?>
				<div class="hero-main">
					<div class="wrapper-image" style="background: url('<?php echo $heroImagePrev['0'];?>') no-repeat center/cover;">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span2">
									<h3 class="title-post">Anterior en la serie</h3>
								</div>
								<div class="span8 mobile-no-offset">
									<div class="wrapper-post-serie">
										<h2>
											<a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo $prev_post->post_title; ?></a>
										</h2>
										<p class="date-text"><?php the_time('j F, Y') ?> | Por:  <?php largo_byline( true ) ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php 
				if ( !empty( $next_post ) ) : 
					$heroImageNext = wp_get_attachment_image_src( get_post_thumbnail_id($next_post->ID), 'full' );
			?>
				<div class="hero-main">
					<div class="wrapper-image" style="background: url('<?php echo $heroImageNext['0'];?>') no-repeat center/cover;">
						<div class="container-fluid">
							<div class="row-fluid">
								<div class="span2">
									<h3 class="title-post">Siguiente en la serie</h3>
								</div>
								<div class="span8 mobile-no-offset">
									<div class="wrapper-post-serie">
										<h2>
											<a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a>
										</h2>
										<p class="date-text"><?php the_time('j F, Y') ?> | Por:  <?php largo_byline( true ) ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( !empty( $next_post ) ) : ?>
			<div class="arrow-posts arrow-right" id="post-next">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/arrow-right.png">
			</div>
		<?php endif; ?>
	</div>

	<div class="social-media-main">
		<div class="container-fluid mobile-full-width">
			<div class="row-fluid">
				<div class="span8 offset2 mobile-no-offset">
					<?php largo_byline( true ) ?>
					<div class="social-media-list">
						<?php largo_post_social_links(); ?>
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
				<a href="#" class="btn-black">Donar</a>
				<!--<ul class="social-media">
					<li><a href="#"><img src="assets/images/fbIcon.svg"></a></li>
					<li><a href="#"><img src="assets/images/twitterIcon.svg"></a></li>
					<li><a href="#"><img src="assets/images/mailIcon.svg"></a></li>
					<li><a href="#"><img src="assets/images/printIcon.svg"></a></li>
					<li><a href="#"><img src="assets/images/threeDotsIcon.svg"></a></li>
				</ul>-->
			</div>
		</div>
	</div>

<script>
	jQuery(document).ready(function($) {
		counterPosts = 0;

		$('#post-prev').click(function () {
			if(counterPosts == 1){
				$("#wrapper-posts").removeClass("post-next");
				$("#wrapper-posts").addClass("post-prev");
				counterPosts = 0;
			}
		});

		$('#post-next').click(function () {
			if(counterPosts == 0){
				$("#wrapper-posts").removeClass("post-prev");
				$("#wrapper-posts").addClass("post-next");
				counterPosts = 1;
			}
		});
	});
</script>

<!-- /.grid_4 -->
<?php get_footer();
