<?php
/**
 * Phone URL 
 * @author Bill Erickson
 * @link http://www.billerickson.net/phone-number-url
 *
 * @param string $phone_number, ex: (555) 123-4568
 * @return string $phone_url, ex: tel:5551234568
 */
function ea_phone_url( $phone_number = false ) {
	$phone_number = str_replace( array( '(', ')', '-', '.', '|', ' ' ), '', $phone_number );

	return esc_url( 'tel:' . $phone_number );
}