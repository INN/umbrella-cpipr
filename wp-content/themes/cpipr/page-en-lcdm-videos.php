    <?php
        get_template_part('partials/los-chavos-de-maria/header');
        
        $lcdm_active_menu = 'videos';
        get_template_part('partials/los-chavos-de-maria/en/header');
        get_template_part('partials/los-chavos-de-maria/en/menu');
    ?>

        <!-- Hero Page Title  -->
        <div class="lcdm-hero-page-title-wrapper">
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
                        <iframe id="video-player" class="embed-responsive-item" src="<?php echo get_the_excerpt(); ?>"></iframe>
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

        <?php get_template_part('partials/los-chavos-de-maria/en/footer'); ?>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    var currentPage = 1;
                    function loadPosts() {
                        var loadMore = $('#load-more');
                        var url = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
                        $.ajax({
                            beforeSend: function (qXHR) {
                                $('.lcdm-spinner').html('<i class="fa fa-spinner fa-spin"></i>');
                                loadMore.addClass('disabled');
                            },
                            type: 'get',
                            url: url + '?action=lcdm_videos&lang=english&page=' + currentPage,
                            success: function (response) {
                                $('.lcdm-spinner').html('');
                                if (response) {
                                    currentPage++;
                                    $('#posts-container').append(response);                                    
                                    loadMore.removeClass('disabled');

                                    // Remove load more button if there is not 3 posts.
                                    if ($(response).find('.span4').length < 3) {
                                        loadMore.remove();
                                    }
                                } else {
                                    loadMore.remove();
                                }
                            }
                        });
                    }

                    $('#load-more').on('click', function (event) {
                        event.preventDefault();
                        loadPosts();
                    }).ready(loadPosts());
                });
            })(jQuery);
        </script>

        <script type="text/javascript">
            (function ($) {
                var videoPlayerSection = $('#video-player-section');
                var videoPlayer = $('#video-player');
                $(document).ready(function () {
                    $('#posts-container').on('click', '.card-video-play', function (event) {
                        event.preventDefault();
                        var href = $(this).attr('href');
                        videoPlayer.attr('src', href);
                        $.scrollTo(videoPlayerSection, 500);
                    });
                });
            })(jQuery);
        </script>
    </body>
</html>