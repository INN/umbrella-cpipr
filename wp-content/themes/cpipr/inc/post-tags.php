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

if ( ! function_exists( 'lcdm_the_date' ) ) {
    function lcdm_the_date($echo=true, $lang='es') {
        $locale = array(
            'en_US' => array(
                'months' => array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')
            ),
            'es_ES' => array(
                'months' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre')
            )
        );

        $day = get_the_date('d');
        $month = get_the_date('F');
        $year = get_the_date('Y');

        switch ($lang) {
            case 'es':
                $month = $locale['es_ES']['months'][get_the_date('n') - 1];
            break;
        }

        if ( $echo ) {
            echo $day . ' ' . $month . ' ' . $year;
        }
        return $day . ' ' . $month . ' ' . $year;
    }
}
