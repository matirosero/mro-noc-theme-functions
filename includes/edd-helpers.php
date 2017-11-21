<?php

function mro_noc_subscription_array() {
	$subscriptions = array(
		'basic' => 2459,
		'premium' => 2461,
		'super' => 2463,
	);

	return $subscriptions;
}

function mro_noc_has_frontend_access() {
	global $user_ID, $post; // the ID of the currently logged-in user


	// $basic = get_page_by_title( 'Paquete Básico Noc' );
	$basic_id = 2459;

	// $premium = get_page_by_title( 'Paquete Premiun Noc Noc' );
	$premium_id = 2461;

	// $super = get_page_by_title( 'Paquete Super Premiun Noc Noc Noc' );
	$super_id = 2463;


	if( edd_has_user_purchased($user_ID, $basic_id) || edd_has_user_purchased($user_ID, $premium_id) || edd_has_user_purchased($user_ID, $super_id) || current_user_can('administrator') ): 

		return true;

	else:

		return false;

	endif;
}