<?php
/**
 * The template for displaying content in the single.php template
 */
?>

<?php
	$custom_options = array_merge(
		array(
			"herovideo_url" => null,
			"desktop_proportions" => ["56.25%"],
			"tablet_proportions" => ["56.25%"],
			"mobile_proportions" => ["56.25%"],
			"desktop_breakpoint" => ["991px"],
			"tablet_breakpoint" => ["575px"],
			"video_position" => ["50% 50%"],
			"title_color" => ["#000"],
			"title_dropshadow" => ["rgba(255,255,255,0.5)"],
			"video_credit" => null
		),
		get_post_custom()
	);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'hnews item' ); ?> itemscope itemtype="http://schema.org/Article">

	<?php do_action('largo_before_post_header'); ?>
	
	<header class="entry-header">

		<?php if($custom_options["herovideo_url"]) { ?>

			<style>
				.videohero-herobox {
					position: relative;
					width: 100%;
					height:0;
					padding-top: <?php echo($custom_options["desktop_proportions"][0]); ?>;
				}

				@media (max-width: <?php echo($custom_options["tablet_breakpoint"][0]); ?>) {
					.videohero-herobox {
						padding-top: <?php echo($custom_options["mobile_proportions"][0]); ?>;
					}
				}

				@media (max-width: <?php echo($custom_options["desktop_breakpoint"][0]); ?>) and (min-width: <?php echo($custom_options["tablet_breakpoint"][0]); ?>) {
					.videohero-herobox {
						padding-top: <?php echo($custom_options["tablet_proportions"][0]); ?>;
					}
				}
				.videohero-herobox-inner {
					position: absolute;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
					display: flex;
					align-items: center;
					justify-content: center;
					flex-direction: column;
				}
				.videohero-herobox-inner>* {
					z-index:1;
				}
				.videohero-titlebox {
					z-index:1;
				}
				.videohero-video {
					object-fit: cover;
					width: 100%;
					height: 100%;
					position: absolute;
					z-index:0;
					object-position: <?php echo($custom_options["video_position"][0]); ?>;
				}
				h1.video-hero-headline {
					font-size: 5.5rem;
					color: <?php echo($custom_options["title_color"][0]); ?>;
					filter: drop-shadow(0px 0px 0.1em <?php echo($custom_options["title_dropshadow"][0]); ?>);
					line-height: 1;
					max-width: 900px;
					width: 90%;
					text-shadow: 3px 0 0 rgba(255, 255, 255, 0.45), -3px 0 0 rgba(255, 255, 255, 0.45), 0 3px 0 rgba(255, 255, 255, 0.45), 0 -2.4px 0 rgba(255, 255, 255, 0.45), 1.6px 1.6px rgba(255, 255, 255, 0.45), -1.6px -1.6px 0 rgba(255, 255, 255, 0.45), 1.6px -1.6px 0 rgba(255, 255, 255, 0.45), -1.6px 1.6px 0 rgba(255, 255, 255, 0.45);
				}
				@media (max-width: <?php echo($custom_options["tablet_breakpoint"][0]); ?>) {
					h1.video-hero-headline {
						font-size: 3.5rem;
						line-height: 1.2;
					}

				}

				.videohero-herobox .subtitle {
					color: white;
					padding: 0.2rem 0.5rem;
					background-color: black;
					max-width: 600px;
				}

				.videohero-herobox .byline>* {
					display:block;
				}
				.videohero-herobox .byline .sep {
					height:0;
					overflow: hidden;
				}
				.videohero-herobox .byline * {
					font-weight: 600;
					font-size: 1.7rem;
					color: <?php echo($custom_options["title_color"][0]); ?>;
    			filter: drop-shadow(0px 0px 0.1em <?php echo($custom_options["title_dropshadow"][0]); ?>);
				}

				.videohero-herobox-inner > * {
					text-align: center;
				}

				.videohero-herobox .entry-date {
					display: flex;
					flex-direction: column;
				}

				.videohero-caption p {
					text-align: right!important;
					padding-right: 0.3em;
					color: #7d8185!important;
				}

				article .entry-header {
					margin-bottom: 5rem!important;
				}
			</style>
			<div class="alignfull">
				<div class="videohero-herobox">
					<div class="videohero-herobox-inner">
						<video src="<?php echo($custom_options["herovideo_url"][0]) ?>" autoplay loop muted class="videohero-video" playsinline></video>
						
						
						<?php largo_maybe_top_term(); ?>
						<h1 class="entry-title video-hero-headline" itemprop="headline"><?php the_title(); ?></h1>
						<?php if ( $subtitle = get_post_meta( $post->ID, 'subtitle', true ) ) : ?>
							<h2 class="subtitle"><?php echo $subtitle ?></h2>
						<?php endif; ?>

						<!-- <?php if ( ! of_get_option( 'single_social_icons' ) == false ) {
							largo_post_social_links();
						} ?> -->
					
					
				</div>
			</div>

		<?php } else { ?>

			<?php largo_maybe_top_term(); ?>
			
			<h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
			<?php if ( $subtitle = get_post_meta( $post->ID, 'subtitle', true ) ) : ?>
				<h2 class="subtitle"><?php echo $subtitle ?></h2>
			<?php endif; ?>
			<h5 class="byline"><?php largo_byline(true, false, $post->ID); ?></h5>

			<?php if ( ! of_get_option( 'single_social_icons' ) == false ) {
				largo_post_social_links();
			} ?>
		<?php } ?>

<?php largo_post_metadata( $post->ID ); ?>
			<?php if($custom_options["video_credit"]) { ?>
				<div class="wp-caption videohero-caption">
					<p class="wp-media-credit"><?php echo($custom_options["video_credit"][0]); ?></p>
			  </div>
			<?php } ?>
	</header><!-- / entry header -->

	<?php
		do_action('largo_after_post_header');

		largo_hero(null,'');

		do_action('largo_after_hero');
	?>

	<?php get_sidebar(); ?>

	<section class="entry-content clearfix" itemprop="articleBody">
		
		<?php largo_entry_content( $post ); ?>
		
	</section>

	<?php do_action('largo_after_post_content'); ?>

</article>
