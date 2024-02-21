/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Admin script
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181222
 * @author          lpeterson
 */

( function( $ ) {
	'use strict';

	if ( 'undefined' !== typeof GeoComplete ) {
		var $body = $( 'body' );
		var $map = $body.find( '#address-lookup-map' );

		if ( null !== $map ) {
			var $field = $body.find( '#pods-form-ui-pods-meta-address-lookup' );
			var $form = $body.find( '#post' );

			$field.geocomplete( {
				map: $map,
				details: $form,
				strictBounds:false,
				autoselect:false,
				markerOptions: {
					draggable:true
				},
				detailsAttribute: 'data-geo',
				types: [
					'geocode',
					'establishment'
				],
				country:'US',
				componentRestrictions: {
					postalCode: '28770'
				}
			} )
				.bind( 'geocode:result', function() {
					$map.css( {'height':'20em','border-color':'#ddd'} );
				} );
		}
	}
} )( window.jQuery );
