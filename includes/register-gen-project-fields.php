<?php


add_action( 'cmb2_init', 'mro_noc_register_project_contact_metabox' );
/**
 * Project contact information
 */
function mro_noc_register_project_contact_metabox() {
	$prefix = 'noc_project_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'contact',
		'title'         => esc_html__( 'Project contact information', 'mro-cit-cpt' ),
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
		'name' => esc_html__( 'Logo del proyecto', 'mro-cit-cpt' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'mro-cit-cpt' ),
		'id'   => $prefix . 'logo',
		'type' => 'file',
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


	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Schedule', 'mro-cit-cpt' ),
		// 'desc' => esc_html__( 'field description (optional)', 'mro-cit-cpt' ),
		'id'   => $prefix . 'schedule',
		'type' => 'textarea_small',
	) );
}


add_action( 'cmb2_admin_init', 'mro_noc_register_project_gen_info_metabox' );
/**
 * Project general informaction
 */
function mro_noc_register_project_gen_info_metabox() {
	$prefix = 'noc_project_';

	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'gen_info',
		'title'         => esc_html__( 'Project information', 'mro-cit-cpt' ),
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
		'name' => esc_html__( 'Area', 'mro-cit-cpt' ),
		'desc' => esc_html__( 'En m2', 'mro-cit-cpt' ),
		'id'   => $prefix . 'area',
		'type' => 'text_small',
		'repeatable' => true,
		// 'column' => array(
		// 	'name'     => esc_html__( 'Column Title', 'mro-cit-cpt' ), // Set the admin column title
		// 	'position' => 2, // Set as the second column.
		// );
		// 'display_cb' => 'mro_cit_demo_display_text_small_column', // Output the display of the column values through a callback.
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
	        'escape_cb'       => 'absint',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Units', 'mro-cit-cpt' ),
		'desc' => esc_html__( 'Si es torre, es unidades por torrw', 'mro-cit-cpt' ),
		'id'   => $prefix . 'units',
		'type' => 'text_small',
		// 'repeatable' => true,
		// 'column' => array(
		// 	'name'     => esc_html__( 'Column Title', 'mro-cit-cpt' ), // Set the admin column title
		// 	'position' => 2, // Set as the second column.
		// );
		// 'display_cb' => 'mro_cit_demo_display_text_small_column', // Output the display of the column values through a callback.
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
	        'escape_cb'       => 'absint',
	) );

	
	//Change to repeater with limit 
	//https://github.com/CMB2/CMB2-Snippet-Library/blob/master/javascript/limit-number-of-repeat-groups.php
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Amenidades', 'mro-cit-cpt' ),
		// 'desc' => esc_html__( 'field description (optional)', 'mro-cit-cpt' ),
		'id'   => $prefix . 'amenities',
		'type' => 'textarea',
	) );

	//Change to repeater with limit 
	//https://github.com/CMB2/CMB2-Snippet-Library/blob/master/javascript/limit-number-of-repeat-groups.php
	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Facilidades', 'mro-cit-cpt' ),
		// 'desc' => esc_html__( 'field description (optional)', 'mro-cit-cpt' ),
		'id'   => $prefix . 'characteristics',
		'type' => 'textarea',
	) );


	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Parking spaces', 'mro-cit-cpt' ),
		// 'desc' => esc_html__( 'Si es torre, es unidades por torrw', 'mro-cit-cpt' ),
		'id'   => $prefix . 'parking',
		'type' => 'text_small',
		// 'repeatable' => true,
		// 'column' => array(
		// 	'name'     => esc_html__( 'Column Title', 'mro-cit-cpt' ), // Set the admin column title
		// 	'position' => 2, // Set as the second column.
		// );
		// 'display_cb' => 'mro_cit_demo_display_text_small_column', // Output the display of the column values through a callback.
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		'sanitization_cb' => 'absint',
	        'escape_cb'       => 'absint',
	) );
}


add_action( 'cmb2_admin_init', 'mro_noc_register_project_price_metabox' );
/**
 * Project general informaction
 */
function mro_noc_register_project_price_metabox() {
	$prefix = 'noc_project_';

	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'price',
		'title'         => esc_html__( 'Project price', 'mro-cit-cpt' ),
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
		'name'             => esc_html__( 'Currency', 'mro-cit-cpt' ),
		// 'desc'             => esc_html__( 'Choose the currency', 'mro-cit-cpt' ),
		'id'               => $prefix . 'currency',
		'type'             => 'radio_inline',
		// 'show_option_none' => 'No Selection',
		'options'          => array(
			'CRC'	=> esc_html__( 'Costa Rica colón', 'mro-cit-cpt' ),
			'USD'   => esc_html__( 'US dollar', 'mro-cit-cpt' ),
			'both'  => esc_html__( 'Both', 'mro-cit-cpt' ),
		),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Price from (colones)', 'mro-cit-cpt' ),
		// 'desc' => esc_html__( 'field description (optional)', 'mro-cit-cpt' ),
		'id'   => $prefix . 'price_colones',
		'type' => 'text_money',
		'before_field' => '₡', // override '$' symbol if needed
		// 'repeatable' => true,
		'attributes' => array(
			// 'required'               => true, // Will be required only if visible.
			'data-conditional-id'    => $prefix . 'currency',
			'data-conditional-value' => wp_json_encode( array( 'CRC', 'both' ) ),
		),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Price from (US dollars)', 'mro-cit-cpt' ),
		// 'desc' => esc_html__( 'field description (optional)', 'mro-cit-cpt' ),
		'id'   => $prefix . 'price_dollars',
		'type' => 'text_money',
		// 'before_field' => '£', // override '$' symbol if needed
		// 'repeatable' => true,
		'attributes' => array(
			// 'required'               => true, // Will be required only if visible.
			'data-conditional-id'    => $prefix . 'currency',
			'data-conditional-value' => wp_json_encode( array( 'USD', 'both' ) ),
		),
	) );


	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Financing', 'mro-cit-cpt' ),
		// 'desc'             => esc_html__( 'Choose the currency', 'mro-cit-cpt' ),
		'id'               => $prefix . 'financing_options',
		'type'             => 'radio_inline',
		// 'show_option_none' => 'No Selection',
		'options'          => array(
			'percentage'	=> esc_html__( 'Porcentaje', 'mro-cit-cpt' ),
			'custom'   => esc_html__( 'Personalizado', 'mro-cit-cpt' ),
			'not_shown'  => esc_html__( 'No mostrar', 'mro-cit-cpt' ),
		),
	) );


	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Porcentaje de financiamiento', 'mro-cit-cpt' ),
		'desc' => esc_html__( '%', 'mro-cit-cpt' ),
		'id'   => $prefix . 'financing-percentage',
		'type' => 'text_small',
		// 'repeatable' => true,
		// 'column' => array(
		// 	'name'     => esc_html__( 'Column Title', 'mro-cit-cpt' ), // Set the admin column title
		// 	'position' => 2, // Set as the second column.
		// );
		// 'display_cb' => 'mro_cit_demo_display_text_small_column', // Output the display of the column values through a callback.
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
			'data-conditional-id'    => $prefix . 'financing_options',
			'data-conditional-value' => 'percentage',
		),
		'sanitization_cb' => 'absint',
	    'escape_cb'       => 'absint',
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Personalizado', 'mro-cit-cpt' ),
		// 'desc'       => esc_html__( 'field description (optional)', 'mro-cit-cpt' ),
		'id'         => $prefix . 'financing_custom',
		'type'       => 'text',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
		// 'column'          => true, // Display field value in the admin post-listing columns
		'attributes' => array(
			// 'required'               => true, // Will be required only if visible.
			'data-conditional-id'    => $prefix . 'financing_options',
			'data-conditional-value' => 'custom',
		),
	) );
}


add_action( 'cmb2_admin_init', 'mro_noc_register_project_images_metabox' );
/**
 * Project images
 */
function mro_noc_register_project_images_metabox() {
	$prefix = 'noc_project_';

	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'images',
		'title'         => esc_html__( 'Project images', 'mro-cit-cpt' ),
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
		'name' => esc_html__( 'Imagen principal', 'mro-cit-cpt' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'mro-cit-cpt' ),
		'id'   => '_thumbnail',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name'         => esc_html__( 'Imágenes adicionales', 'mro-cit-cpt' ),
		'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'mro-cit-cpt' ),
		'id'           => $prefix . 'gallery',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

	// $cmb->add_field( array(
	// 	'name'    => 'PDF',
	// 	'id'      => $prefix . 'pdf',
	// 	'type'    => 'file',
	// 	'options' => array(
	// 		'add_upload_file_text' => 'Upload PDF',
	// 	),
	// ) );
}


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