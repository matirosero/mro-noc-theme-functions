<?php

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
		//https://gist.github.com/jtsternberg/c09f5deb7d818d0d170b
		// 'sanitization_cb' => 'absint',
	    // 'escape_cb'       => 'absint',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Units', 'mro-cit-cpt' ),
		'desc' => esc_html__( 'Si es torre, es unidades por torre', 'mro-cit-cpt' ),
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
		// 'desc' => esc_html__( 'Si es torre, es unidades por torre', 'mro-cit-cpt' ),
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
	) );