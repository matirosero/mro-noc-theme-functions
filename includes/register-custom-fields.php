<?php


add_action( 'cmb2_admin_init', 'mro_noc_register_project_location_metabox' );
/**
 * Project location
 */
function mro_noc_register_project_location_metabox() {
	$prefix = 'noc_project_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'location',
		'title'         => esc_html__( 'Project location', 'mro-cit-cpt' ),
		'object_types'  => array( 'noc_project' ), // Post type
		// 'show_on'      => array(
		// 	'id' => array( 2515 ),
		// ), // Specific post IDs to display this metabox
		// 'show_on_cb' => 'mro_cit_demo_show_if_front_page', // function should return a bool value
		'context'    => 'normal',
		'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'mro_cit_demo_add_some_classes', // Add classes through a callback.
	) );


	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Address', 'mro-cit-cpt' ),
		// 'desc' => esc_html__( 'field description (optional)', 'mro-cit-cpt' ),
		'id'   => $prefix . 'address',
		'type' => 'textarea',
	) );


	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Google Maps location', 'mro-cit-cpt' ),
		'desc' => esc_html__( 'Drag the marker to set the exact location', 'mro-cit-cpt' ),
		'id'   => $prefix . 'map',
		'type' => 'pw_map',
	) );


	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Waze', 'mro-cit-cpt' ),
		'desc' => esc_html__( 'field description (optional)', 'mro-cit-cpt' ),
		'id'   => $prefix . 'waze',
		'type' => 'text_medium',
	) );

}


add_action( 'cmb2_admin_init', 'mro_noc_register_project_contact_metabox' );
/**
 * Project location
 */
function mro_noc_register_project_contact_metabox() {
	$prefix = 'noc_project_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'contact',
		'title'         => esc_html__( 'Project location', 'mro-cit-cpt' ),
		'object_types'  => array( 'noc_project' ), // Post type
		// 'show_on'      => array(
		// 	'id' => array( 2515 ),
		// ), // Specific post IDs to display this metabox
		// 'show_on_cb' => 'mro_cit_demo_show_if_front_page', // function should return a bool value
		'context'    => 'normal',
		'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'mro_cit_demo_add_some_classes', // Add classes through a callback.
	) );


	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Email', 'mro-cit-cpt' ),
		// 'desc' => esc_html__( 'field description (optional)', 'mro-cit-cpt' ),
		'id'   => $prefix . 'email',
		'type' => 'text_email',
		// 'repeatable' => true,
	) );


	$cmb_demo->add_field( array(
		'name' => __( 'Phone number', 'theme-domain' ),
		'desc' => __( 'Numbers only', 'msft-newscenter' ),
		'id'   => $prefix . 'phone',
		'type' => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
	        'escape_cb'       => 'absint',
	) );


	$cmb_demo->add_field( array(
		'name' => __( 'Whatsapp number', 'theme-domain' ),
		'desc' => __( 'Numbers only', 'msft-newscenter' ),
		'id'   => $prefix . 'whatsapp',
		'type' => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
	        'escape_cb'       => 'absint',
	) );


	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Website URL', 'mro-cit-cpt' ),
		// 'desc' => esc_html__( 'field description (optional)', 'mro-cit-cpt' ),
		'id'   => $prefix . 'url',
		'type' => 'text_url',
		// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
		// 'repeatable' => true,
	) );

}