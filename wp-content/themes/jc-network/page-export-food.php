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

$post_type = 'jc_food_drink';

$results = [];
$foods = get_posts([
	'post_type' => 'jc_food_drink',
	'posts_per_page' => 999
]);

foreach ( $foods as $k => $v ) {
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
		'brief_description' => $v->brief_description,
		'american' => has_term( 'american', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'asian' => has_term( 'asian', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'breweries' => has_term( 'breweries', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'casual-eats' => has_term( 'casual-eats', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'coffee-shop-cafe' => has_term( 'coffee-shop-cafe', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'food-truckscarts' => has_term( 'food-truckscarts', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'italian' => has_term( 'italian', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'lighter-fares-tapas' => has_term( 'lighter-fares-tapas', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'mexican' => has_term( 'mexican', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'seafood' => has_term( 'seafood', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'sweet-spots' => has_term( 'sweet-spots', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'waking-up' => has_term( 'waking-up', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'wine-cocktail-bars' => has_term( 'wine-cocktail-bars', 'jc_food_type', $v->ID ) ? 'X' : ' ',
		'alcohol-served' => has_term( 'alcohol-served', 'jc_food_amenity', $v->ID ) ? 'X' : ' ',
		'beerwinespirits' => has_term( 'beerwinespirits', 'jc_food_amenity', $v->ID ) ? 'X' : ' ',
		'breakfast' => has_term( 'breakfast', 'jc_food_amenity', $v->ID ) ? 'X' : ' ',
		'dinner' => has_term( 'dinner', 'jc_food_amenity', $v->ID ) ? 'X' : ' ',
		'lunch' => has_term( 'lunch', 'jc_food_amenity', $v->ID ) ? 'X' : ' ',
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
