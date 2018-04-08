<?php
/**
 * Template Name: Calentamiento Series Landing Page
 * Description: The default template for a series landing page. Many display options are set via admin.
 */
get_header();

// Load up our meta data and whatnot
the_post();

//make sure it's a landing page.
if ('cftl-tax-landing' == $post->post_type) {
    $opt = get_post_custom($post->ID);
    foreach ($opt as $key => $val) {
        $opt[$key] = $val[0];
    }
    $opt['show'] = maybe_unserialize($opt['show']); //make this friendlier
    if ('all' == $opt['per_page']) {
        $opt['per_page'] = -1;
    }

    /**
     * $opt will look like this:
     *
     *    Array (
     *        [header_enabled] => boolean
     *        [show_series_byline] => boolean
     *        [show_sharebar] => boolean
     *        [header_style] => standard|alternate
     *        [cftl_layout] => one-column|two-column|three-column
     *        [per_page] => integer|all
     *        [post_order] => ASC|DESC|top, DESC|top, ASC
     *        [footer_enabled] => boolean
     *        [footerhtml] => {html}
     *        [show] => array with boolean values for keys byline|excerpt|image|tags
     *    )
     *
     * The post description is stored in 'excerpt' and the custom HTML header is the post content
     */
}

// #content span width helper
$content_span = array('one-column' => 12, 'two-column' => 8, 'three-column' => 5);
?>
<?php $heroImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');?>
<?php if ($opt['header_enabled']): ?>
	<div class="hero-main">
		<div class="wrapper-image" style="background: url('<?php echo $heroImage['0']; ?>') no-repeat center/cover;">
			<video autoplay muted loop id="videoHero" class="video-hero">
			  	<source src="<?php bloginfo('stylesheet_directory');?>/images/CP-CG-C4.mov" type="video/mp4">
			</video>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span8 offset2 mobile-no-offset">
						<p class="text--important">Serie especial</p>
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
						<p class="date-text"><?php the_time('j F, Y')?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="social-media-main">
		<div class="container-fluid mobile-full-width">
			<div class="row-fluid">
				<div class="span10 offset2 mobile-no-offset">
					<?php largo_byline(true)?>
					<div class="social-media-list">
						<?php largo_post_social_links();?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
	<div class="wrapper-main-white">
		<div class="container-fluid">
			<div class="row-fluid wrapper-post">
				<div class="span2">
					<h3 class="title-post">Abstract</h3>
				</div>
				<div class="span7 mobile-no-offset">
				<p>Una decena de periodistas caribeños liderados por el Centro de Periodismo Investigativo (CPI) de Puerto Rico investigaron durante casi un año los efectos del cambio climático en sus países. Justo cuando comenzaban a escribir sus historias, llegaron los huracanes Irma y María, que devastaron varios de los territorios.
					<p>Por años se había dicho que las islas caribeñas figuran entre las más vulnerables del mundo ante el cambio climático, pero en 2017 este pronóstico se convirtió en una dura realidad para millones de habitantes de los países antillanos. Efectos concretos del cambio climático como el aumento en el nivel del mar y en las lluvias, así como huracanes de mayor intensidad, y la erosión costera, son ya una realidad que está causando estragos en el Caribe, perjudicando la vida social y económica de las islas. Los devastadores huracanes de 2017, Irma y María, exacerbaron los problemas en las islas más afectadas dejando al descubierto la fragilidad de sus infraestructuras y la negligencia de gobiernos que no tomaron medidas para proteger a sus poblaciones. Estos eventos causaron sobre $175,000 millones en daños y pérdidas en Puerto Rico, BVI, USVI, Dominica, Antigua y Barbuda, y San Martín. Además provocaron la salida de más de 275,000 de sus ciudadanos por razones económicas y de seguridad.</p>
					<p>El grupo de periodistas, que fueron entrenados por el CPI en el manejo de bases de datos y en aspectos técnicos y científicos del cambio climático, trabajaron antes, durante y luego de los huracanes para reconducir algunas de sus investigaciones. Las historias no tratan sobre los pronósticos y amenazas de lo que pasará, sino de la cruda realidad que está viviendo la gente de estos países.</p>
					<p>Como parte de su investigación, el grupo enfrentó la falta de datos sobre buena parte de las islas en los bancos internacionales de información sobre el tema. Ante esta realidad, elaboraron indicadores uniformes sobre legislación y políticas públicas, así como los impactos de las principales problemáticas ambientales vinculadas al cambio climático.</p>
					<p>Los periodistas participantes del proyecto son Freeman Rogers de The BVI Beacon, Islas Vírgenes Británicas, Mariela Mejía de Diario Libre, República Dominicana, Mary Triny Zea de La Prensa, Panamá, Patrick Saint-Pré de Le Nouvelliste, Haití, y de Puerto Rico Emmanuel Estrada López de Diálogo Digital, e Istra Pacheco, Maricelis Rivera Santos, Eliván Martínez Mercado y Omaya Sosa Pascual, del CPI.</p>
					<p>Casi dos meses antes de que inicie una temporada de huracanes que se proyecta muy activa para el Caribe, el grupo presenta sus hallazgos. El proyecto transfronterizo es pionero en su tipo: hecho sobre temas caribeños, liderado por periodistas caribeños, escrito y editado por periodistas del Caribe que están en el campo, tienen el contexto y las fuentes.</p>
					<p>Las investigaciones fueron posibles en parte con el apoyo de Ford Foundation, Para la Naturaleza, Miranda Foundation, Fundación Angel Ramos y Open Society Foundations.</p>
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
					<h3 class="title-post">
						Historias en la serie
					</h3>
				</div>
				<div class="span10 mobile-no-offset">
					<div class="row-fluid">
						<?php global $wp_query, $post;

						// Make sure we're actually a series page, and pull posts accordingly
						if (isset($wp_query->query_vars['term'])
								&& isset($wp_query->query_vars['taxonomy'])
								&& 'series' == $wp_query->query_vars['taxonomy']) {

								$series = $wp_query->query_vars['term'];

								//default query args: by date, descending
								$args = array(
										'p' => '',
										'post_type' => 'post',
										'taxonomy' => 'series',
										'term' => $series,
										'order' => 'DESC',
										'posts_per_page' => $opt['per_page'],
								);

								//stores original 'paged' value in 'pageholder'
								global $cftl_previous;
								if (isset($cftl_previous['pageholder']) && $cftl_previous['pageholder'] > 1) {
										$args['paged'] = $cftl_previous['pageholder'];
										global $paged;
										$paged = $args['paged'];
								}

								//change args as needed
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
								$counter = 1;
								while ($series_query->have_posts()): $series_query->the_post();
										if (($counter % 2) == 0) {
												get_template_part('partials/content', 'series');
												do_action('largo_loop_after_post_x', $counter, $context = 'archive');
												echo '</div>';
										} else {
												echo '<div class="container-items">';
												get_template_part('partials/content', 'series');
												do_action('largo_loop_after_post_x', $counter, $context = 'archive');
										}

										$counter++;
								endwhile;
								if (($counter % 2) == 0) {
										echo '</div>';
								}

								wp_reset_postdata();

								// Enqueue the LMP data
								$posts_term = of_get_option('posts_term_plural');
								largo_render_template('partials/load-more-posts', array(
										'nav_id' => 'nav-below',
										'the_query' => $series_query,
										'posts_term' => ($posts_term) ? $posts_term : 'Posts',
								));
								}?>
					</div>
				</div>
			</div>
		</div>
		<?php if ($opt['cftl_layout'] != 'one-column'):
    if (!empty($opt['right_region']) && $opt['right_region'] !== 'none') {
        $right_rail = $opt['right_region'];
    } else {
        $right_rail = 'single';
    }
		endif;?>
	</div>
	<div class="wrapper-main-black">
		<div class="container-fluid">
			<div class="row-fluid wrapper-post">
				<div class="span2">
					<h3 class="title-post">Autores en la serie</h3>
				</div>
				<div class="span7">
					<?php dynamic_sidebar('sidebar-4');?>
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
	<div class="wrapper-main-white wrapper-special">
		<div class="container-fluid">
			<div class="row-fluid wrapper-post">
				<div class="span2">
					<h3 class="title-post">Series especiales</h3>
				</div>
				<div class="span10">
					<div class="row-fluid container-special">
						<?php $other_series = $wp_query->query_vars['post_type'];
						//default query args: by date, descending
						$args = array(
								'p' => '',
								'post_type' => 'cftl-tax-landing',
								'order' => 'DESC',
								'posts_per_page' => 6,
								'post__not_in' => array($post->ID),
						);
						$other_series_query = new WP_Query($args);
						while ($other_series_query->have_posts()): $other_series_query->the_post();?>
						<div class="span6">
							<a href="<?php the_permalink();?>" class="item-special">
							<div style="position:relative;background: #000;">	<?php the_post_thumbnail();?>
									<div class="overlay">
										<div class="container-text">
											<p><?php the_title();?></p>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php endwhile;?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
//display series footer
if ('none' != $opt['footer_style']): ?>
	<section id="series-footer">
		<?php
/*
 * custom footer html
 * If we don't reset the post meta here, then the footer HTML is from the wrong post. This doesn't mess with LMP, because it happens after LMP is enqueued in the main column.
 */
wp_reset_postdata();
if ('custom' == $opt['footer_style']) {
    echo apply_filters('the_content', $opt['footerhtml']);
} else if ('widget' == $opt['footer_style'] && is_active_sidebar($post->post_name . "_footer")) {?>
				<aside id="sidebar-bottom">
				<?php dynamic_sidebar($post->post_name . "_footer");?>
				</aside>
			<?php }
?>
	</section>
<?php endif;?>

<!-- /.grid_4 -->
<?php get_footer();
