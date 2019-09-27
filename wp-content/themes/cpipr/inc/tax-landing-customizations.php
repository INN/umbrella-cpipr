<?php
/**
 * Functions relating to modifications of Largo's built-in taxonomy landing features.
 *
 * @since Largo 0.5.5.4
 */

/**
 * Add the "Abstract" meta box to the taxonomy landing page
 */

function cpipr_tax_landing_metaboxes() {
	add_meta_box(
		'cftl_tax_landing_abstract',
		__('Abstract', 'cpipr'),
		'cftl_tax_landing_abstract_callback',
		'cftl-tax-landing',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'cpipr_tax_landing_metaboxes', 99 ); //do this late so we can remove other meta boxes

/**
 * The "Abstracts" meta box
 */
function cftl_tax_landing_abstract_callback ( $post ) {
	global $post;
	$values = get_post_custom( $post->ID );
	wp_nonce_field( 'largo_meta_box_nonce', 'meta_box_nonce' );
	?>
	<div class="form-field">
		<h4>Abstract</h4>
		<div>
			<?php
				wp_editor( $values['abstract_body'][0], 'abstract_body', array(
					'wpautop' => false,
					'textarea_rows' => 5,
					'teeny' => true,
				));
			?>
		</div>
	</div>
	<div class="form-field">
	<h4>Abstract video Youtube ID</h4>
		<div>
			<input type="text" name="abstract_video" id="abstract_video" value="<?php if ( isset ( $values['abstract_video'] ) ) { echo $values['abstract_video'][0]; } ?>" />
		</div>
	</div>
	<div class="form-field">
	<h4>Hero background video URL</h4>
		<div>
			<input type="text" name="hero_video" id="hero_video" value="<?php if ( isset ( $values['hero_video'] ) ) { echo $values['hero_video'][0]; } ?>" />
		</div>
	</div>

	<div class="form-field">
		<h4>Hero text color <span class="howto">Hex (RGB)</span></h4>
		<div>
			<input type="text" name="hero_text_color" value="<?php if ( isset ( $values['hero_text_color'] ) ) { echo $values['hero_text_color'][0]; } ?>" />
		</div>
	</div>
	<div class="form-field">
		<h4>Hero background color <span class="howto">Hex (RGB)</span></h4>
		<div>
			<input type="text" name="hero_background_color" value="<?php if ( isset ( $values['hero_background_color'] ) ) { echo $values['hero_background_color'][0]; } ?>" />
		</div>
	</div>

	<?php
}

/**
 * Save the fields for the series abstract
 *
 * @param Int $post_id the post ID
 */
function cftl_tax_landing_save_abstract( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['post_type'] )
		|| $_POST['post_type'] != 'cftl-tax-landing') {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$abstract_fields = array(
		'abstract_video' => 'sanitize_text_field',
		'abstract_body'  => 'wp_filter_post_kses',
		'hero_video'     => 'esc_url',
		'hero_text_color' => 'sanitize_text_field',
		'hero_background_color' => 'sanitize_text_field'
	);

	foreach ($abstract_fields as $field_name => $sanitize ) {
		switch ( $sanitize ) {
			case 'bool':
				$safe_value = ! empty( $_POST[ $field_name ] ) ? true : false;
				break;
			case 'sanitize_show':
				$safe_value = array();
				foreach( array( 'image', 'excerpt', 'byline', 'tags' ) as $key ) {
					$safe_value[ $key ] = ! empty( $_POST[ $field_name ][ $key ] ) ? true : false;
				}
				break;
			default:
				$safe_value = ! empty( $_POST[ $field_name ] ) ? call_user_func( $sanitize, $_POST[ $field_name ] ) : '';
				break;
		}
		update_post_meta( $post_id, $field_name, $safe_value );
	}
}
add_action('save_post', 'cftl_tax_landing_save_abstract');
