<?php
    get_template_part('partials/los-chavos-de-maria/header');
    get_template_part('partials/los-chavos-de-maria/es/header');
?>

    <!-- Main slider -->
    <div>
        <div class="owl-hero-carousel">
            <div id="top-hero-carousel" class="owl-carousel owl-theme">
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
                                'terms'    => 'news',
                            ),
                            array(
                                'taxonomy' => 'post_tag',
                                'field'    => 'slug',
                                'terms'    => 'spanish',
                            )
                        ),
                        'order' => 'DESC',
                        'posts_per_page' => 5,
                        'post_status' => 'publish'
                    );
                    $chavos_category = get_category_by_slug('los-chavos-de-maria');
                    $chavos_query = new WP_Query($args);
                    $has_history_posts = $chavos_query->have_posts();
                    while ($chavos_query->have_posts()) {
                        $chavos_query->the_post();
                ?>
                <div class="owl-hero-item" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')">
                    <!-- <div class="lcdm-owl-overlay"></div> -->
                    <div class="owl-hero-caption">
                        <div class="container-fluid">
                            <div class="owl-hero-post">
                                <div class="row-fluid">
                                    <div class="span6">
                                        <h2 class="owl-hero-post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } wp_reset_postdata();?>
            </div>
            <?php if ($has_history_posts): ?>
            <div id="main-hero-controls" class="owl-carousel owl-loaded owl-theme owl-hero-controls owl-default-controls owl-inline-controls">
                <div class="container-fluid">
                    <div class="owl-controls">
                        <div class="owl-nav owl-nav-lcdm"></div>
                        <div class="owl-dots"></div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_permalink( get_page_by_path( 'lcdm-historias' ) ) ?>" class="btn btn-white-blue">Ver Todo</a>
                </div>
            </div>                
            <?php endif; ?>
        </div>
    </div>

    <?php $lcdm_navbar_theme = 'dark'; ?>
    <?php get_template_part('partials/los-chavos-de-maria/es/menu'); ?>

    <!-- Power players section -->
    <div class="lcdm-section lcdm-section-powerplayers">
        <div class="lcdm-section-title">
            <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-personajes-de-la-recuperacion' ) ) ?>">
                <i class="lcdm-icon lcdm-icon-personajes"></i>
                <div>PERSONAJES DE LA<br/>RECUPERACIÓN</div>
            </a>
        </div>

        <div class="owl-hero-carousel">
            <div id="power-players-hero-carousel" class="owl-carousel owl-theme">
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
                                    'terms'    => 'powerplayer',
                                ),
                                array(
                                    'taxonomy' => 'post_tag',
                                    'field'    => 'slug',
                                    'terms'    => 'featured',
                                ),
                                array(
                                    'taxonomy' => 'post_tag',
                                    'field'    => 'slug',
                                    'terms'    => 'spanish',
                                )
                            ),
                            'order' => 'DESC',
                            'posts_per_page' => 5,
                            'post_status' => 'publish'
                        );
                        $chavos_query = new WP_Query($args);
                        $has_graficas_posts = $chavos_query->have_posts();
                        while ($chavos_query->have_posts()) {
                            $chavos_query->the_post();
                    ?>
                    <a href="<?php the_permalink();?>">
                        <div class="owl-hero-item lcdm-secondary-slide" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')"></div>
                    </a>
                </div>
                <?php } wp_reset_postdata();?>
            </div>
            <?php if ($has_powerplayers_posts): ?>
            <div id="power-player-controls" class="owl-carousel owl-loaded owl-theme owl-hero-controls owl-default-controls owl-inline-controls">
                <div class="container-fluid">
                    <div class="owl-controls">
                        <div class="owl-nav owl-nav-lcdm"></div>
                        <div class="owl-dots"></div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_permalink( get_page_by_path( 'lcdm-personajes-de-la-recuperacion' ) ) ?>" class="btn btn-white-blue">Ver Todo</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Mapa de la recuepracion section -->
    <div class="lcdm-section lcdm-section-map">
        <div class="lcdm-section-title">
            <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-mapas-de-la-recuperacion' ) ) ?>">
                <i class="lcdm-icon lcdm-icon-mapa"></i>
                <div>MAPA DE LA<br/>RECUPERACIÓN</div>
            </a>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2"></div>
                <div class="span8">
                    <div class="recovery-map">
                        <div class="lcdm-dropdown clearfix">
                            <select class="nice-select">
                                <option value="Adjuntas">Adjuntas</option>
                                <option value="Aguada">Aguada</option>
                                <option value="Aguadilla">Aguadilla</option>
                                <option value="Aguas Buenas">Aguas Buenas</option>
                                <option value="Aibonito">Aibonito</option>
                                <option value="Arecibo">Arecibo</option>
                                <option value="Arroyo">Arroyo</option>
                                <option value="Añasco">Añasco</option>
                                <option value="Barceloneta">Barceloneta</option>
                                <option value="Barranquitas">Barranquitas</option>
                                <option value="Bayamón">Bayamón</option>
                                <option value="Cabo Rojo">Cabo Rojo</option>
                                <option value="Caguas">Caguas</option>
                                <option value="Camuy">Camuy</option>
                                <option value="Canóvanas">Canóvanas</option>
                                <option value="Carolina">Carolina</option>
                                <option value="Cataño">Cataño</option>
                                <option value="Cayey">Cayey</option>
                                <option value="Ceiba">Ceiba</option>
                                <option value="Ciales">Ciales</option>
                                <option value="Cidra">Cidra</option>
                                <option value="Coamo">Coamo</option>
                                <option value="Comerío">Comerío</option>
                                <option value="Corozal">Corozal</option>
                                <option value="Culebra">Culebra</option>
                                <option value="Dorado">Dorado</option>
                                <option value="Fajardo">Fajardo</option>
                                <option value="Florida">Florida</option>
                                <option value="Guayama">Guayama</option>
                                <option value="Guayanilla">Guayanilla</option>
                                <option value="Guaynabo">Guaynabo</option>
                                <option value="Gurabo">Gurabo</option>
                                <option value="Guánica">Guánica</option>
                                <option value="Hatillo">Hatillo</option>
                                <option value="Hormigueros">Hormigueros</option>
                                <option value="Humacao">Humacao</option>
                                <option value="Isabela">Isabela</option>
                                <option value="Jayuya">Jayuya</option>
                                <option value="Juana Díaz">Juana Díaz</option>
                                <option value="Juncos">Juncos</option>
                                <option value="Lajas">Lajas</option>
                                <option value="Lares">Lares</option>
                                <option value="Las Marías">Las Marías</option>
                                <option value="Las Piedras">Las Piedras</option>
                                <option value="Loíza">Loíza</option>
                                <option value="Luquillo">Luquillo</option>
                                <option value="Manatí">Manatí</option>
                                <option value="Maricao">Maricao</option>
                                <option value="Maunabo">Maunabo</option>
                                <option value="Mayagüez">Mayagüez</option>
                                <option value="Moca">Moca</option>
                                <option value="Morovis">Morovis</option>
                                <option value="Naguabo">Naguabo</option>
                                <option value="Naranjito">Naranjito</option>
                                <option value="Orocovis">Orocovis</option>
                                <option value="Patillas">Patillas</option>
                                <option value="Peñuelas">Peñuelas</option>
                                <option value="Ponce">Ponce</option>
                                <option value="Quebradillas">Quebradillas</option>
                                <option value="Rincón">Rincón</option>
                                <option value="Río Grande">Río Grande</option>
                                <option value="Sabana Grande">Sabana Grande</option>
                                <option value="Salinas">Salinas</option>
                                <option value="San Germán">San Germán</option>
                                <option value="San Juan" selected>San Juan</option>
                                <option value="San Lorenzo">San Lorenzo</option>
                                <option value="San Sebastián">San Sebastián</option>
                                <option value="Santa Isabel">Santa Isabel</option>
                                <option value="Toa Alta">Toa Alta</option>
                                <option value="Toa Baja">Toa Baja</option>
                                <option value="Trujillo Alto">Trujillo Alto</option>
                                <option value="Utuado">Utuado</option>
                                <option value="Vega Alta">Vega Alta</option>
                                <option value="Vega Baja">Vega Baja</option>
                                <option value="Vieques">Vieques</option>
                                <option value="Villalba">Villalba</option>
                                <option value="Yabucoa">Yabucoa</option>
                                <option value="Yauco">Yauco</option>
                            </select>
                        </div>
                        <div id="jsmap-puertorico" class="jsmaps-wrapper"></div>
                        <div id="jsmap-description" class="jsmaps-table-wrapper"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Infografias section -->
    <div class="lcdm-section lcdm-section-graficas">
        <div class="lcdm-section-title">
            <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-graficas' ) ) ?>">
                <i class="lcdm-icon lcdm-icon-graficas"></i>
                <div>GRÁFICAS</div>
            </a>
        </div>

        <div class="container-fluid">
            <br/>
            <br/>
            <br/>
            <div class="owl-hero-carousel">
                <div id="inphographic-hero-carousel" class="owl-carousel owl-theme">
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
                                    'terms'    => 'graphic',
                                ),
                                array(
                                    'taxonomy' => 'post_tag',
                                    'field'    => 'slug',
                                    'terms'    => 'featured',
                                ),
                                array(
                                    'taxonomy' => 'post_tag',
                                    'field'    => 'slug',
                                    'terms'    => 'spanish',
                                )
                            ),
                            'order' => 'DESC',
                            'posts_per_page' => 5,
                            'post_status' => 'publish'
                        );
                        $chavos_query = new WP_Query($args);
                        $has_graficas_posts = $chavos_query->have_posts();
                        while ($chavos_query->have_posts()) {
                            $chavos_query->the_post();
                    ?>
                    <a href="<?php the_permalink();?>">
                        <div class="owl-hero-item lcdm-secondary-slide" style="background-image: url('<?php the_post_thumbnail_url('full'); ?>')"></div>
                    </a>
                    <?php } wp_reset_postdata();?>
                </div>
            </div>
            <?php if ($has_graficas_posts): ?>
            <div id="inphographic-controls" class="owl-carousel owl-loaded owl-theme owl-theme-blue owl-default-controls owl-inline-controls">
                <div class="owl-controls">
                    <div class="owl-nav owl-nav-lcdm"></div>
                    <div class="owl-dots"></div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_permalink( get_page_by_path( 'lcdm-graficas' ) ) ?>" class="btn btn-blue">Ver más</a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Video slider -->
    <div class="lcdm-section lcdm-section-videos">
        <div class="lcdm-section-title">
            <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-videos' ) ) ?>">
                <i class="lcdm-icon lcdm-icon-videos"></i>
                <div>VIDEOS</div>
            </a>
        </div>

        <div class="owl-hero-carousel">
            <div id="video-hero-carousel" class="owl-carousel owl-theme">
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
                                'terms'    => 'featured',
                            ),
                            array(
                                'taxonomy' => 'post_tag',
                                'field'    => 'slug',
                                'terms'    => 'spanish',
                            )
                        ),
                        'order' => 'DESC',
                        'posts_per_page' => 5,
                    );
                    $chavos_query = new WP_Query($args);
                    $has_video_posts = $chavos_query->have_posts();
                    while ($chavos_query->have_posts()) {
                        $chavos_query->the_post();
                ?>
                <div class="owl-hero-item" style="background-image: url('<?php echo the_post_thumbnail_url('full') ?>')">
                    <!-- <div class="lcdm-owl-overlay"></div> -->
                    <div class="owl-hero-caption">
                        <div class="container-fluid">
                            <div class="owl-hero-post owl-hero-video-post">
                                <a data-fancybox href="<?php echo get_the_content(); ?>" class="owl-play-icon"></a>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <h2 class="owl-hero-post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } wp_reset_postdata();?>
            </div>
            <?php if ($has_video_posts): ?>
            <div id="video-hero-controls" class="owl-carousel owl-loaded owl-theme owl-hero-controls owl-default-controls owl-inline-controls">
                <div class="container-fluid">
                    <div class="owl-controls">
                        <div class="owl-nav owl-nav-lcdm"></div>
                        <div class="owl-dots"></div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo get_permalink( get_page_by_path( 'lcdm-videos' ) ) ?>" class="btn btn-white-blue">Ver Todo</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Ingegration Documentos section -->
    <div class="lcdm-section lcdm-section-documentos">
        <div class="lcdm-section-title">
            <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-documentos' ) ) ?>">
                <i class="lcdm-icon lcdm-icon-documentos"></i>
                <div>DOCUMENTOS</div> 
            </a>               
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2"></div>
                <div class="span8">
                    <div id="DC-search-projectid-45731-los-chavos-de-mar-a" class="DC-embed DC-embed-search DC-search-container"></div>
                    <script src="//assets.documentcloud.org/embed/loader.js"></script>
                    <script>
                    dc.embed.load('https://www.documentcloud.org/search/embed/', {
                        q: "projectid: \"45731-Los-chavos-de-María\"",
                        container: "#DC-search-projectid-45731-los-chavos-de-mar-a",
                        title: "",
                        order: "title",
                        per_page: 12,
                        search_bar: true,
                        organization: 2426
                    });
                    </script>
                    <noscript>
                    <a href="https://www.documentcloud.org/public/search/projectid%3A%20%5C%2245731-Los-chavos-de-Mar%C3%ADa%5C%22">View/search document collection</a>
                    </noscript>
                </div>
            </div>
        </div>
    </div>


    <!-- Twitter feed -->
    <div id="help-us-section" class="lcdm-section lcdm-section-twitter">
        <div class="lcdm-section-title">
            <i class="lcdm-icon lcdm-icon-help"></i>
            <div>AYÚDANOS A<br/>FISCALIZAR</div>
        </div>
        <div class="container-fluid">
            <br/>
            <div class="lcdm-twitter-feed-wrapper">
                <div class="lcdm-twitter-feed">
                    <div class="lcdm-hashtag">#LOSCHAVOSDEMARÍA</div>
                    <div class="lcdm-twitter-box">
                        <div></div>
                    </div>
                </div>
                <div class="lcdm-twitter-feed-body">
                    <div class="lcdm-twitter-feed-body-border">
                        <div class="lcdm-twitter-form-info">
                            <div class="lcdm-twitter-box">
                                <h2>¿SABES DE ALGÚN MAL MANEJO DE FONDOS DE RECUPERACIÓN?</h2>
                                <br/>
                                <br/>
                                <h2 class="text-black">CUÉNTANOS.</h2>
                            </div>
                            <div class="lcdm-twitter-feed-info-box">
                                <a id="btnSendInfo" href="https://docs.google.com/forms/d/1CIdhT4fn3uZ5nNCiR3z03K2yKkByR5eymRQqyq_Zcjg/viewform" target="_blank" class="btn btn-white-blue btn-lg">ENVIAR INFO</a>
                            </div>    
                        </div>
                        <div class="lcdm-twitter-form collapse">
                            <div class="lcdm-tell-us-wrapper">
                                <h2>CUÉNTANOS</h2>
                                <form>
                                    <div class="form-group with-checkbox">
                                        <input type="text" name="" class="form-control input-lg" placeholder="NOMBRE"/>
                                        <label class="checkbox">
                                            <input type="checkbox" name=""/> ANÓNIMO
                                        </label>
                                    </div>
                                    <div class="form-group with-checkbox">
                                        <input type="email" name="" class="form-control input-lg" placeholder="EMAIL"/>    
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="8" placeholder="INFORMACIÓN"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-blue btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENVIAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_template_part('partials/los-chavos-de-maria/footer'); ?>