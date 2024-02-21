<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Main single page template for theme.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

date_default_timezone_set('America/New_York');

$req = date('H:i:s');

$post_type = 'jc_lodging';

$results = [];
$lodgings = get_posts([
	'post_type' => 'jc_lodging',
	'posts_per_page' => 999
]);

foreach ( $lodgings as $k => $v ) {
	$primary = get_the_terms( $v->ID, 'jc_location_type' );

	$results[$k] = [
		'id' => $v->ID,
		'uri' => get_permalink( $v->ID ),
		'business_name' => $v->business_name,
		'physical_address_1' => $v->physical_address_1,
		'physical_city' => $v->physical_city,
		'physical_state' => $v->physical_state,
		'physical_zip_code' => $v->physical_zip_code,
		'phone_number' => $v->phone_number,
		'email_address' => $v->email_address,
		'website' => $v->website,
		'number_of_rooms' => $v->number_of_rooms,
		'number_of_units' => $v->number_of_units,
		'price_range' => $v->price_range,
		'air-conditioning' => has_term( 'air-conditioning', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'children-welcome' => has_term( 'children-welcome', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'fireplace' => has_term( 'fireplace', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'golf' => has_term( 'golf', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'handicap-accessible' => has_term( 'handicap-accessible', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'hot-tub' => has_term( 'hot-tub', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'meeting-facilities' => has_term( 'meeting-facilities', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'pets-allowed' => has_term( 'pets-allowed', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'pool' => has_term( 'pool', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'recreation' => has_term( 'recreation', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'restaurant' => has_term( 'restaurant', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'tv' => has_term( 'tv', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'wireless-internet-wifi' => has_term( 'wireless-internet-wifi', 'jc_lodging_amenity', $v->ID ) ? 'X' : ' ',
		'cabins' => has_term( 'cabins', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'camp-store' => has_term( 'camp-store', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'concrete-pad' => has_term( 'concrete-pad', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'dump-station' => has_term( 'dump-station', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'electric-full' => has_term( 'electric-full', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'electrical-service' => has_term( 'electrical-service', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'full-hook-ups' => has_term( 'full-hook-ups', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'gameroom' => has_term( 'gameroom', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'group-sites' => has_term( 'group-sites', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'hiking' => has_term( 'hiking', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'internet' => has_term( 'internet', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'laundry' => has_term( 'laundry', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'playground' => has_term( 'playground', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'primitive-camping' => has_term( 'primitive-camping', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'river-sites' => has_term( 'river-sites', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'seasonal' => has_term( 'seasonal', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'showers' => has_term( 'showers', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'television' => has_term( 'television', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'tent-sites' => has_term( 'tent-sites', 'jc_camping_amenity', $v->ID ) ? 'X' : ' ',
		'bed-breakfast' => has_term( 'bed-breakfast', 'jc_lodging_accommodation', $v->ID ) ? 'X' : ' ',
		'cabin' => has_term( 'cabin', 'jc_lodging_accommodation', $v->ID ) ? 'X' : ' ',
		'camping' => has_term( 'camping', 'jc_lodging_accommodation', $v->ID ) ? 'X' : ' ',
		'cottage' => has_term( 'cottage', 'jc_lodging_accommodation', $v->ID ) ? 'X' : ' ',
		'hotel' => has_term( 'hotel', 'jc_lodging_accommodation', $v->ID ) ? 'X' : ' ',
		'inn' => has_term( 'inn', 'jc_lodging_accommodation', $v->ID ) ? 'X' : ' ',
		'motel' => has_term( 'motel', 'jc_lodging_accommodation', $v->ID ) ? 'X' : ' ',
		'resort' => has_term( 'resort', 'jc_lodging_accommodation', $v->ID ) ? 'X' : ' ',
		'vacation-rental' => has_term( 'vacation-rental', 'jc_lodging_accommodation', $v->ID ) ? 'X' : ' ',
		'vacation-rental-agency' => has_term( 'vacation-rental-agency', 'jc_lodging_accommodation', $v->ID ) ? 'X' : ' ',
		'zairbnb' => has_term( 'zairbnb', 'jc_lodging_accommodation', $v->ID ) ? 'X' : ' ',
		'primary' => isset( $primary ) ? $primary[0]->name : '',
	];
}
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header('Content-Description: File Transfer');
header("Content-type: text/csv");
header("Expires: 0");
header("Pragma: public");
header("Content-Disposition: attachment; filename={$req}-{$post_type}-export.csv");

$headerDisplayed = false;
$fh = @fopen( 'php://output', 'w' );

foreach ( $results as $data ) {
	if ( !$headerDisplayed ) {
		fputcsv($fh, array_keys($results[0]));
		$headerDisplayed = true;
	}
	fputcsv($fh, $data);
}

fclose($fh);

exit;
