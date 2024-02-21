( function( window, document, undefined ) {
	'use strict';

	if ( typeof window.WPLeafletMapPlugin !== 'object' )
		return;

	var passiveSupported = false,
		mqMin768 = window.matchMedia('(min-width:768px)'),
		wpLeaflet = window.WPLeafletMapPlugin;

	var leafletMaps = function() {
		var currentMap = wpLeaflet.getCurrentMap();

		if ( typeof currentMap === 'object' ) {

			// var listItems = document.querySelector('.trigger-popup');
			// if ( Array.isArray( listItems ) && listItems.length > 0 ) {
			// 	for ( var i = 0, len = listItems.length; i < len; i++ ) {
			// 		var listItem = listItems[i];
			// 		wpLeaflet.push( function() {
			// 			var group = wpLeaflet.getCurrentGroup();
			// 			listItem.addTo(group);
			// 			listItem.bindPopup();
			// 			wpLeaflet.markers.push(listItem);
			// 		});
			// 	}
			// }
// var currentGroup = wpLeaflet.getCurrentGroup();
// var overlays = {
// 	"Cities": cities
// };
// L.control.layers(baseLayers, overlays).addTo(map);

// var attControl = L.control.attribution({prefix:false}).addTo(currentMap);
// attControl.addAttribution('<a href="https://www.discoverjacksonnc.com" title="The North Carolina Mountain Towns of Cashiers, Cherokee, Dillsboro and Sylva">Discover Jackson NC</a>');
// wpLeaflet.maps.push(currentMap);

			function toggleActive( el ) {
				if ( el.classList.contains('active') ) {
					el.classList.remove('active');
				}
				el.classList.add('active');
// if ( Array.isArray( el ) && el.length > 0 ) {
// 	for ( var i = 0, len = el.length; i < len; i++ ) {
// 	}
// }
			}

			function scrollFocus( el, speed ) {
				if ( !speed ) {
					speed = 1000;
				}

				if ( !el.offsetParent ) {
					el.scrollTo(0.0);
				}

				var easing = function (t) { return t<.5 ? 4*t*t*t : (t-1)*(2*t-2)*(2*t-2)+1 };

				var startingTop = el.offsetParent.scrollTop,
					elementTop = el.offsetTop,
					distance = parseFloat(elementTop) - parseFloat(startingTop),
					start;

				window.requestAnimationFrame( function step( timestamp ) {
					if ( !start ) {
						start = timestamp;
					}

					var time = timestamp - start,
						percent = Math.min( time / speed, 1 );

					percent = easing(percent);

					el.offsetParent.scrollTo(0.0, parseFloat(startingTop) + distance * percent );

					// Proceed with animation as long as we wanted it to.
					if ( time < speed ) {
						window.requestAnimationFrame( step );
					}
				});
			}

			currentMap.on('popupopen', function( event ) {
				var coords = this.project(event.popup._latlng),
					pop = event.popup._container,
					fig = pop.querySelector('figure'),
					img = fig.querySelector('img'),
					post = fig.getAttribute('data-post-id'),
					item = document.getElementById(post);

				coords.y -= pop.clientHeight / 2;
				this.panTo( this.unproject( coords ), { animate:true });
				pop.classList.add('active');
				window.lazy.load( img );

				scrollFocus( item );
				item.classList.add('active');
				window.lazy.load( item.querySelector('img') );
			}, currentMap);

			currentMap.on('popupclose', function( event ) {
				event.popup._container.classList.remove('active');
				document.getElementById(event.popup._container.querySelector('figure').getAttribute('data-post-id')).classList.remove('active');
			}, currentMap);
		}


	};

	try {
		var options = {
			get passive() {
				passiveSupported = true;
			}
		};

		var orientation = function(event) {
			if ( event.matches ) {
				leafletMaps();
			}
		}

		window.addEventListener('load', leafletMaps, options);

		mqMin768.addListener(orientation);
		orientation(mqMin768);
	}
	catch( error ) {
		passiveSupported = false;

		console.log( 'Error: ' + error.name + '; Message: ' + error.message );
	}
}( window, document ));

	// var Maps = function(event) {
	// 	if ( typeof canvas !== 'undefined' ) {
	// 		var markers = Array.prototype.slice.call( canvas.getElementsByTagName('figure') );

	// 		if ( !Array.isArray( markers ) || markers.length === 0 )
	// 			return;

	// 		var viewport = {
	// 				nw: {
	// 					lat: parseFloat( 35.11254 ),
	// 					lng: parseFloat( -83.10713 )
	// 				},
	// 				se: {
	// 					lat: parseFloat( 35.1115 ),
	// 					lng: parseFloat( -83.10665 )
	// 				}
	// 			};
	// 		var restrictionArgs = {
	// 				latLngBounds: {
	// 					north: viewport.nw.lat,
	// 					south: viewport.se.lat,
	// 					west: viewport.nw.lng,
	// 					east: viewport.se.lng
	// 				},
	// 				strictBounds: true
	// 			};
	// 		var boundsArgs = {
	// 				sw: new google.maps.LatLng( viewport.nw.lat, viewport.nw.lng ),
	// 				ne: new google.maps.LatLng( viewport.se.lat, viewport.se.lng )
	// 			};

	// 		// console.log( 'lat: ' + viewport.nw.lat + ' lng: ' + viewport.nw.lng );

	// 		var bounds = new google.maps.LatLngBounds(),
	// 			// restriction = new google.maps.MapRestriction( restrictionArgs ),
	// 			markerSize = new google.maps.Size(35, 32),
	// 			markerAnchor = new google.maps.Point(0, 32),
	// 			markerPoint = new google.maps.Point(0, 0);
	// 		var centerCoords = {
	// 				lat: parseFloat( markers[0].dataset['map-lat'] ),
	// 				lng: parseFloat( markers[0].dataset['map-lng'] )
	// 			};
	// 		var defaults = {
	// 				disableDefaultUI: true,
	// 				zoomControl: true,
	// 				scrollwheel: false,
	// 				// strictBounds: false,
	// 				center: new google.maps.LatLng( centerCoords ),
	// 				styles: data.style,
	// 				zoom: 16
	// 			};

	// 		var map = new google.maps.Map( canvas, defaults );

	// 		// map.setOptions( defaults );
	// 		// map.panTo( defaults.center );

	// 		for( var i = 0, len = markers.length; i < len; i++ ) {
	// 			// console.log( markers[i] );

	// 			var content = markers[i].innerHTML,
	// 				title = markers[i].querySelector('h6').textContent,
	// 				markerCoords = {
	// 					lat: parseFloat( markers[i].dataset['map-lat'] ),
	// 					lng: parseFloat( markers[i].dataset['map-lng'] )
	// 				},
	// 				position = new google.maps.LatLng( markerCoords );

	// 			// Extends this bounds to contain the given point.
	// 			// bounds.extend( position );

	// 			var icon = {
	// 				url: data.pin,
	// 				size: markerSize,
	// 				origin: markerPoint,
	// 				anchor: markerAnchor
	// 			};
	// 			// var icon = new google.maps.Icon( iconArgs );

	// 			var markerArgs = {
	// 				map: map,
	// 				// icon: icon,
	// 				title: title,
	// 				position: position,
	// 				// anchorPoint: markerAnchor,
	// 				opacity: 0.75
	// 				// zIndex: markers[i]
	// 			};
	// 			var marker = new google.maps.Marker( markerArgs );

	// 			var infoArgs = {
	// 				title: title,
	// 				content:  content,
	// 				position: position,
	// 				pixelOffset: new google.maps.Size(markerSize / 2, 0),
	// 				maxWidth: 375
	// 				// zIndex: markers[i]
	// 			};
	// 			var info = new google.maps.InfoWindow( infoArgs );

	// 			// marker.addListener('click', function(event) {
	// 			// 	var markerPosition = marker.getPosition();

	// 			// 	info.close( map );

	// 			// 	map.setCenter( markerPosition );
	// 			// 	map.panTo( markerPosition );

	// 			// 	if ( map.idle ) {
	// 			// 		info.open( map, marker );
	// 			// 	}
	// 			// });
	// 			// var idleListener = map.addListener('idle', function(event) {
	// 				// map.panBy( 0, -200 );
	// 				// map.setZoom( map.getZoom() + 2 );
	// 			// });
	// 			// idleListener.remove();
	// 		}

	// 		// map.fitBounds( bounds, 50 );
	// 	}

			// only 1 marker?
			// if ( $markers.length === 1 ) {
				// set center of map
				// map.setCenter( bounds.getCenter() );
				// map.setZoom( 16 );
			// }
			// if multiple markers ...
			// else {
				// fit to bounds
				// map.fitBounds( bounds );

				// var listener = map.addListener('idle', function() {
					// map.panBy(0, -150);
					// map.setZoom(map.getZoom() - 1);
					// google.maps.event.removeListener(listener);
				// });
			// }
			// });
			// console.log(infoOpts);

			// $markers.each( function( index, marker ) {
			// var $marker = $( markerEl );
			// var $markerTitle = $marker.find('h6').html();
			// var $markerContent = $marker.html();
			// var $markerLat = parseFloat( $marker.data('map-lat') );
			// var $markerLng = parseFloat( $marker.data('map-lng') );
			// var latlng = new google.maps.LatLng({ lat: $markerLat, lng: $markerLng });

			// create new Google Maps marker object
