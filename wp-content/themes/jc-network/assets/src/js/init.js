/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Main site script
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190102
 * @author          lpeterson
 */

(function( $ ) {
	'use strict';

	var JC = function() {
		var $body = $('body'),
			$carousel = $body.find('.carousel'),
			$sticky = $body.find('.sticky'),
			$lightbox = $body.find('.lightbox'),
			$fluidvid = $body.find('main'),
			$masonry = $body.find('.masonry'),
			$geo = $body.find('#geo'),
			$map = $body.find('#map'),
			$markers = $map.children();

		UIkit.on( 'beforeready.uk.dom', function() {
			$.extend( UIkit.components.slideset.prototype.defaults, {
				animation: 'slide-horizontal',
				controls: true,
				small: 2,
				medium: 3,
				large: 4,
				default: 5
			});

			$.extend( UIkit.components.scrollspy.prototype.defaults, {
				cls: 'uk-animation-fade',
				target: '>*',
				delay: 100
			});

			$.extend( UIkit.components.dropdown.prototype.defaults, {
				mode: 'click',
				justify: '.site-header',
				pos: 'bottom-center',
				boundary: '.site-header',
				preventflip: true
			});
		});

		$carousel.length && $.each( $carousel, function( index, element ) {
			var carousel = UI.slideset( element );
		});

		var stickyArgs = {
			element: $sticky[0],
			wrapper: '<div id="sticky-cta" />',
			stuckClass: 'sticky-active'
		};

		if ( $sticky.length )
			var sticky = new Waypoint.Sticky(stickyArgs);

		var lazyLoadArgs = {
			elements_selector: '.lazyload',
			class_loading: 'lazyloading',
			class_loaded: 'lazyloaded',
			class_error: 'lazyerror'
		};

		if ( 'undefined' !== typeof LazyLoad )
			var lazy = new LazyLoad(lazyLoadArgs);

		$lightbox.length && $lightbox.lightGallery();

		var fluidvidsArgs = {
			// runs querySelectorAll()
			selector: [
				'iframe',
				'object',
				'video'
			],
			// plays videos from these domains
			players: [
				'www.youtube.com',
				'youtu.be',
				'storage.googleapis.com',
				'player.vimeo.com'
			]
		};

		if ( 'undefined' !== typeof fluidvids )
			fluidvids.init(fluidvidsArgs);

		var geocompleteArgs = {
			strictBounds: true,
			location:false,
			mapOptions:{
				zoom:14,
				scrollwheel:false,
				mapTypeId:"roadmap"
			},
			maxZoom:16,
			componentRestrictions: {
				country: 'USA',
				postalCode: '28770'
			}
		};

		$geo.length && $geo.geocomplete( geocompleteArgs );

		if ( $masonry.length && window.matchMedia( '(min-width: 768px)' ).matches ) {

			var rowGridArgs = {
				itemSelector: '.tile',
				firstItemClass: 'first-item',
				lastRowClass: 'last-row',
				minMargin: 20,
				maxMargin: 40,
				minWidth: 525,
				resize: true
			};

			$masonry.rowGrid(rowGridArgs);
		}

		if ( $map.length && window.matchMedia( '(min-width: 768px)' ).matches ) {
			var $first = $markers.first();

			// establish map options and styles
			var args = {
				center:            {
					lat: $.data($first,'lat'),
					lng: $.data($first,'lng')
				},
				zoom:              14,
				zoomControl:       false,
				mapTypeControl:    false,
				streetViewControl: false,
				rotateControl:     false,
				scaleControl:      false,
				fullscreenControl: true,
				styles:            mapData.style
			};

			var map = new google.maps.Map( $map, args );

			// establish marker icon source and options
			var pin = {
				url:        mapData.pin,
				size:       new google.maps.Size(35, 32),
				scaledSize: new google.maps.Size(35, 32),
				origin:     new google.maps.Point(0, 0),
				anchor:     new google.maps.Point(17, 32)
			};

			$markers.each( function( index, marker ) {
				var $marker = $(marker);

				var mark = {
					position: {
						lat: $.data($marker,'lat'),
						lng: $.data($marker,'lng')
					},
					map:   map,
					icon:  pin,
					title: $marker.find('h5').html()
				};

				// create new Google Maps marker object
				var marker = new google.maps.Marker( mark );

				// create new Google Maps infowindow object
				var info = new google.maps.InfoWindow();

				marker.addListener( 'click', function() {
					info.close( marker.get('map'), marker );

					info.setOptions({
						content:  $marker.find('p').html(),
						maxWidth: 225
					});

					info.open( marker.get('map'), marker );
				});

				map.addListener( 'zoom_changed', function() {
					info.close( marker.get('map') );
				});
			});
		}
	};

	JC();

})( jQuery );
