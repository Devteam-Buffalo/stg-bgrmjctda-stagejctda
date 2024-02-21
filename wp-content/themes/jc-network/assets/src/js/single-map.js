(function($) {

	const g = google;
	const d = mapData;
	const s = [{"elementType":"geometry","stylers":[{"color":"#AEDCF7"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"lightness":20},{"gamma":0.01}]},{"elementType":"labels.text.stroke","stylers":[{"saturation":-31},{"lightness":-33},{"gamma":0.8},{"weight":2}]},{"featureType":"administrative","stylers":[{"lightness":40}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"landscape","stylers":[{"color":"#3374b9"},{"gamma":10},{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"saturation":30},{"lightness":30}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"saturation":20}]},{"featureType":"poi.attraction","elementType":"labels.text","stylers":[{"color":"#0080ff"},{"visibility":"on"}]},{"featureType":"poi.government","elementType":"labels.text","stylers":[{"color":"#ff8000"},{"visibility":"on"}]},{"featureType":"poi.government","elementType":"labels.text.fill","stylers":[{"color":"#ff8000"},{"visibility":"on"}]},{"featureType":"poi.government","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"saturation":-20},{"lightness":20}]},{"featureType":"road","stylers":[{"color":"#4489D4"},{"gamma":"111.00"}]},{"featureType":"road","elementType":"geometry","stylers":[{"saturation":-30},{"lightness":10}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":25},{"lightness":25}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#3f6682"},{"visibility":"on"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#7CABDD"},{"saturation":"0"},{"lightness":"0"},{"gamma":"9.00"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#6191c4"},{"visibility":"on"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"color":"#ebfdff"},{"visibility":"on"}]}];

	function new_map( canvas ) {

		// array of markers
		var marker = canvas.querySelector('.marker')

		// grab the data attributes on .marker for lat and lng
		var markerLat = marker.dataset.lat,
			markerLng = marker.dataset.lng

		// establish the infowindow content now before the marker var converts to an object
		var infoContent = get_contents(marker)

		// create a new Google Maps LatLng object and set lat & lng
		var latlng = new g.maps.LatLng( marker.dataset.lat, marker.dataset.lng )

		// establish map options and styles
		var args = {
			zoom              : 14,
			center            : latlng,
			zoomControl       : false,
			mapTypeControl    : false,
			streetViewControl : false,
			rotateControl     : false,
			scaleControl      : false,
			fullscreenControl : true,
			styles            : s
		};

		// create new Google Maps map object
		var map = new g.maps.Map( canvas, args)

		// establish marker icon source and options
		var image = {
			url         : d.markerIcon,
			size        : new g.maps.Size(35, 32),
			scaledSize  : new g.maps.Size(35, 32),
			origin      : new g.maps.Point(0, 0),
			anchor      : new g.maps.Point(17, 32)
		};

		// create new Google Maps marker object
		var marker = new g.maps.Marker({
			position : latlng,
			map      : map,
			icon     : image
		});

		if( marker ) {
			infowindow = new g.maps.InfoWindow();

			g.maps.event.addListener(marker, 'click', function() {
				// close all existing infowindows onclick
				infowindow.close( map, marker );

				// set options for new infowindow
				infowindow.setOptions({
					content  : infoContent,
					maxWidth : 225
				});

				// open new infowindow onclick
				infowindow.open( map, marker );
			});
		}

		// center map
		//center_map( map );

		// return
		return map;

	}

	function get_markers( selectors ) {
		return document.querySelectorAll( selectors )
	}

	function get_contents( marker ) {
		return marker.innerHTML;
	}

	function initialize() {
		var mapFrame = document.body.querySelector('#single-location-map-frame');

		if ( mapFrame !== null )
			var map = new_map( mapFrame );
	}

	g.maps.event.addDomListener(window, 'load', initialize)
})(jQuery);
