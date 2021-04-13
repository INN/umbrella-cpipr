jQuery(document).ready(function($) {

    if ($("body").hasClass("category-educacion")) {
 
    /**
     * Init vars
     */
    var page = 1;
    var stopLoad = false;

    /**
     * Renderize coaches with ajax response
     */

    function render_posts(response){
        $(response).appendTo('.postList');
    }

    /**
     * Fetch coaches posts
     * 
     * @param {Object} data - the data received from the html form
     * @param {number} page - the page requested
     * @param {string} event - set the envent type ex: pagination
     * 
    */
   
    function fetch_cpi_posts(data,page,event){
       
        const pagenumber = page ? page : 1;
        const action = 'cpi_get_posts';
        const filter = data ? data : '';
     
           $.ajax({
                url: cpi_status_ajax_obj.ajaxurl,
                type:'POST',
                data:`action=${action}&paged=${pagenumber}&${filter}`,
                success:(response) => {

                    $('.loading').hide();

                    if(response == 0){
                       $('.postList').addClass('noResults');
                       stopLoad = true;
                    }else{
                        render_posts(response);
                    }
                    
                },

                error: (errorThrown) => {
                    console.log(errorThrown);
                }

            }); 
        
      
    }

    /**
     * First Load posts
     */

     fetch_cpi_posts(false, 1);
        
     function scroller(){
        const footerHeight = $('#site-footer').outerHeight();
        //const seriesHeight = $('#series-section').outerHeight();
        const negativeSpace = footerHeight;
        if($(window).scrollTop() + $(window).height() > $(document).height() - negativeSpace) {
                page += 1;
                $('.loading').show();
                let event = 'pagination';
                fetch_cpi_posts(null, page, event);
        }
     }

     var ScrollDebounce = true;
     $(window).on('scroll', function () {
         if (ScrollDebounce) {
                if(!stopLoad){
                ScrollDebounce = false;
                setTimeout(function () { 
                    ScrollDebounce = true;
                    scroller();
                }, 500);
            }  
        }
    });


}
     
}); 




