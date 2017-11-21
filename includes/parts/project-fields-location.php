<?php

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