<?php
/*
 * The default template for displaying content
 *
 * @package Largo
 */
$args = array (
	// post-specific, should probably not be filtered but may be useful
	'post_id' => $post->ID,
	'hero_class' => largo_hero_class( $post->ID, FALSE ),

	// only used to determine the existence of a youtube_url
	'values' => get_post_custom( $post->ID ),

	// this should be filtered in the event of a term-specific archive
	'featured' => has_term( 'homepage-featured', 'prominence' ),

	// $show_thumbnail does not control whether or not the thumbnail is displayed;
	// it controls whether or not the thumbnail is displayed normally.
	'show_thumbnail' => TRUE,
	'show_byline' => TRUE,
	'show_excerpt' => TRUE,
	'in_series' => FALSE,
);

$args = apply_filters( 'largo_content_partial_arguments', $args, get_queried_object() );

extract( $args );

$entry_classes = 'entry-content';

$show_top_tag = largo_has_categories_or_tags();

$authors = get_coauthors();

if ( $featured ) {
	$entry_classes .= ' span10 with-hero';
	$show_thumbnail = FALSE;
}

?>

<div class="span6 mobile-no-offset" id="post-<?php the_ID(); ?>">
	<div class="item-article">
		
		<a href="<?php echo get_permalink(); ?>">
			<div class="wrapper-image">
				<?php if ( $show_thumbnail ) {
					echo get_the_post_thumbnail(null, $size = ('rect_thumb'), $attr = '');
				}?>

				<div class="title-article">
					<h2><?php the_title(); ?></h2>
					<p class="date-text"><?php the_time('j F, Y') ?></p>
				</div>
			</div>
		</a>

		<div class="wrapper-information">
			
				<?php
				if ( $show_byline ) { 
					foreach($authors as $author) {
						$archive_link = get_author_posts_url( $author->ID, $author->user_nicename );
						$avatar = coauthors_get_avatar( $author, 128 );
						$name =  $author->display_name;
						echo '<div class="series-author"><a href="' . $archive_link . '" style="display:flex;width: 7em;"><div class="series-author--avatar">' . $avatar . '</div><p style="line-height: 1.25em;">' . $name  . '</p></a></div>';
					}
				?>
				<?php }?>

		</div>

		<div class="wrapper-content">
			<?php if ( $show_excerpt ) { 
				largo_excerpt();
			}?>
		</div>

		<div class="wrapper-buttons">
			<a href="<?php echo get_permalink(); ?>" class="btn-black">Leer más</a>

			<div class="social-media-list">
				<?php largo_post_social_links(); ?>
			</div>
		</div>
	</div>
</div>