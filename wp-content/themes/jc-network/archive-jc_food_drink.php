<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Food & Drink archive listing
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

get_header();

get_extended_template_part('location', 'archive', [
	'parent_id' => 6021,
	'taxonomy' => 'jc_food_type',
	'type' => 'jc_food_drink',
	'terms' => get_terms( ['taxonomy' => 'jc_food_type', 'hide_empty' => true] )
], ['dir' => 'partials']);

get_footer();
