<?php 
get_header(); 
$heroImage =  get_term_meta(get_queried_object_id(), 'banner_image', true );
$heroImage = wp_get_attachment_image_src($heroImage, 'full');

$hero_video = get_term_meta(get_queried_object_id(), 'banner_video', true );
$hero_video = wp_get_attachment_url($hero_video);

?>

<div class="hero-main">
		<div class="wrapper-image" style="background: url('<?php echo $heroImage['0'] ?>') no-repeat center/cover;">
				<?php
					
					if( !empty( $hero_video ) ) {
						echo '<video autoplay playsinline muted loop id="videoHero" class="video-hero">
								<source src="' . $hero_video . '" type="video/mp4">
								</video>';
					}
				?>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span8 offset2 mobile-no-offset">
						<h2><?php echo get_queried_object()->name;?></h2>
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
									<img src="https://periodismoinvestigativo.com/wp-content/uploads/2017/12/CPI-blanco-2-140x140.jpg" alt="" class="avatar avatar-128 photo" width="128" height="128">
									<a class="url fn n" href="https://periodismoinvestigativo.com/author/centro-de-periodismo-investigativo/" rel="author">Centro de Periodismo Investigativo</a>
							</span>
							</span>
						<div class="social-media-list">
							<?php largo_post_social_links(); ?>
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
				<h3 class="title-post">Resumen</h3>
				</div>
				<div class="span7 mobile-no-offset">
					<?php echo get_term_meta(get_queried_object_id(), 'resumen', true ); ?>
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

	<div class="wrapper-main-gray">
		<div class="container-fluid">
			<div class="row-fluid wrapper-post">
				<div class="span2">
					<h3 class="title-post"><?php _e('Historias', 'largo'); ?></h3>
				</div>
				<div class="span10 mobile-no-offset">
					<div class="boxes-columns">
					<?php $catID = get_queried_object_id(); ?>
					<?php query_posts('posts_per_page=6&cat='. $catID .'&orderby=date&order=ASC'); ?>
					<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

						<?php get_template_part('partials/content', 'series-cat'); ?>

					<?php endwhile; endif; ?>
					<?php wp_reset_query(); ?>

					</div>
				</div>
			</div>
		</div>
		
	</div>

<?php 

$add_series_section = get_term_meta( get_queried_object_id(), 'add_series_section', true);
$series_posts = get_term_meta( get_queried_object_id(), 'series_posts', true);

?>

<?php if($add_series_section): ?>
	<div class="wrapper-main-white wrapper-special">
		<div class="container-fluid">
			<div class="row-fluid wrapper-post">
				<div class="span2">
					<h3 class="title-post">Series de <?php echo get_queried_object()->name;?></h3>
					<div class="series-desc"><?php echo get_term_meta( get_queried_object_id(), 'descripcion_de_la_serie', true); ?></div>
					<div class="wrapper-buttons">
						<div class="social-media-list">
								<?php largo_post_social_links(); ?>
						</div>
					</div>
				</div>
				<div class="span10">
					<div class="row-fluid">
						<?php 
						//default query args: by date, descending
						$args = array(
								'post_type' => 'cftl-tax-landing',
								'order' => 'DESC',
								'post__in' => $series_posts,
						);
						
						$other_series_query = new WP_Query($args);
						$odd = 0;
						while ($other_series_query->have_posts()): $other_series_query->the_post();?>
						<?php if ($odd && $odd % 2 == 0) : ?>
								</div>
							<div class="row-fluid">
						<?php endif; ?>
						<div class="span6">
							<a href="<?php the_permalink();?>" class="series-item">
								<div class="image" style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : 'https://dummyimage.com/600x400/ccc/ccc.jpg'; ?>')"></div>
								<div class="overlay"><p><?php the_title();?></p></div>
							</a>
						</div>
						<?php $odd++; ?>
						
					<?php endwhile;?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<style>
.series-desc{
	font-size:11px;
}

.social-media-list{

}

.series-desc + .wrapper-buttons{
	margin-top:15px;
}

.series-desc + .wrapper-buttons .post-social > span{
	padding:0 3px;
}

.series-item .image {
    padding-bottom: 46.25%;
}

.series-item .overlay{
	background: rgba(255,255,255,.4);
	color: #fff;
	top: 0;
	left: 0;
	position: absolute;
	padding: 15px;
	text-align: center;
	width: 100%;
	height: 100%;
	transform:none;
	display:flex;
	align-items:center;
	align-content:center;
	text-align:centerM
}

.series-item .overlay p{
	font-family: 'GT america compressed black',sans-serif;
	text-transform: uppercase;
	font-size: 5vw;
	line-height: 1;
	width: 100%;
	font-style: normal;
	font-weight: bold;
}

@media(max-width:767px){
	.series-item .overlay p{
		font-size: 8vw;	
	}
}

</style>
<?php get_footer();
