<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     FacetWP Modifications
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190330
 * @author          lpeterson
 */

namespace Jctda;

defined( 'ABSPATH' ) or exit;

class Facet_WP {
	public function __construct() {
		add_action( 'init', [ $this, 'init' ] );
	}
	public function init() {
		if ( ! defined( 'FACETWP_VERSION' ) ) return;

		add_filter( 'facetwp_facet_html', [ $this, 'facet_html' ], 10, 2 );
	}
	public function facet_html( $output, $params ) {
		if ( 'filter_spaces' == $params['facet']['name'] ) {
			$output = str_replace( 'facetwp-counter', 'uk-hidden', $output );
			$output = str_replace( 'class="facetwp-checkbox', 'style="background:var(--blue)!important;height:2rem;max-height:2rem;margin-right:var(--margin);margin-bottom:var(--margin);padding:0 var(--padding);border-radius:1rem;font:500 .875rem/2rem var(--sans-bold);color:var(--white);" class="facetwp-checkbox uk-flex-inline uk-margin-right uk-button uk-button-primary uk-button-small', $output );
		}
		return $output;
	}
}
