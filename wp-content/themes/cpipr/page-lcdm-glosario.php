<?php
    get_template_part('partials/los-chavos-de-maria/header');
    
    $lcdm_active_menu = 'glosario';
    get_template_part('partials/los-chavos-de-maria/es/header');
    get_template_part('partials/los-chavos-de-maria/es/menu');
?>


    <div class="lcdm-section lcdm-section-glosario">
        <div class="container-fluid">
            <div class="glossary-terms">
                <?php 
                    $html        = '';
                    $alpha_index = $alpha_terms = array();
                    $args  = array(
                        'post_type'      => 'glossary',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'glossary-cat',
                                'field'    => 'slug',
                                'terms'    => 'spanish',
                            )
                        ),
                        'posts_per_page' => -1,
                        'order'          => 'ASC',
                        'orderby'        => 'title',
                    );
                    $terms    = new WP_Query( $args );
                    // $base_url = gl_get_base_url();
                    foreach ( $terms->posts as $post ) {
                        $initial_index = $post->post_title;
                        if ( gl_is_latin( $initial_index ) ) {
                            $initial_index = mb_strtolower( $initial_index );
                        }

                        $initial_index = mb_substr( $initial_index, 0, 1 );
                        // $link          = '#' . $initial_index;
                        // if ( $atts[ 'anchor' ] === 'false' ) {
                        //     $link = add_query_arg( 'az', $initial_index, $base_url );
                        // }

                        $alpha_index[ $initial_index ]              = '<option value="' . $initial_index . '">' . strtoupper($initial_index) . '</option>';
                        $alpha_terms[ $initial_index ][ $post->ID ] = $post->post_title;
                    }

                    $letters = range( 'A', 'Z' );
                    foreach ( $letters as $letter ) {
                        if ( !isset( $alpha_index[ strtolower( $letter ) ] ) ) {
                            $alpha_index[ strtolower( $letter ) ] = '<option value="' . strtolower($letter) . '">' . strtoupper( $letter ) . '</option>';
                        }
                    }

                    if ( extension_loaded( 'intl' ) ) {
                        collator_asort( collator_create( 'root' ), $alpha_index );
                    } else {
                        ksort( $alpha_index );
                        ksort( $alpha_terms );
                    }

                    foreach ( $alpha_terms as $letter => $terms ) {
                        $html .= '<div class="glossary-block glossary-block-' . $letter . '">';
                        $html .= '<span class="glossary-letter" id="' . $letter . '">' . $letter . '</span>';
                        $html .= '<div class="glossary-term">';
                        foreach ( $terms as $id => $title ) {
                            $html  .= '<div class="row-fluid">';
                            // $anchor = $title;
                            // if ( $atts[ 'noanchorterms' ] === 'false' ) {
                            //     $anchor = '<a href="' . get_permalink( $id ) . '">' . $title . '</a>';
                            // }

                            $html .= '<div class="span6">';
                            $html .= '<h2 class="glossary-title">' . $title . '</h2>';
                            $html .= '</div>' . "\n";

                            //$html .= '<span class="glossary-link-item">' . $anchor;
                            // if ( $atts[ 'excerpt' ] === 'true' ) {
                            //     $excerpt = get_the_excerpt( $id );
                            //     if ( !empty( $excerpt ) ) {
                            //         $html .= $separator . '<span class="glossary-list-term-excerpt">' . $excerpt . '</span>';
                            //     }
                            // }

                            $content = get_post_field( 'post_content', $id );
                            $content = apply_filters( 'the_content', $content );
                            $content = str_replace( ']]>', ']]&gt;', $content );
                            if ( !empty( $content ) ) {
                                $html .= '<div class="span6">';
                                $html .= '<div class="glossary-description">' . $content . '</div>' . "\n";
                                $html .= '</div>';
                                // $html .= $separator . '<span class="glossary-list-term-content">' . $content . '</span>';
                            }                        

                            $html .= '</div>' . "\n";
                        }

                        $html .= '</div>' . "\n";
                        $html .= '</div>';
                    }

                    $html .= '</div>';
                ?>

                <div class="glossary-term-bar clearfix">
                    <div class="lcdm-dropdown clearfix">
                        <select class="nice-select">
                            <option value="">Búsqueda según letra</option>
                            <?php echo implode( "\n", $alpha_index ); ?>
                        </select>
                    </div>
                    
                </div>
                <div class="glossary-term-list">
                    <?php echo $html; ?>
                </div>
            </div>
        </div>
    </div>
        

<?php get_template_part('partials/los-chavos-de-maria/footer'); ?>