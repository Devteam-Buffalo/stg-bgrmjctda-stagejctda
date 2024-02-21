// (function( $, window, undefined ) {
// 	'use strict';

// 	var FRONT = function() {
// 		var $body = $('body'),
// 			didScroll,
// 			lastScrollTop = 0,
// 			delta = 5,
// 			$page = $body.find('#page'),
// 			$sticky = $body.find('#sticky-cta'),
// 			$stickyH = $sticky.outerHeight();

// 		$(window).scroll( function( event ) {
// 			didScroll = true;
// 		});

// 		setInterval( function() {
// 			if ( didScroll ) {
// 				hasScrolled();
// 				didScroll = false;
// 			}
// 		}, 250);

// 		function hasScrolled() {
// 			var $thisTop = $(this).scrollTop(),
// 				$windowH = $(window).height(),
// 				$docH = $(document).height();

// 			if ( Math.abs( lastScrollTop - $thisTop ) <= delta ) {
// 				return;
// 			}

// 			if ( $thisTop > lastScrollTop && $thisTop > $stickyH ) {
// 				$page.removeClass('active').addClass('inactive');
// 			}
// 			else {
// 				if ( $thisTop + $windowH < $docH ) {
// 					$page.removeClass('inactive').addClass('active');
// 				}
// 			}

// 			lastScrollTop = $thisTop;
// 		}
// 	};

// 	try {
// 		// $(document).on('ready', function() {
// 			FRONT();
// 		// });
// 	}
// 	catch( error ) {
// 		console.log( 'Error: ' + error.name + '; Message: ' + error.message );
// 	}
// })( jQuery, window );



// $carousel = $body.find( '.carousel' ),
// $lightbox = $body.find( '.lightbox' ),
// $masonry = $body.find( '.masonry-container' ),
// $map = $body.find( '#map' ),
// $markers = $map.children();
// 		UIkit.on( 'beforeready.uk.dom', function() {
// 			$.extend( UIkit.components.slideset.prototype.defaults, {
// 				animation: 'slide-horizontal',
// 				controls: true,
// 				small: 2,
// 				medium: 3,
// 				large: 4,
// 				default: 5
// 			} );

// 			$.extend( UIkit.components.scrollspy.prototype.defaults, {
// 				cls: 'uk-animation-fade',
// 				target: '>*',
// 				delay: 100
// 			} );

// 			$.extend( UIkit.components.dropdown.prototype.defaults, {
// 				mode: 'click',
// 				justify: '.site-header',
// 				pos: 'bottom-center',
// 				boundary: '.site-header',
// 				preventflip: true
// 			} );
// 		} );

// 		$carousel.length && $.each( $carousel, function( index, element ) {
// 			var carousel = UIkit.slideset( element );
// 		});

// 		if ( $lightbox.length )
// 			$lightbox.lightGallery();

// 		if ( $masonry.length && window.matchMedia( '(min-width: 768px)' ).matches )
// 			new rowGrid($masonry, rowGridOptions);

// 		if ( $map.length && window.matchMedia( '(min-width: 768px)' ).matches ) {
// 			googleMapsApi().then( function( google ) {
// 				var $first = $markers.first();

// 				// establish map options and styles
// 				var args = {
// 					center:            {
// 						lat: $.data( $first,'lat' ),
// 						lng: $.data( $first,'lng' )
// 					},
// 					zoom:              14,
// 					zoomControl:       false,
// 					mapTypeControl:    false,
// 					streetViewControl: false,
// 					rotateControl:     false,
// 					scaleControl:      false,
// 					fullscreenControl: true,
// 					styles:            mapData.style
// 				};

// 				var map = new google.Map( $map, {
// 					center: {
// 						lat: 40.7484405,
// 						lng: -73.9944191
// 					},
// 					zoom: 12
// 				})

// 				// establish marker icon source and options
// 				var pin = {
// 					url:        mapData.pin,
// 					size:       new google.maps.Size( 35, 32 ),
// 					scaledSize: new google.maps.Size( 35, 32 ),
// 					origin:     new google.maps.Point( 0, 0 ),
// 					anchor:     new google.maps.Point( 17, 32 )
// 				};

// 				$markers.each( function( index, marker ) {
// 					var $marker = $( marker );

// 					var mark = {
// 						position: {
// 							lat: $.data( $marker,'lat' ),
// 							lng: $.data( $marker,'lng' )
// 						},
// 						map:   map,
// 						icon:  pin,
// 						title: $marker.find( 'h5' ).html()
// 					};

// 					// create new Google Maps marker object
// 					var marker = new google.maps.Marker( mark );

// 					// create new Google Maps infowindow object
// 					var info = new google.maps.InfoWindow();

// 					marker.addListener( 'click', function() {
// 						info.close( marker.get( 'map' ), marker );

// 						info.setOptions( {
// 							content:  $marker.find( 'p' ).html(),
// 							maxWidth: 225
// 						} );

// 						info.open( marker.get( 'map' ), marker );
// 					} );

// 					map.addListener( 'zoom_changed', function() {
// 						info.close( marker.get( 'map' ) );
// 					} );
// 				} );

// 			}).catch(function (error) {
// 				console.error(error)
// 			})
// 		}
// 	};

// 	JC();

// } )( jQuery );


// import $ from "jquery";
// import jQuery from "jquery";

// window.$ = $;
// window.jQuery = jQuery;

// import UIkit from "uikit";

// import rowGrid from "rowgrid";

// import lightGallery from "lightgallery";

// import LazyLoad from "vanilla-lazyload";

// const lazyLoadOptions = {elements_selector: '.lazyload',class_loading: 'lazyloading',class_loaded: 'lazyloaded',class_error: 'lazyerror'};
// const pageLazyLoad = new LazyLoad(lazyLoadOptions);

// const rowGridOptions = {itemSelector: '.masonry-tile',firstItemClass: 'first-item',lastRowClass: 'last-row',minMargin: 20,maxMargin: 40,minWidth: 525};

// const googleMapsApi = require('load-google-maps-api');

