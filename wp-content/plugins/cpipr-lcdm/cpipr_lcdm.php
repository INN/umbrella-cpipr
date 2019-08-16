<?php
/*
 * Plugin Name: CPI
 * Description: Plugin that will create cpipr lcdm post types (video, infographics).
 * Version: 1.0
 * Author: Jorge Moreira 
*/

require_once dirname( __FILE__ ) . '/municipios_admin.php';

/* Install municipios table */
function lcdm_install_municipios_db_table () {
    global $wpdb;

    $table_name = $wpdb->prefix . 'municipios';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      municipio varchar(60) NOT NULL,
      tipo_asistencia varchar(60) NULL,
      desastre varchar(80) NULL,
      categoria varchar(80) NULL,
      descripcion_categoria varchar(80) NULL,
      total_obligado varchar(15) NULL,
      fecha_obligacion date NULL,
      total_desembolsado varchar(15) NULL,
      total_pareo_fondos varchar(15) NULL,
      fecha_ultimo_pago date NULL,
      fecha_actualizacion date NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
register_activation_hook( __FILE__, 'lcdm_install_municipios_db_table' );


add_action( 'init', 'create_video_cpt' );

function get_video_cpt_supports() {
    return array('title', 'editor', 'thumbnail', 'excerpt', 'revisions');
}

function create_video_cpt() {
    $labels = array(
        'name'                  => 'Videos',
        'all_items'             => 'All Videos',
        'singular_name'         => 'Video',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Video',
        'edit'                  => 'Edit',
        'edit_item'             => 'Edit Video',
        'new_item'              => 'New Video',
        'view'                  => 'View',
        'view_item'             => 'View Video',
        'search_items'          => 'Search Video',
        'not_found'             => 'No videos found',
        'not_found_in_trash'    => 'No videos found in Trash'
    );

    $args = array(
        'labels'                => $labels,
        'exclude_from_search'   => false,
        'public'                => true,
        'menu_position'         => 5,
        'supports'              => get_video_cpt_supports(),
        'taxonomies'            => array('post_tag'),
        'hierarchical'          => true,
        'menu_icon'             => '',
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-video-alt3'
    );

    register_post_type( 'cpipr_video', $args);
}

add_action( 'init', 'create_infographic_cpt' );

function get_infographic_cpt_supports() {
    return array('title', 'editor', 'thumbnail', 'excerpt', 'revisions');
}

function create_infographic_cpt() {
    $labels = array(
        'name'                  => 'Infographics',
        'all_items'             => 'All Infographics',
        'singular_name'         => 'Infographic',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Infographic',
        'edit'                  => 'Edit',
        'edit_item'             => 'Edit Infographic',
        'new_item'              => 'New Infographic',
        'view'                  => 'View',
        'view_item'             => 'View Infographic',
        'search_items'          => 'Search Infographic',
        'not_found'             => 'No infographics found',
        'not_found_in_trash'    => 'No infographics found in Trash'
    );

    $args = array(
        'labels'                => $labels,
        'exclude_from_search'   => false,
        'public'                => true,
        'menu_position'         => 5,
        'supports'              => get_infographic_cpt_supports(),
        'taxonomies'            => array('post_tag'),
        'hierarchical'          => true,
        'menu_icon'             => '',
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-format-image'
    );

    register_post_type( 'cpipr_infographic', $args);
}

add_action( 'init', 'create_power_players_cpt');

function get_power_player_cpt_supports() {
    return array('title', 'editor', 'thumbnail', 'excerpt', 'revisions');
}

function create_power_players_cpt() {
    $labels = array(
        'name'                  => 'Power Players',
        'all_items'             => 'All Power Players',
        'singular_name'         => 'Power Player',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Power Player',
        'edit'                  => 'Edit',
        'edit_item'             => 'Edit Power Player',
        'new_item'              => 'New Power Player',
        'view'                  => 'View',
        'view_item'             => 'View Power Player',
        'search_items'          => 'Search Power Player',
        'not_found'             => 'No power players found',
        'not_found_in_trash'    => 'No power players found in Trash'
    );

    $args = array(
        'labels'                => $labels,
        'exclude_from_search'   => false,
        'public'                => true,
        'menu_position'         => 5,
        'supports'              => get_power_player_cpt_supports(),
        'taxonomies'            => array('post_tag'),
        'hierarchical'          => true,
        'menu_icon'             => '',
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-groups'
    );

    register_post_type( 'cpipr_power_player', $args);
}

/* Add filter for historias posts */

add_filter('img_caption_shortcode', 'lcdm_caption_shortcode', 20, 3);

function lcdm_caption_shortcode ($text, $atts, $content ) {
    $atts = shortcode_atts( array(
        'id' => '',
        'align' => 'alignnone',
        'width' => '',
        'credit' => '',
        'caption' => '',
    ), $atts );
    $atts = apply_filters( 'navis_image_layout_defaults', $atts );
    extract( $atts );

    if ( $id && ! $credit ) {
        $post_id = str_replace( 'attachment_', '', $id );
        $creditor = navis_get_media_credit( $post_id );
        $credit = ! empty( $creditor ) ? $creditor->to_string() : '';
    }

    if ( $id ) {
        $id = 'id="' . esc_attr($id) . '" ';
    }

    $out = sprintf( '<div %s class="wp-caption module image %s" style="max-width: %spx;"><div class="wp-caption-img-wrap">%s</div>', $id, $align, $width, do_shortcode( $content ) );
    if ( $credit ) {
        $out .= sprintf( '<p class="wp-media-credit">%s</p>', $credit );
    }
    if ( $caption ) {
        $out .= sprintf( '<p class="wp-caption-text">%s</p>', $caption );
    }
    $out .= "</div>";

    if (has_term('los-chavos-de-maria', 'series')) {
        $out = '</div>' . $out . '<div class="container">';
    }    

    return $out;
}



//------------------------------------- Add Ajax Actions ---------------------------------------
// Ensures you can call the functions via AJAX when you want to use them.
// The .nopriv. part indicates that I want to make this function available for non logged-in users
// --------------------------------------------------------------------------------------------


/* Ajax action to get contracts from a puerto rico city */
add_action('wp_ajax_nopriv_pr_cities_contracts', 'ajax_pr_cities_contracts');
add_action('wp_ajax_pr_cities_contracts', 'ajax_pr_cities_contracts');

function ajax_pr_cities_contracts () {
    global $wpdb;

    $municipio = isset($_GET['city']) ? $_GET['city'] : '-1';

    $table_name = $wpdb->prefix . 'municipios';
    $query = $wpdb->prepare('SELECT * FROM ' . $table_name . ' WHERE municipio = %s', $municipio);
    $data = $wpdb->get_results($query);
    wp_send_json( array('data' => $data) );
}

add_action('admin_post_nopriv_export_contracts', 'export_contracts');
add_action('admin_post_export_contracts', 'export_contracts');

function export_contracts () {
    global $wpdb;

    $municipio = isset($_GET['city']) ? $_GET['city'] : '-1';
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'spanish';

    $table_name = $wpdb->prefix . 'municipios';
    $query = $wpdb->prepare('SELECT tipo_asistencia, categoria, total_obligado, total_desembolsado, fecha_ultimo_pago FROM ' . $table_name . ' WHERE municipio = %s', $municipio);
    $data = $wpdb->get_results($query);

    $filename = 'contracts_' . sanitize_title($municipio) . '.csv';

    header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
    header( 'Content-Description: File Transfer' );
    header( 'Content-type: text/csv; charset=utf-8' );
    header( "Content-Disposition: attachment; filename={$filename}" );
    header( 'Expires: 0' );
    header( 'Pragma: public' );
    
    $output_csv = @fopen( 'php://output', 'w' );

    // Put header
    switch ($lang) {
        case 'en':
            $header = array(
                'Type of assistance',
                'Category/program',
                'Total obligated/approved',
                'Total disbursed',
                'Date of last payment'
            );
        break;
        default:
            $header = array(
                'Tipo de asistencia',
                'Categoría/programa',
                'Total obligado/aprobado',
                'Total desembolsado',
                'Fecha del último pago'
            );
        break;
    }
    
    fputcsv( $output_csv, $header );

    // Put data
    foreach ( $data as $item ) {
        $row = array(
            $item->tipo_asistencia,
            $item->categoria,
            $item->total_obligado,
            $item->total_desembolsado,
            $item->fecha_ultimo_pago
        );
        fputcsv( $output_csv, $row );
    }

    fclose($output_csv);
    die();
}

add_action('wp_ajax_nopriv_lcdm_historias', 'ajax_lcdm_historias');
add_action('wp_ajax_lcdm_historias', 'ajax_lcdm_historias');

function ajax_lcdm_historias () {
    $page = isset($_GET['page']) ? $_GET['page'] : '1';
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'spanish';
    $q = isset($_GET['q']) ? $_GET['q'] : '';

    $query_terms = explode(',', $q);

    $conditions = array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'series',
                'field'    => 'slug',
                'terms'    => 'los-chavos-de-maria'
            ),
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => $lang,
            )
        ),
        's' => implode(' ', $query_terms),
        'order' => 'DESC',
        'posts_per_page' => 9,
        'paged' => $page,
        'post_status' => 'publish'
    );

    query_posts($conditions);

    if (have_posts()) {
        $row_count = 1;
        echo '<div class="row-fluid">';
        while(have_posts()) {
            the_post();
            get_template_part('partials/card-post');
            if ($row_count % 3 == 0) echo '</div><div class="row-fluid">';
            $row_count++;
        }
        echo "</div>";
    } else {
        echo "";
    }
    wp_reset_query();
    wp_die();
}

add_action('wp_ajax_nopriv_lcdm_infographics', 'ajax_lcdm_infographics');
add_action('wp_ajax_lcdm_infographics', 'ajax_lcdm_infographics');

function ajax_lcdm_infographics () {
    $page = isset($_GET['page']) ? $_GET['page'] : '1';
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'spanish';

    $conditions = array(
        'post_type' => 'cpipr_infographic',
        'tax_query' => array(
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => $lang,
            )
        ),
        'order' => 'DESC',
        'posts_per_page' => 9,
        'paged' => $page,
        'post_status' => 'publish'
    );

    query_posts($conditions);

    if (have_posts()) {
        $row_count = 1;
        echo '<div class="row-fluid">';
        while(have_posts()) {
            the_post();
            get_template_part('partials/card-post');
            if ($row_count % 3 == 0) echo '</div><div class="row-fluid">';
            $row_count++;
        }
        echo "</div>";
    } else {
        echo "";
    }
    wp_reset_query();
    wp_die();
}

add_action('wp_ajax_nopriv_lcdm_power_players', 'ajax_lcdm_power_players');
add_action('wp_ajax_lcdm_power_players', 'ajax_lcdm_power_players');

function ajax_lcdm_power_players () {
    $page = isset($_GET['page']) ? $_GET['page'] : '1';
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'spanish';

    $conditions = array(
        'post_type' => 'cpipr_power_player',
        'tax_query' => array(
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => $lang,
            )
        ),
        'order' => 'DESC',
        'posts_per_page' => 9,
        'paged' => $page,
        'post_status' => 'publish'
    );

    query_posts($conditions);

    if (have_posts()) {
        $row_count = 1;
        echo '<div class="row-fluid">';
        while(have_posts()) {
            the_post();
            get_template_part('partials/card-post');
            if ($row_count % 3 == 0) echo '</div><div class="row-fluid">';
            $row_count++;
        }
        echo "</div>";
    } else {
        echo "";
    }
    wp_reset_query();
    wp_die();
}

add_action('wp_ajax_nopriv_lcdm_videos', 'ajax_lcdm_videos');
add_action('wp_ajax_lcdm_videos', 'ajax_lcdm_videos');

function ajax_lcdm_videos () {
    $page = isset($_GET['page']) ? $_GET['page'] : '1';
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'spanish';

    $conditions = array(
        'post_type' => 'cpipr_video',
        'tax_query' => array(
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'slug',
                'terms'    => $lang,
            )
        ),
        'order' => 'DESC',
        'posts_per_page' => 9,
        'paged' => $page,
        'post_status' => 'publish'
    );

    query_posts($conditions);

    if (have_posts()) {
        $row_count = 1;
        echo '<div class="row-fluid">';
        while(have_posts()) {
            the_post();
            get_template_part('partials/card-video-post');
            if ($row_count % 3 == 0) echo '</div><div class="row-fluid">';
            $row_count++;
        }
        echo "</div>";
    } else {
        echo "";
    }
    wp_reset_query();
    wp_die();
}
?>