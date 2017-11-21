<?php

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