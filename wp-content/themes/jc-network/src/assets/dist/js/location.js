;(function($) {
	"use strict";

	$(document).ready( function() {
		$('#google-map').lightGallery({
			selector: 'this',
			iframeMaxWidth: '80%'
		});

		$('.load-map').on( 'click', function() {
			$('.location-map-frame').toggleClass('show-map');
		});
	} );
})(jQuery);