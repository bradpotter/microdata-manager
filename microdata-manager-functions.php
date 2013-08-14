<?php
/**
 * Functions for Microdata Manager
 *
 * @package    Microdata Manager
 * @author     Brad Potter
 * @copyright  Copyright (c) 2013, Brad Potter
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL-2.0+
 * @link       http://bradpotter.com/plugins/microdata-manager
 * @credit     Based in part on code from the Genesis Framework by StudioPress
 *
 * @since      0.9.0
 */

add_post_type_support( 'post', array( 'microdata-manager' ) );
add_post_type_support( 'page', array( 'microdata-manager' ) );

add_action( 'admin_menu', 'microdata_manager_add_inpost_microdata_box' );
/**
 * Register a new meta box to the post or page edit screen, so that the user can set Microdata options on a per-post or per-page basis.
 * 
 * If the post type does not support microdata-manager, then the Microdata Settings meta box will not be added.
 *
 * @since 0.9.0
 *
 * @see microdata_manager_inpost_microdata_box() Generates the content in the meta box.
 */
function microdata_manager_add_inpost_microdata_box() {

	foreach ( (array) get_post_types( array( 'public' => true ) ) as $type ) {
		if ( post_type_supports( $type, 'microdata-manager' ) )
			add_meta_box( 'microdata_manager_inpost_microdata_box', __( 'Microdata Settings', 'microdata_manager' ), 'microdata_manager_inpost_microdata_box', $type, 'normal', 'high' );
	}

}

/**
 * Callback for in-post Microdata Settings meta box.
 *
 * @since 0.9.0
 *
 * @uses genesis_get_custom_field() Get custom field value.
 */
function microdata_manager_inpost_microdata_box() {

	wp_nonce_field( 'microdata_manager_inpost_microdata_save', 'microdata_manager_inpost_microdata_nonce' );

	$placeholder = 'post' == get_post_type() ? 'http://schema.org/BlogPosting' : 'http://schema.org/CreativeWork'

	?>

	<p><label for="content_itemtype"><b><?php _e( 'Main Content - itemtype', 'microdata' ); ?></b></label><label><?php _e( ' (Used on post only)', 'microdata_manager' ); ?></label></p>
	<p><input class="large-text" type="text" name="microdata_manager[_content_itemtype]" id="content_itemtype" placeholder="http://schema.org/Blog" value="<?php echo esc_attr( genesis_get_custom_field( '_content_itemtype' ) ); ?>" /></p>

	<p><label for="entry_itemtype"><b><?php _e( 'Entry - itemtype', 'microdata' ); ?></b></label><label><?php _e( ' (Used on page and post)', 'microdata_manager' ); ?></label></p>
	<p><input class="large-text" type="text" name="microdata_manager[_entry_itemtype]" id="entry_itemtype" placeholder="<?php echo $placeholder; ?>" value="<?php echo esc_attr( genesis_get_custom_field( '_entry_itemtype' ) ); ?>" /></p>

	<p><label for="entry_itemprop"><b><?php _e( 'Entry - itemprop', 'microdata' ); ?></b></label><label><?php _e( ' (Used on post only)', 'microdata_manager' ); ?></label></p>
	<p><input class="large-text" type="text" name="microdata_manager[_entry_itemprop]" id="entry_itemprop" placeholder="blogPost" value="<?php echo esc_attr( genesis_get_custom_field( '_entry_itemprop' ) ); ?>" /></p>

	<p><label for="entry_title_itemprop"><b><?php _e( 'Entry Title - itemprop', 'microdata' ); ?></b></label><label><?php _e( ' (Used on page and post)', 'microdata_manager' ); ?></label></p>
	<p><input class="large-text" type="text" name="microdata_manager[_entry_title_itemprop]" id="entry_title_itemprop" placeholder="headline" value="<?php echo esc_attr( genesis_get_custom_field( '_entry_title_itemprop' ) ); ?>" /></p>

	<p><label for="entry_content_itemprop"><b><?php _e( 'Entry Content - itemprop', 'microdata' ); ?></b></label><label><?php _e( ' (Used on page and post)', 'microdata_manager' ); ?></label></p>
	<p><input class="large-text" type="text" name="microdata_manager[_entry_content_itemprop]" id="entry_content_itemprop" placeholder="text" value="<?php echo esc_attr( genesis_get_custom_field( '_entry_content_itemprop' ) ); ?>" /></p>

	<label><?php _e( 'Enter something to override the default settings displayed within the fields. Visit <a href="http://www.schema.org/" target="_blank">schema.org</a> for details.', 'microdata_manager' ); ?></label>

	<?php
}

add_action( 'save_post', 'microdata_manager_inpost_microdata_save', 1, 2 );
/**
 * Save the Schema settings when we save a post or page.
 *
 * Some values get sanitized, the rest are pulled from identically named subkeys in the $_POST['microdata_manager'] array.
 *
 * @since 0.9.0
 *
 * @uses genesis_save_custom_fields() Perform checks and saves post meta / custom field data to a post or page.
 *
 * @param integer  $post_id Post ID.
 * @param stdClass $post    Post object.
 *
 * @return mixed Returns post id if permissions incorrect, null if doing autosave, ajax or future post, false if update or delete failed, and true on success.
 */
function microdata_manager_inpost_microdata_save( $post_id, $post ) {

	if ( ! isset( $_POST['microdata_manager'] ) )
		return;

	//* Merge user submitted options with fallback defaults
	$data = wp_parse_args( $_POST['microdata_manager'], array(
		'_content_itemtype' => '',
		'_entry_itemtype' => '',
		'_entry_itemprop' => '',
		'_entry_title_itemprop' => '',
		'_entry_content_itemprop' => '',
	) );

	//* Sanitize the title, description, and tags
	foreach ( (array) $data as $key => $value ) {
		if ( in_array( $key, array( '_content_itemtype', '_entry_itemtype', '_entry_itemprop', '_entry_title_itemprop', '_entry_content_itemprop' ) ) )
			$data[ $key ] = strip_tags( $value );
	}

	genesis_save_custom_fields( $data, 'microdata_manager_inpost_microdata_save', 'microdata_manager_inpost_microdata_nonce', $post, $post_id );

}

add_filter( 'genesis_attr_content', 'microdata_manager_attributes_content' );
/**
 * Add attributes for main content element.
 *
 * @since 0.9.0
 *
 * @return array Amended attributes.
 */
function microdata_manager_attributes_content( $attributes ) {

	$attributes['role']     = 'main';
	$attributes['itemprop'] = 'mainContentOfPage';
	$c_it_microdata = esc_attr( genesis_get_custom_field( '_content_itemtype' ) );

	//* Blog microdata
	if ( is_singular( 'post' ) || is_archive() || is_home() || is_page_template( 'page_blog.php' ) ) {
		$attributes['itemscope'] = 'itemscope';
		$attributes['itemtype']  = 'http://schema.org/Blog';
	}

	if ( is_singular( 'post' ) && $c_it_microdata || is_archive() && $c_it_microdata || is_home() && $c_it_microdata || is_page_template( 'page_blog.php' ) && $c_it_microdata ) {
		$attributes['itemscope'] = 'itemscope';
		$attributes['itemtype']  = $c_it_microdata;
	}

	//* Search results pages
	if ( is_search() ) {
		$attributes['itemscope'] = 'itemscope';
		$attributes['itemtype'] = 'http://schema.org/SearchResultsPage';
	}

	return $attributes;

}

add_filter( 'genesis_attr_entry', 'microdata_manager_attributes_entry' );
/**
 * Add attributes for entry element.
 *
 * @since 0.9.0
 *
 * @return array Amended attributes.
 */
function microdata_manager_attributes_entry( $attributes ) {

	global $post;

	$attributes['class']     = join( ' ', get_post_class() );
	$attributes['itemscope'] = 'itemscope';
	$attributes['itemtype']  = 'http://schema.org/CreativeWork';
	$e_it_microdata = esc_attr( genesis_get_custom_field( '_entry_itemtype' ) );
	$e_ip_microdata = esc_attr( genesis_get_custom_field( '_entry_itemprop' ) );
	$mytypes = 'test';

	if ( 'post' == $post->post_type ) {
		$attributes['itemtype']  = 'http://schema.org/BlogPosting';

		if ( is_main_query() )
			$attributes['itemprop']  = 'blogPost';

		if ( is_main_query() && $e_ip_microdata )
			$attributes['itemprop']  = $e_ip_microdata;

	} if ( 'post' == $post->post_type && $e_it_microdata ) {
		$attributes['itemtype']  = $e_it_microdata;

	} if ( is_page() && $e_it_microdata ) {
		$attributes['itemtype']  = $e_it_microdata;
	
	} if ( $mytypes == $post->post_type && $e_it_microdata ) {
		$attributes['itemtype']  = $e_it_microdata;

	}

	return $attributes;

}

add_filter( 'genesis_attr_entry-title', 'microdata_manager_attributes_entry_title' );
/**
 * Add attributes for entry title element.
 *
 * @since 0.9.0
 *
 * @return array Amended attributes.
 */
function microdata_manager_attributes_entry_title( $attributes ) {

	$et_ip_microdata = esc_attr( genesis_get_custom_field( '_entry_title_itemprop' ) );
	
	if ( $et_ip_microdata ) {
		$attributes['itemprop'] = $et_ip_microdata;

	} else {
		$attributes['itemprop'] = 'headline';

	}

	return $attributes;

}

add_filter( 'genesis_attr_entry-content', 'microdata_manager_attributes_entry_content' );
/**
 * Add attributes for entry content element.
 *
 * @since 0.9.0
 *
 * @return array Amended attributes.
 */
function microdata_manager_attributes_entry_content( $attributes ) {

	global $post;

	$ec_ip_microdata = esc_attr( genesis_get_custom_field( '_entry_content_itemprop' ) );
	
	if ( $ec_ip_microdata ) {
		$attributes['itemprop'] = $ec_ip_microdata;

	} else {
		$attributes['itemprop'] = 'text';

	}

	return $attributes;

}
