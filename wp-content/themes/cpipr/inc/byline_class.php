<?php

require_once(__DIR__ . '/../../largo/inc/byline_class.php');

class Lcdm_CoAuthors_Byline extends Largo_Byline {
    /**
     * Temporary variable used to contain the coauthor being rendered by the loop inside generate_byline();
     * @see $this->generate_byline();
     */
    protected $author;

    /**
     * Temporary variable used for the author ID;
     * This must be public, because Largo_CoAuthors_Byline's methods incorporate methods from Largo_Byline, and parent classes cannot see private or protected members of extending classes.
     * @see $this->generate_byline();
     */
    public $author_id;

    function populate_variables( $args ) {
        parent::populate_variables($args);
        $this->lang = $args['lang'];
    }

    function generate_byline() {
        // get the coauthors for this post
        $coauthors = get_coauthors( $this->post_id );
        $out = array();
        // loop over them
        foreach( $coauthors as $author ) {
            $this->author_id = $author->ID;
            $this->author = $author;

            ob_start();

            $this->avatar();
            $this->author_link();

            $byline_temp = '<li style="display: flex;justify-content: flex-start;align-items: center;">' . ob_get_clean() . '</li>';

            // array of byline html strings
            $out[] = $byline_temp;
        }

        $authors = implode('', $out);

        // Now assemble the One True Byline
        ob_start();
        $by = $this->lang == 'spanish' ? 'Por' : 'By';


        echo '<ul style="display: flex; margin-left: 0;"><div class="journalists-byline" style="margin-top: 12px;margin-right: 10px;"><li class="by"><em>' . $by . '</em></li></div><div class="journalists-byline" style="display: flex;flex-flow: column;">' . $authors . '</div>';
        echo '</ul>';

        $this->output = ob_get_clean();
    }

    /**
     * A coauthors avatar
     */    
    function avatar() {
        // $output = get_avatar( $this->author_id, 68, '', get_the_author_meta( 'display_name', $this->author_id ), array('class' => 'journalist-avatar') );
        $avatar = largo_get_avatar_src( $this->author_id, 68, '', get_the_author_meta( 'display_name', $this->author_id ) );
        $output = '<div style="background-image:url(' . $avatar[0] . ');height: 50px;width: 50px;border-radius: 50%;background-size: cover;border: 2px solid #5170ae;"></div>';
        echo $output;
    }

   

    /**
     * A coauthors-specific byline link method
     */
    function author_link() {
        $author_name = ( ! empty($this->author->display_name) ) ? $this->author->display_name : $this->author->user_nicename ;

        $output = '<a class="journalist-name" href="' . get_author_posts_url( $this->author->ID, $this->author->user_nicename ) . '" title="' . esc_attr( sprintf( __( 'Read All Posts By %s', 'largo' ), $author_name ) ) . '" rel="author">' . esc_html( $author_name ) . '</a>';
        echo $output;
    }

    /**
     * A wrapper around largo_time to determine when the post was published
     */
    function published_date() {
        echo sprintf(
            '<li class="post-date"><time class="entry-date updated dtstamp pubdate" datetime="%1$s">%2$s</time></li>',
            esc_attr( get_the_date( 'c', $this->post_id ) ),
            largo_time( false, $this->post_id )
        );
    }
}


class Lcdm_CoAuthors_Biography_Byline extends Largo_Byline {
    
    function populate_variables( $args ) {
        parent::populate_variables($args);
        $this->lang = $args['lang'];
    }

    function generate_byline() {
        get_defined_vars();
        // get the coauthors for this post
        $coauthors = get_coauthors( $this->post_id );
        $out = array();
        // loop over them
        foreach( $coauthors as $author ) {
            $this->author_id = $author->ID;
            $this->author = $author;

            ob_start();

            $this->avatar();
            $this->author_detail();

            $byline_temp = '<div class="row-fluid">' . ob_get_clean() . '</div>';

            // array of byline html strings
            $out[] = $byline_temp;
        }

        $authors = implode('', $out);
        $byline_header = '';
        $lang = $this->lang;
   
        if ($lang == "spanish") {
            
            if ( count($coauthors) > 1) {
                $byline_header = '<h3>Biografías de los Periodistas</h3>';
            } else {
                $byline_header = '<h3>Biografía del Periodista</h3>';
            }
        } else {
            if ( count($coauthors) > 1) {
                $byline_header = "<h3>Journalists' Biographies</h3>";
            } else {
                $byline_header = "<h3>Journalist's Biography</h3>";
            } 
        }

        // Now assemble the One True Byline
        ob_start();
       
        echo $byline_header . '<div>' . $authors . '</div>'; 
        $this->output = ob_get_clean();
    }

    /**
     * A coauthors avatar
     */        
    function avatar() {
        $avatar = largo_get_avatar_src( $this->author_id, 500, '', get_the_author_meta( 'display_name', $this->author_id ) );
        $output = '<div class="span4" style="display:flex;justify-content:center"><div class="lcdm-journalist-picture" style="background-image:url(' . $avatar[0] . ');height: 220px;width: 220px;border-radius: 50%;background-size: cover;border: 6px solid #5170ae;margin-top: 20px;"></div></div>';
        echo $output;
    }

    /**
     * A coauthors-specific byline link method
     */
    function author_link() {
        $author_name = ( ! empty($this->author->display_name) ) ? $this->author->display_name : $this->author->user_nicename ;

        $output = '<h4><a class="journalist-name" href="' . get_author_posts_url( $this->author->ID, $this->author->user_nicename ) . '" title="' . esc_attr( sprintf( __( 'Read All Posts By %s', 'largo' ), $author_name ) ) . '" rel="author">' . esc_html( $author_name ) . '</a></h4>';
        return $output;
    } 

    function author_detail() {
        $author_link = $this->author_link();
        $author_biography = '<p>' . get_the_author_meta('description', $this->author_id) . '</p>';
        $output = '<div class="span8"><div class="lcdm-journalist-personal-info">' . $author_link . $author_biography . '</div></div>';
        echo $output;
    }
}
