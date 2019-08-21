    <?php
        get_template_part('partials/los-chavos-de-maria/header');
        
        $lcdm_active_menu = 'historias';
        get_template_part('partials/los-chavos-de-maria/es/header');
        get_template_part('partials/los-chavos-de-maria/es/menu');
    ?>

        <!-- Hero Page Title  -->
        <div class="lcdm-hero-page-title-wrapper">
            <div class="lcdm-hero-page-title-overlay">
                <div class="lcdm-hero-page-title-media">
                    <div class="lcdm-hero-page-title-icon">
                        <i class="lcdm-icon lcdm-icon-historias"></i>
                    </div>
                    <div class="lcdm-hero-page-title">
                        <h1>HISTORIAS</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Posts section -->
        <div class="lcdm-section">
            <div class="container-fluid">
                <div id="posts-container"></div>
                <div class="text-center">
                    <div class="lcdm-spinner"></div>
                    <a id="load-more" href="#" class="btn btn-lg btn-black">Cargar Más</a>
                </div>
            </div>
        </div>

        <?php get_template_part('partials/los-chavos-de-maria/es/footer'); ?>

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
                            url: url + '?action=lcdm_historias&page=' + currentPage,
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
    </body>
</html>