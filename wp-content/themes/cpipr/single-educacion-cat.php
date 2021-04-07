<?php

global $shown_ids;

add_filter( 'body_class', function( $classes ) {
	$classes[] = 'normal category-educacion-single';
	return $classes;
} );

get_header();

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 

?>

<div class="hero-main">
		<div class="wrapper-image" style="background: url('<?php echo $featured_img_url; ?>') no-repeat center/cover;">
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
						<h2 id="single-title">
							<?php the_title();?>
						</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="wrapper-text yellow-wrapper">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span8 offset2 mobile-no-offset text--big">
						<?php the_excerpt();  ?>
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

<div id="content" role="main">
<?php while ( have_posts() ) : the_post(); ?>
    
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

<?php endwhile;	?>
</div>
<style>
    .hero-main .yellow-wrapper{
        background:#EAC135;
    }
	.category-educacion-single .hero-main h2{
		text-transform:none;
	}
	.text--big p {
		font-size: 24px;
	}
</style>
<?php do_action( 'largo_after_content' ); ?>

<?php get_footer();