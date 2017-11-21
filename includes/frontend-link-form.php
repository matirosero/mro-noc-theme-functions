<?php

function mro_noc_submission_links_shortcode() {
    global $user_ID;

    if ( mro_noc_has_frontend_access() ) :
	    $url = get_permalink(2548);

		// $payments = edd_get_users_purchases( get_current_user_id(), 20, true, 'any' );
		// if ( $payments ) :
		// 	foreach ( $payments as $payment ) :
		// 		$payment = new EDD_Payment( $payment->ID );
		// 		var_dump($payment);
		// 		$downloads =  $payment->downloads;
		// 		foreach ($downloads as $download) :
		// 			$download_id = $download['id'];
		// 			$quantity = $download['quantity'];
		// 			var_dump($quantity);
		// 		endforeach;
		// 	endforeach;
		// endif;

	    // $subscriber = new EDD_Recurring_Subscriber( $user_ID );
	    // var_dump($subscriber);

	    $output = '';
	    $output .= '<h3>Enviar información de proyectos</h3>';
	    $output .= '<p><a href="'.$url.'">Ingrese al formulario</a></p>';

	    return $output;
	else:
		return false;
	endif;
}

add_shortcode('submission-links', 'mro_noc_submission_links_shortcode');