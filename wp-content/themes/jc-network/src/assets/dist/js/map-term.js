(function($) {
	
	const g = google;
	const d = mapData;
	const s = [{"elementType":"geometry","stylers":[{"color":"#AEDCF7"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"lightness":20},{"gamma":0.01}]},{"elementType":"labels.text.stroke","stylers":[{"saturation":-31},{"lightness":-33},{"gamma":0.8},{"weight":2}]},{"featureType":"administrative","stylers":[{"lightness":40}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"landscape","stylers":[{"color":"#3374b9"},{"gamma":10},{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"saturation":30},{"lightness":30}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"saturation":20}]},{"featureType":"poi.attraction","elementType":"labels.text","stylers":[{"color":"#0080ff"},{"visibility":"on"}]},{"featureType":"poi.government","elementType":"labels.text","stylers":[{"color":"#ff8000"},{"visibility":"on"}]},{"featureType":"poi.government","elementType":"labels.text.fill","stylers":[{"color":"#ff8000"},{"visibility":"on"}]},{"featureType":"poi.government","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"saturation":-20},{"lightness":20}]},{"featureType":"road","stylers":[{"color":"#4489D4"},{"gamma":"111.00"}]},{"featureType":"road","elementType":"geometry","stylers":[{"saturation":-30},{"lightness":10}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":25},{"lightness":25}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#3f6682"},{"visibility":"on"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#7CABDD"},{"saturation":"0"},{"lightness":"0"},{"gamma":"9.00"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#6191c4"},{"visibility":"on"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"color":"#ebfdff"},{"visibility":"on"}]}];
	
	function new_map( canvas ) {
		// array of markers
		var markers = get_markers('.marker');
		
		//var style = ;
		
		// vars
		var args = {
			zoom             : 16,
			center           : new g.maps.LatLng(markers[0].dataset.lat, markers[0].dataset.lng),
			disableDefaultUI : true,
			styles           : s
		};
		console.log(s);
		
		// create map
		var map = new g.maps.Map(canvas, args);
		
		// add a markers reference
		map.markers = [];
		
		// add markers
		for( let marker of markers ) {
			add_marker( marker, map );
		}
		
		// center map
		center_map( map );
		
		// return
		return map;
	}
	
	function get_markers( selectors ) {
		return document.querySelectorAll( selectors )
	}
	
	function add_marker( marker, map ) {
		// var
		var latlng = new g.maps.LatLng( marker.dataset.lat, marker.dataset.lng );
		var infoContent = get_contents( marker );
	
		// create marker
		var image = {
			url        : d.markerIcon,
			size       : new g.maps.Size(35, 32),
			origin     : new g.maps.Point(0, 0),
			anchor     : new g.maps.Point(17, 34),
			scaledSize : new g.maps.Size(35, 32)
		};
	
		var marker = new g.maps.Marker({
			position : latlng,
			map      : map,
			icon     : image
		});
	
		// add to array
		map.markers.push( marker );
		//console.log(marker);
	
		// if marker contains HTML, add it to an infoWindow
		if( marker ) {
			// create info window
			infowindow = new g.maps.InfoWindow();
	
			// show info window when marker is clicked
			g.maps.event.addListener(marker, 'click', function() {
				// close all existing infowindows onclick
				infowindow.close( map, marker );
				
				// set options for new infowindow
				infowindow.setOptions({
					content  : infoContent,
					maxWidth : 200
				});
				
				// open new infowindow onclick
				infowindow.open( map, marker );
			});
		}
	}
	
	function get_contents( marker ) {
		return marker.innerHTML
	}
	
	function center_map( map ) {
	
		// vars
		var bounds = new g.maps.LatLngBounds();
	
		// loop through all markers and create bounds

		$.each( map.markers, function( i, marker ) {
			var latlng = new g.maps.LatLng( marker.position.lat(), marker.position.lng() );
	
			bounds.extend( latlng );
		});
	
		// only 1 marker?
		if( map.markers.length === 1 ) {
			// set center of map
			map.setCenter( bounds.getCenter() );
			map.setZoom( 16 );
		}
		// if multiple markers ...
		else {
			// fit to bounds
			map.fitBounds( bounds );
	
			var listener = g.maps.event.addListener(map, "idle", function() { 
				map.panBy(-150, 0);
				//map.setZoom(map.getZoom() - 1); 
				g.maps.event.removeListener(listener); 
			});
		}
	}
	
	function initialize() {
		var mapFrame = document.querySelector('#locations-map-frame'),
			map = new_map( mapFrame );
	}

	g.maps.event.addDomListener(window, 'load', initialize)
})(jQuery);