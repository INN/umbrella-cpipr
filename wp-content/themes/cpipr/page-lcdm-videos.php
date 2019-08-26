<?php
    get_template_part('partials/los-chavos-de-maria/header');
    
    $lcdm_active_menu = 'videos';
    get_template_part('partials/los-chavos-de-maria/es/header');
    get_template_part('partials/los-chavos-de-maria/es/menu');
?>

    <!-- Hero Page Title  -->
    <div class="lcdm-hero-page-title-wrapper" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')">
        <div class="lcdm-hero-page-title-overlay">
            <div class="lcdm-hero-page-title-media">
                <div class="lcdm-hero-page-title-icon">
                    <i class="lcdm-icon lcdm-icon-videos"></i>
                </div>
                <div class="lcdm-hero-page-title">
                    <h1>VIDEOS</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Videos section -->
    <div class="lcdm-section">
        <div class="container-fluid">
            <?php
                $args = array(
                    'post_type' => 'cpipr_video',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'post_tag',
                            'field'    => 'slug',
                            'terms'    => 'spanish',
                        )
                    ),
                    'order' => 'DESC',
                    'posts_per_page' => 1,
                    'post_status' => 'publish'
                );
                $videos_query = new WP_Query($args);
            ?>
            <?php if ($videos_query->have_posts()) { $videos_query->the_post(); ?>
            <div id="video-player-section" class="cpipr-video-player">
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="video-player" class="embed-responsive-item" src="<?php echo get_the_excerpt(); ?>"></iframe>
                </div>
            </div>
            <?php } wp_reset_postdata(); ?>
            <div id="posts-container"></div>
            <div class="text-center">
                <div class="lcdm-spinner"></div>
                <a id="load-more" href="#" class="btn btn-lg btn-black">Cargar Más</a>
            </div>
        </div>
    </div>

<?php get_template_part('partials/los-chavos-de-maria/footer'); ?>