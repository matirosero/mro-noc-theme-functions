<?php
/*
 * Register the form and fields for our front-end submission form
 */
function wds_frontend_form_register() {
    $cmb = new_cmb2_box( array(
        'id'           => 'front-end-post-form',
        'object_types' => array( 'page' ),
        'hookup'       => false,
        'save_fields'  => false,
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Nombre del proyecto', 'wds-post-submit' ),
        'id'      => 'submitted_post_title',
        'type'    => 'text',
        'default' => __( 'Nuevo proyecto', 'wds-post-submit' ),
    ) );

    $cmb->add_field( array(
        'name'    => __( 'Descripción del proyecto', 'wds-post-submit' ),
        'id'      => 'submitted_post_content',
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => 12,
            'media_buttons' => false,
        ),
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Imagen principal', 'wds-post-submit' ),
        'id'         => 'submitted_post_thumbnail',
        'type'       => 'text',
        'attributes' => array(
            'type' => 'file', // Let's use a standard file upload field
        ),
    ) );

}
add_action( 'cmb2_init', 'wds_frontend_form_register' );


/**
 * Gets the front-end-post-form cmb instance
 *
 * @return CMB2 object
 */
function yourprefix_frontend_cmb2_get() {
    // Use ID of metabox in yourprefix_frontend_form_register
    $metabox_id = 'front-end-post-form';
    // Post/object ID is not applicable since we're using this form for submission
    $object_id  = 'fake-oject-id';
    // Get CMB2 metabox object
    return cmb2_get_metabox( $metabox_id, $object_id );
}
