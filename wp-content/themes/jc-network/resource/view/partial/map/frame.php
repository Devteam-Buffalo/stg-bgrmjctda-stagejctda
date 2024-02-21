<?php
/*
**  @file               map.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/3/18
*/
defined( 'ABSPATH' ) || exit;

$gps = [
	'lat' => null,
	'lng' => null
];

$acf_address = get_field( 'address_gps', get_the_id() );

if ( isset($acf_address) && ! empty($acf_address) ) {
	$addr = get_field( 'address_gps', get_the_id() );
	$gps['lat'] = $addr['lat'];
	$gps['lng'] = $addr['lng'];
}
elseif ( ( isset($posts->gps_1) && isset($posts->gps_2) ) && ! ( empty($posts->gps_1) && empty($posts->gps_2) ) ) {
	$gps['lat'] = $posts->gps_1;
	$gps['lng'] = $posts->gps_2;
}
else {
	$pod = pods( get_post_type(), get_the_id(), true );
	$gps['lat'] = $pod->fields('latitude');
	$gps['lng'] = $pod->fields('longitude');
}

if ( ! ( empty($gps['lat']) && empty($gps['lng']) ) ) : ?>

<div class="marker" data-lat="<?= $gps['lat'] ?>" data-lng="<?= $gps['lng'] ?>">
	<h4><?= $posts->page_heading ?? get_the_title() ?></h4>
	<?= apply_filters( 'the_content', ( $posts->page_subheading ?? get_the_excerpt() ) ) ?>
	<a href="<?= get_the_permalink() ?>" title="View <?= the_title_attribute() ?>" class="button cta-button marker-link">View Location</a>
</div>

<?php endif ?>