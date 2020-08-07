<?php
	$opt = get_post_custom($post->ID);
	$heroImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>
<?php // We need the following html for flotable social ?>
<div class="hero" style="margin:0;"></div>
<header>
	<div class="entry-title"></div>
</header>
<?php if ($opt['header_enabled']): ?>
	<div class="hero-main">
		<div class="wrapper-image" style="background: url('<?php echo $heroImage['0']; ?>') no-repeat center/cover;">
				<?php
					$hero_video = get_post_meta( $post->ID, 'hero_video', true );
					if( !empty( $hero_video ) ) {
							echo '<video autoplay playsinline muted loop id="videoHero" class="video-hero">
												<source src="' . $hero_video . '" type="video/mp4">
										</video>';
					}
				?>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span8 offset2 mobile-no-offset">
						<p class="text--important"><?php _e('Series', 'largo'); ?></p>
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
						<p class="date-text">
							<?php largo_time(true, null, true); ?>
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
	</div>
<?php endif; ?>