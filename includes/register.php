<?php

namespace CB_Klaviyo\Register;

use Siro\Klaviyo\KlaviyoAPI;

/**
 * Subscribe User to a list
 */

function register( $register ) {
	// Initiate API
	$klaviyo  = new KlaviyoAPI( CB_KLAVIYO_PRIVATE_API_KEY );

	// Add Member to Klaviyo
	$klaviyo->list->addMember('MuXAQs', $register);
}

function submission( $entry ) {
    
	// For debugging form.
	if ( CB_KLAVIYO_DEBUG ) {
		print_r( $entry );
		return;
	}

	// Map entries.
	$map = [
		'name'         => '10',
		'email'        => '11',
		'phone'        => '12',
	];

	// Get names.
	$name       = rgar( $entry, $map['name'] );
	$name       = explode( ' ', $name );
	$last_name  = array_pop( $name );
	$first_name = implode( ' ', $name );

	// Get email.
	$email = rgar( $entry, $map['email'] );

	// Get phone.
	$phone = rgar( $entry, $map['phone'] );

	$register = [
		[
			'first_name'	=> $first_name,
			'last_name'		=> $last_name,
			'email' 		=> $email
		]
	];

	register( $register );
}