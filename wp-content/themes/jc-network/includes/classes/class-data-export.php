<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Export Food & Drink and Lodging data to CSV
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190109
 * @author          lpeterson
 */

date_default_timezone_set('America/New_York');

$req = date('H:i:s');

$post_type = $wp_query->query['post_type'];

/**
 * Export Food & Drink data to CSV file download if queried post type dictates as such
 */
if ( 'jc_food_drink' === $post_type ) {

	$results = [];
	$posts = $wp_query->posts;

	foreach ( $posts as $k => $v ) {
		$amen = wp_list_pluck( $v->jc_food_amenity, 'slug' );
		$type = wp_list_pluck( $v->jc_food_type, 'slug' );
		$amen = is_array( $amen ) ? $amen : [];
		$type = is_array( $type ) ? $type : [];

		$results[$k] = [
			'id' => $v->ID,
			'uri' => get_permalink( $v->ID ),
			'business_name' => $v->business_name,
			'physical_address_1' => $v->physical_address_1,
			'physical_city' => $v->physical_city,
			'physical_state' => $v->physical_state,
			'physical_zip_code' => $v->physical_zip_code,
			'phone_number' => $v->phone_number,
			'website' => $v->website,
			'brief_description' => $v->brief_description,
			'american' => in_array( 'american', $type, true ) ? 'X' : ' ',
			'asian' => in_array( 'asian', $type, true ) ? 'X' : ' ',
			'breweries' => in_array( 'breweries', $type, true ) ? 'X' : ' ',
			'casual-eats' => in_array( 'casual-eats', $type, true ) ? 'X' : ' ',
			'coffee-shop-cafe' => in_array( 'coffee-shop-cafe', $type, true ) ? 'X' : ' ',
			'food-truckscarts' => in_array( 'food-truckscarts', $type, true ) ? 'X' : ' ',
			'italian' => in_array( 'italian', $type, true ) ? 'X' : ' ',
			'lighter-fares-tapas' => in_array( 'lighter-fares-tapas', $type, true ) ? 'X' : ' ',
			'mexican' => in_array( 'mexican', $type, true ) ? 'X' : ' ',
			'seafood' => in_array( 'seafood', $type, true ) ? 'X' : ' ',
			'sweet-spots' => in_array( 'sweet-spots', $type, true ) ? 'X' : ' ',
			'waking-up' => in_array( 'waking-up', $type, true ) ? 'X' : ' ',
			'wine-cocktail-bars' => in_array( 'wine-cocktail-bars', $type, true ) ? 'X' : ' ',
			'alcohol-served' => in_array( 'alcohol-served', $amen, true ) ? 'X' : ' ',
			'beerwinespirits' => in_array( 'beerwinespirits', $amen, true ) ? 'X' : ' ',
			'breakfast' => in_array( 'breakfast', $amen, true ) ? 'X' : ' ',
			'dinner' => in_array( 'dinner', $amen, true ) ? 'X' : ' ',
			'lunch' => in_array( 'lunch', $amen, true ) ? 'X' : ' ',
		];
	}
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header('Content-Description: File Transfer');
	header("Content-type: text/csv");
	header("Expires: 0");
	header("Pragma: public");
	header("Content-Disposition: attachment; filename={$req}".'-food-export.csv');

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

}

/**
 * Export Lodging data to CSV file download if queried post type dictates as such
 */
if ( 'jc_lodging' === $post_type ) {

	$results = [];
	$posts = $wp_query->posts;

	foreach ( $posts as $k => $v ) {
		$amen = wp_list_pluck( $v->jc_lodging_amenity, 'slug' );
		$accom = wp_list_pluck( $v->jc_lodging_accommodation, 'slug' );
		$camp = wp_list_pluck( $v->jc_camping_amenity, 'slug' );
		$amen = is_array( $amen ) ? $amen : [];
		$accom = is_array( $accom ) ? $accom : [];
		$camp = is_array( $camp ) ? $camp : [];

		$results[$k] = [
			'id' => $v->ID,
			'uri' => get_permalink( $v->ID ),
			'business_name' => $v->business_name,
			'physical_address_1' => $v->physical_address_1,
			'physical_city' => $v->physical_city,
			'physical_state' => $v->physical_state,
			'physical_zip_code' => $v->physical_zip_code,
			'phone_number' => $v->phone_number,
			'website' => $v->website,
			'number_of_rooms' => $v->number_of_rooms,
			'number_of_units' => $v->number_of_units,
			'price_range' => $v->price_range,
			'air-conditioning' => in_array( 'air-conditioning', $amen, true ) ? 'X' : ' ',
			'children-welcome' => in_array( 'children-welcome', $amen, true ) ? 'X' : ' ',
			'fireplace' => in_array( 'fireplace', $amen, true ) ? 'X' : ' ',
			'golf' => in_array( 'golf', $amen, true ) ? 'X' : ' ',
			'handicap-accessible' => in_array( 'handicap-accessible', $amen, true ) ? 'X' : ' ',
			'hot-tub' => in_array( 'hot-tub', $amen, true ) ? 'X' : ' ',
			'meeting-facilities' => in_array( 'meeting-facilities', $amen, true ) ? 'X' : ' ',
			'pets-allowed' => in_array( 'pets-allowed', $amen, true ) ? 'X' : ' ',
			'pool' => in_array( 'pool', $amen, true ) ? 'X' : ' ',
			'recreation' => in_array( 'recreation', $amen, true ) ? 'X' : ' ',
			'restaurant' => in_array( 'restaurant', $amen, true ) ? 'X' : ' ',
			'tv' => in_array( 'tv', $amen, true ) ? 'X' : ' ',
			'wireless-internet-wifi' => in_array( 'wireless-internet-wifi', $amen, true ) ? 'X' : ' ',
			'cabins' => in_array( 'cabins', $camp, true ) ? 'X' : ' ',
			'camp-store' => in_array( 'camp-store', $camp, true ) ? 'X' : ' ',
			'concrete-pad' => in_array( 'concrete-pad', $camp, true ) ? 'X' : ' ',
			'dump-station' => in_array( 'dump-station', $camp, true ) ? 'X' : ' ',
			'electric-full' => in_array( 'electric-full', $camp, true ) ? 'X' : ' ',
			'electrical-service' => in_array( 'electrical-service', $camp, true ) ? 'X' : ' ',
			'full-hook-ups' => in_array( 'full-hook-ups', $camp, true ) ? 'X' : ' ',
			'gameroom' => in_array( 'gameroom', $camp, true ) ? 'X' : ' ',
			'group-sites' => in_array( 'group-sites', $camp, true ) ? 'X' : ' ',
			'hiking' => in_array( 'hiking', $camp, true ) ? 'X' : ' ',
			'internet' => in_array( 'internet', $camp, true ) ? 'X' : ' ',
			'laundry' => in_array( 'laundry', $camp, true ) ? 'X' : ' ',
			'playground' => in_array( 'playground', $camp, true ) ? 'X' : ' ',
			'primitive-camping' => in_array( 'primitive-camping', $camp, true ) ? 'X' : ' ',
			'river-sites' => in_array( 'river-sites', $camp, true ) ? 'X' : ' ',
			'seasonal' => in_array( 'seasonal', $camp, true ) ? 'X' : ' ',
			'showers' => in_array( 'showers', $camp, true ) ? 'X' : ' ',
			'television' => in_array( 'television', $camp, true ) ? 'X' : ' ',
			'tent-sites' => in_array( 'tent-sites', $camp, true ) ? 'X' : ' ',
			'bed-breakfast' => in_array( 'bed-breakfast', $accom, true ) ? 'X' : ' ',
			'cabin' => in_array( 'cabin', $accom, true ) ? 'X' : ' ',
			'camping' => in_array( 'camping', $accom, true ) ? 'X' : ' ',
			'cottage' => in_array( 'cottage', $accom, true ) ? 'X' : ' ',
			'hotel' => in_array( 'hotel', $accom, true ) ? 'X' : ' ',
			'inn' => in_array( 'inn', $accom, true ) ? 'X' : ' ',
			'motel' => in_array( 'motel', $accom, true ) ? 'X' : ' ',
			'resort' => in_array( 'resort', $accom, true ) ? 'X' : ' ',
			'vacation-rental' => in_array( 'vacation-rental', $accom, true ) ? 'X' : ' ',
			'vacation-rental-agency' => in_array( 'vacation-rental-agency', $accom, true ) ? 'X' : ' ',
			'zairbnb' => in_array( 'zairbnb', $accom, true ) ? 'X' : ' ',
		];
	}
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header('Content-Description: File Transfer');
	header("Content-type: text/csv");
	header("Expires: 0");
	header("Pragma: public");
	header("Content-Disposition: attachment; filename={$req}".'-food-export.csv');

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
}
