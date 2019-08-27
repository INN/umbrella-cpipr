<div class="span4">
    <div class="card card-video">
        <div class="card-image-top">
            <?php echo the_post_thumbnail('full') ?>
            <div class="card-image-overlay"></div>
            <a href="<?php echo get_the_content(); ?>" class="card-video-play"></a>
        </div>
        <div class="card-body">
            <h5 class="card-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
            <p class="card-text card-post-date"><?php echo get_the_date(); ?></p>
        </div>
    </div>
</div>