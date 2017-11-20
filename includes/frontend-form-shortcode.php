<?php

/**
 * Handle the cmb-frontend-form shortcode
 *
 * @param  array  $atts Array of shortcode attributes
 * @return string       Form html
 */
function wds_do_frontend_form_submission_shortcode( $atts = array() ) {



    // Use ID of metabox in wds_frontend_form_register
    $metabox_id = 'front-end-post-form';

    // since post ID will not exist yet, just need to pass it something
    $object_id  = 'fake-oject-id';

    // Get CMB2 metabox object
    $cmb = cmb2_get_metabox( $metabox_id, $object_id );


    // Get $cmb object_types
    $post_types = $cmb->prop( 'object_types' );

    // Current user
    $user_id = get_current_user_id();



    // Parse attributes. These shortcode attributes can be optionally overridden.
    $atts = shortcode_atts( array(
        'post_author' => $user_id ? $user_id : 1, // Current user, or admin
        'post_status' => 'pending',
        // 'post_type'   => reset( $post_types ), // Only use first object_type in array
        'post_type'   => 'noc_project',
    ), $atts, 'cmb-frontend-form' );


	/*
	 * Let's add these attributes as hidden fields to our cmb form
	 * so that they will be passed through to our form submission
	 */
	foreach ( $atts as $key => $value ) {
		$cmb->add_hidden_field( array(
			'field_args'  => array(
				'id'    => "atts[$key]",
				'type'  => 'hidden',
				'default' => $value,
			),
		) );
	}



    // Initiate our output variable
    $output = '';



	// Get any submission errors
	if ( ( $error = $cmb->prop( 'submission_error' ) ) && is_wp_error( $error ) ) {
		// If there was an error with the submission, add it to our ouput.
		$output .= '<h3>' . sprintf( __( 'There was an error in the submission: %s', 'YOURTEXTDOMAIN' ), '<strong>'. $error->get_error_message() .'</strong>' ) . '</h3>';
	}


    // If the post was submitted successfully, notify the user.
	if ( isset( $_GET['post_submitted'] ) && ( $post = get_post( absint( $_GET['post_submitted'] ) ) ) ) {
		// Get submitter's name
		// $name = get_post_meta( $post->ID, 'submitted_author_name', 1 );
		// $name = $name ? ' '. $name : '';
		// Add notice of submission to our output
		$output .= '<h3>' . sprintf( __( 'Thank you, your new post has been submitted and is pending review by a site administrator.', 'YOURTEXTDOMAIN' ) ) . '</h3>';
	}



    // Get our form
    $output .= cmb2_get_metabox_form( $cmb, $object_id, array( 'save_button' => __( 'Enviar información', 'wds-post-submit' ) ) );


    return $output;
}
add_shortcode( 'cmb-frontend-form', 'wds_do_frontend_form_submission_shortcode' );