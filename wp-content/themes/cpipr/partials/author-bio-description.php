<?php

// Author name
if ( is_author() ) {
	echo '<h1 class="fn n">' . $author_obj->display_name . '</h1>';

	// Avatar
	if ( largo_has_avatar( $author_obj->user_email ) ) {
		echo '<div class="photo">' . get_avatar( $author_obj->ID, 96, '', $author_obj->display_name ) . '</div>';
	} elseif ( $author_obj->type == 'guest-author' && get_the_post_thumbnail( $author_obj->ID ) ) {
		$photo = get_the_post_thumbnail( $author_obj->ID, array( 96,96 ) );
		$photo = str_replace( 'attachment-96x96 wp-post-image', 'avatar avatar-96 photo', $photo );
		echo '<div class="photo">' . $photo . '</div>';
	}

	// Job!
	$show_job_titles = of_get_option('show_job_titles');
	if ( $job = $author_obj->job_title && $show_job_titles ) {
		echo '<p class="job-title">' . esc_attr( $author_obj->job_title ) . '</p>';
	}
	// Description
	if ( $author_obj->description ) {
		echo '<p>' . esc_attr( $author_obj->description ) . '</p>';
	}
} else {
	?>
	<div class="item-author">
		<div class="wrapper-title">
			<?php 
			if ( largo_has_avatar( $author_obj->user_email ) ) {
				echo get_avatar( $author_obj->ID, 96, '', $author_obj->display_name );
			} elseif ( $author_obj->type == 'guest-author' && get_the_post_thumbnail( $author_obj->ID ) ) {
				$photo = get_the_post_thumbnail( $author_obj->ID, array( 96,96 ) );
				$photo = str_replace( 'attachment-96x96 wp-post-image', 'avatar avatar-96 photo', $photo );
				echo $photo;
			} ?>

			<div class="container-title">
				<h2><?php echo esc_attr( $author_obj->display_name ); ?></h2>
			</div>

			<ul class="social-media-list">
				<?php if ( $twitter = $author_obj->twitter ) { ?>
					<li class="twitter">
						<a href="https://twitter.com/<?php echo largo_twitter_url_to_username ( $twitter ); ?>"><i class="icon-twitter"></i></a>
					</li>
				<?php } ?>

				<?php 
				$email = $author_obj->user_email;
				$show_email = 'off';
				if (isset($user_meta['show_email'][0])) {
					$show_email = $user_meta['show_email'][0];
				} else if ( !empty($author_obj->show_email) ) {
					$show_email = $author_obj->show_email;
				}

				if ( $email && $show_email !== 'off' ) { ?>
					<li class="email">
						<a class="email" href="mailto:<?php echo esc_attr( $email ); ?>" title="e-mail <?php echo esc_attr( $author_obj->display_name ); ?>"><i class="icon-mail"></i></a>
					</li>
				<?php } ?>
			</ul>
		</div>

		<p><?php echo esc_attr( $author_obj->description ); ?></p>

		<?php
		if ( !is_author() ) {
			printf( __( '<a class="btn-white" href="%1$s" rel="author" title="See all posts by %2$s">Más por %2$s</a>', 'largo' ),
				get_author_posts_url( $author_obj->ID, $author_obj->user_nicename ),
				!empty($author_obj->first_name) ? esc_attr( $author_obj->first_name ) : __("this author", 'largo')
			);
		}?>
	</div>
	<?php } ?>
