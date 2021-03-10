<?php
/**
 * The Template for displaying all single posts.
 */

$post = $wp_query->post;

if ( in_category( 'educacion' ) ) {

   get_template_part( 'single-educacion-cat' );

} else {
 
    if ( 'classic' == of_get_option( 'single_template' ) ) {
        get_template_part( 'single-two-column' );
    } else {
        get_template_part( 'single-one-column' );
    }

}