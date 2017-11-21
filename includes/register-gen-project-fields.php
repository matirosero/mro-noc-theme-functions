<?php

add_action( 'cmb2_admin_init', 'mro_noc_user_fields_metabox' );
/**
 * Extra user fields
 */
function mro_noc_user_fields_metabox() {
	$prefix = 'mro_noc_user_';
	/**
	 * Metabox for the user profile screen
	 */
	$cmb_user = new_cmb2_box( array(
		'id'               => $prefix . 'boards',
		'title'            => __( 'Active user boards', 'cmb2' ), // Doesn't output for user boxes
		'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
		'show_names'       => true,
		'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
	) );

	$cmb_user->add_field( array(
		'name' => esc_html__( 'Basic boards', 'mro-cit-cpt' ),
		// 'desc' => esc_html__( 'En m2', 'mro-cit-cpt' ),
		'id'   => $prefix . 'basic',
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
		//https://gist.github.com/jtsternberg/c09f5deb7d818d0d170b
		// 'sanitization_cb' => 'absint',
	    // 'escape_cb'       => 'absint',
	) );
}



add_action( 'cmb2_admin_init', 'mro_noc_register_project_contact_metabox' );
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

	include(dirname( __FILE__ ) . '/parts/project-fields-contact.php');
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

	include(dirname( __FILE__ ) . '/parts/project-fields-gen-info.php');
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

	include(dirname( __FILE__ ) . '/parts/project-fields-price.php');
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

	include(dirname( __FILE__ ) . '/parts/project-fields-images.php');
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

	include(dirname( __FILE__ ) . '/parts/project-fields-location.php');

}