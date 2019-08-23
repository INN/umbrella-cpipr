(function ($) {
    $(document).ready(function () {
        var currentPage = 1;
        function loadPosts() {
            var loadMore = $('#load-more');
            $.ajax({
                beforeSend: function (qXHR) {
                    $('.lcdm-spinner').html('<i class="fa fa-spinner fa-spin"></i>');
                    loadMore.addClass('disabled');
                },
                type: 'get',
                url: WP_ADMIN_AJAX_URL + '?action=lcdm_videos&lang=' + LCDM_LANG + '&page=' + currentPage,
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