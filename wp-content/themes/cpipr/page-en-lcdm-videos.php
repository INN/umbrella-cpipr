<?php
    get_template_part('partials/los-chavos-de-maria/header');
    
    $lcdm_active_menu = 'videos';
    get_template_part('partials/los-chavos-de-maria/en/header');
    get_template_part('partials/los-chavos-de-maria/en/menu');
?>

    <!-- Videos section -->
    <div class="lcdm-section">
        <div class="container-fluid">
            <?php
                $args = array(
                    'post_type' => 'post',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'series',
                            'field'    => 'slug',
                            'terms'    => 'los-chavos-de-maria',
                        ),
                        array(
                            'taxonomy' => 'post_tag',
                            'field'    => 'slug',
                            'terms'    => 'video',
                        ),
                        array(
                            'taxonomy' => 'post_tag',
                            'field'    => 'slug',
                            'terms'    => 'english',
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
                    <iframe id="video-player" class="embed-responsive-item" src="<?php echo get_the_content(); ?>"></iframe>
                </div>
            </div>
            <?php } wp_reset_postdata(); ?>
            <div id="posts-container"></div>
            <div class="text-center">
                <div class="lcdm-spinner"></div>
                <a id="load-more" href="#" class="btn btn-lg btn-black">Load More</a>
            </div>
        </div>
    </div>

<?php get_template_part('partials/los-chavos-de-maria/footer'); ?>