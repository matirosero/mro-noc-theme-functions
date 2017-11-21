<?php

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

	$cmb_demo->add_field( array(
		'name'    => 'PDF',
		'id'      => $prefix . 'pdf',
		'type'    => 'file',
		'options' => array(
			'add_upload_file_text' => 'Upload PDF',
		),
	) );