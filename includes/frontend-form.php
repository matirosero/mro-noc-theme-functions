<?php
/*
 * Register the form and fields for our front-end submission form
 */
function wds_frontend_form_register() {
    global $user_ID;

    $prefix = 'noc_project_';

    $subscriptions = mro_noc_subscription_array();

    $cmb_demo = new_cmb2_box( array(
        'id'           => 'front-end-post-form',
        'object_types' => array( 'page' ),
        'hookup'       => false,
        'save_fields'  => false,
    ) );

    $cmb_demo->add_field( array(
        'name'    => __( 'Nombre del proyecto', 'wds-post-submit' ),
        'id'      => 'submitted_post_title',
        'type'    => 'text',
        'default' => __( 'Nuevo proyecto', 'wds-post-submit' ),
    ) );

    $cmb_demo->add_field( array(
        'name'    => __( 'Descripción del proyecto', 'wds-post-submit' ),
        'id'      => 'submitted_post_content',
        'type'    => 'wysiwyg',
        'options' => array(
            'textarea_rows' => 12,
            'media_buttons' => false,
        ),
    ) );

    $cmb_demo->add_field( array(
        'name'       => __( 'Imagen principal', 'wds-post-submit' ),
        'id'         => 'submitted_post_thumbnail',
        'type'       => 'text',
        'attributes' => array(
            'type' => 'file', // Let's use a standard file upload field
        ),
    ) );


    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Información de contacto del proyecto', 'mro-cit-cpt' ),
        'id'   => $prefix . 'title_contact',
        'type' => 'title',
    ) );

    include(dirname( __FILE__ ) . '/parts/project-fields-contact.php');


    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Información general', 'mro-cit-cpt' ),
        'id'   => $prefix . 'title_gen_info',
        'type' => 'title',
    ) );

    include(dirname( __FILE__ ) . '/parts/project-fields-gen-info.php');


    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Costo y financiamiento', 'mro-cit-cpt' ),
        'id'   => $prefix . 'title_price',
        'type' => 'title',
    ) );

    include(dirname( __FILE__ ) . '/parts/project-fields-price.php');


    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Imágenes', 'mro-cit-cpt' ),
        'id'   => $prefix . 'title_images',
        'type' => 'title',
    ) );

    include(dirname( __FILE__ ) . '/parts/project-fields-images.php');


    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Ubicación', 'mro-cit-cpt' ),
        'id'   => $prefix . 'title_location',
        'type' => 'title',
    ) );

    include(dirname( __FILE__ ) . '/parts/project-fields-location.php');

    // var_dump($subscriptions);
    if( edd_has_user_purchased($user_ID, $subscriptions['super'] ) || current_user_can('administrator') ): 

        $cmb_demo->add_field( array(
            'name' => esc_html__( 'Información paquete Super Premium', 'mro-cit-cpt' ),
            'id'   => $prefix . 'title_super',
            'type' => 'title',
        ) );

        // include(dirname( __FILE__ ) . '/parts/project-fields-super.php');

    elseif( edd_has_user_purchased($user_ID, $subscriptions['premium'] ) || current_user_can('administrator') ): 

        $cmb_demo->add_field( array(
            'name' => esc_html__( 'Información paquete Premium', 'mro-cit-cpt' ),
            'id'   => $prefix . 'title_premium',
            'type' => 'title',
        ) );

    elseif( edd_has_user_purchased($user_ID, $subscriptions['basic'] ) || current_user_can('administrator') ): 

        $cmb_demo->add_field( array(
            'name' => esc_html__( 'Información paquete Básico', 'mro-cit-cpt' ),
            'id'   => $prefix . 'title_basic',
            'type' => 'title',
        ) );

    endif;

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
