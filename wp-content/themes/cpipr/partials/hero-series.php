<?php $heroImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');?>
<?php // We need the following html for flotable social ?>
<div class="hero" style="margin:0;"></div>
<header>
	<div class="entry-title"></div>
</header>
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
						<?php largo_time(true, $post->ID, true); ?>
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