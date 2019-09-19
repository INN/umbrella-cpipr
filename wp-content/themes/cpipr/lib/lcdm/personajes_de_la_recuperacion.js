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
                url: WP_ADMIN_AJAX_URL + '?action=lcdm_power_players&lang=' + LCDM_LANG + '&page=' + currentPage,
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