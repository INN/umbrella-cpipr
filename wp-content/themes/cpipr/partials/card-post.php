<div class="span4">
    <div class="card card-inphographic">
        <div class="card-image-top">
            <div class="lcdm-owl-overlay"></div>
            <?php echo the_post_thumbnail('full') ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
            <p class="card-text card-post-date clearfix">
                <?php echo get_the_date(); ?>
                <a href="<?php the_permalink();?>" class="btn btn-white-black pull-right"><?php echo has_tag('english') ? 'READ MORE' : 'LEER MÁS' ?></a>        
            </p>
        </div>
    </div>
</div>