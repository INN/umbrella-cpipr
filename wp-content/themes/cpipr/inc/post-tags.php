<?php

if ( ! function_exists( 'lcdm_byline' ) ) {
    function lcdm_byline( $echo = true, $render_biography = false, $lang = 'spanish', $exclude_date = false, $post = null ) {
        // Get the post ID
        if (!empty($post)) {
            if (is_object($post))
                $post_id = $post->ID;
            else if (is_numeric($post))
                $post_id = $post;
        } else {
            $post_id = get_the_ID();
        }

        // Set us up the options
        // This is an array of things to allow us to easily add options in the future
        $options = array(
            'post_id' => $post_id,
            'values' => get_post_custom( $post_id ),
            'exclude_date' => $exclude_date,
            'lang' => $lang,
        );

        if ( function_exists( 'get_coauthors' ) ) {
            // If Co-Authors Plus is enabled and there is not a custom byline
            $byline = $render_biography ? new Lcdm_CoAuthors_Biography_Byline( $options ) : new Lcdm_CoAuthors_Byline( $options );
        } else {
            // no custom byline, no coauthors: let's do the default
            $byline = new Largo_Byline( $options );
        }

        if ( $echo ) {
            echo $byline;
        }
        return $byline;
    }
}
