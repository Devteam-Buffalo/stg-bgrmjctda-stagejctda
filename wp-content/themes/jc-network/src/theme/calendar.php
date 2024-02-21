<?php

function tribe_947096_obfuscate_organizer_email( $output ) {
	return antispambot( $output );
}
// add_filter( 'tribe_get_organizer_email', 'tribe_947096_obfuscate_organizer_email' );