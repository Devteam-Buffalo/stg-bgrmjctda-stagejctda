<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Lodging archive listing
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
	'parent_id' => 6019,
	'taxonomy' => 'jc_lodging_accommodation',
	'type' => 'jc_lodging',
	'terms' => get_terms( ['taxonomy' => 'jc_lodging_accommodation', 'hide_empty' => true] )
], ['dir' => 'partials']);

get_footer();
