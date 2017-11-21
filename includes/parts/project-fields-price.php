<?php

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
		// 'sanitization_cb' => 'absint',
	 //    'escape_cb'       => 'absint',
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