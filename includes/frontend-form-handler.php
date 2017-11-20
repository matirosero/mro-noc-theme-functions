<?php
/**
 * Handles form submission on save
 *
 * @param  CMB2  $cmb       The CMB2 object
 * @param  array $post_data Array of post-data for new post
 * @return mixed            New post ID if successful
 */
function wds_handle_frontend_new_post_form_submission( $cmb, $post_data = array() ) {

    // If no form submission, bail
	if ( empty( $_POST ) || ! isset( $_POST['submit-cmb'], $_POST['object_id'] ) ) {
		return false;
	}

	// Get CMB2 metabox object
	$cmb = yourprefix_frontend_cmb2_get();
	$post_data = array();



	// Get our shortcode attributes and set them as our initial post_data args
	if ( isset( $_POST['atts'] ) ) {
		foreach ( (array) $_POST['atts'] as $key => $value ) {
			$post_data[ $key ] = sanitize_text_field( $value );
		}
		unset( $_POST['atts'] );
	}
	// Check security nonce
	if ( ! isset( $_POST[ $cmb->nonce() ] ) || ! wp_verify_nonce( $_POST[ $cmb->nonce() ], $cmb->nonce() ) ) {
		return $cmb->prop( 'submission_error', new WP_Error( 'security_fail', __( 'Security check failed.' ) ) );
	}


	// Check title submitted
	if ( empty( $_POST['submitted_post_title'] ) ) {
		return $cmb->prop( 'submission_error', new WP_Error( 'post_data_missing', __( 'New post requires a title.' ) ) );
	}

	// And that the title is not the default title
	if ( $cmb->get_field( 'submitted_post_title' )->default() == $_POST['submitted_post_title'] ) {
		return $cmb->prop( 'submission_error', new WP_Error( 'post_data_missing', __( 'Please enter a new title.' ) ) );
	}





    // Fetch sanitized values
    $sanitized_values = $cmb->get_sanitized_values( $_POST );

    // Set our post data arguments
    $post_data['post_title']   = $sanitized_values['submitted_post_title'];
    unset( $sanitized_values['submitted_post_title'] );
    $post_data['post_content'] = $sanitized_values['submitted_post_content'];
    unset( $sanitized_values['submitted_post_content'] );

    // Create the new post
    $new_submission_id = wp_insert_post( $post_data, true );

	// If we hit a snag, update the user
	if ( is_wp_error( $new_submission_id ) ) {
		return $cmb->prop( 'submission_error', $new_submission_id );
	}

	$cmb->save_fields( $new_submission_id, 'post', $sanitized_values );

    /**
     * Other than post_type and post_status, we want
     * our uploaded attachment post to have the same post-data
     */
    unset( $post_data['post_type'] );
    unset( $post_data['post_status'] );

    // Try to upload the featured image
    $img_id = wds_frontend_form_photo_upload( $new_submission_id, $post_data );

    // If our photo upload was successful, set the featured image
    if ( $img_id && ! is_wp_error( $img_id ) ) {
        set_post_thumbnail( $new_submission_id, $img_id );
    }

	/*
	 * Redirect back to the form page with a query variable with the new post ID.
	 * This will help double-submissions with browser refreshes
	 */
	wp_redirect( esc_url_raw( add_query_arg( 'post_submitted', $new_submission_id ) ) );
	exit;
}
add_action( 'cmb2_after_init', 'wds_handle_frontend_new_post_form_submission' );


/**
 * Handles uploading a file to a WordPress post
 *
 * @param  int   $post_id              Post ID to upload the photo to
 * @param  array $attachment_post_data Attachement post-data array
 */
function wds_frontend_form_photo_upload( $post_id, $attachment_post_data = array() ) {
	// Make sure the right files were submitted
	if (
		empty( $_FILES )
		|| ! isset( $_FILES['submitted_post_thumbnail'] )
		|| isset( $_FILES['submitted_post_thumbnail']['error'] ) && 0 !== $_FILES['submitted_post_thumbnail']['error']
	) {
		return;
	}
	// Filter out empty array values
	$files = array_filter( $_FILES['submitted_post_thumbnail'] );
	// Make sure files were submitted at all
	if ( empty( $files ) ) {
		return;
	}
	// Make sure to include the WordPress media uploader API if it's not (front-end)
	if ( ! function_exists( 'media_handle_upload' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );
	}
	// Upload the file and send back the attachment post ID
	return media_handle_upload( 'submitted_post_thumbnail', $post_id, $attachment_post_data );
}