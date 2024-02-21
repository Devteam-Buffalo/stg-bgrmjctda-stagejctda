( function( $ ) {
	'use strict';

	var passiveSupported = false,
		mqMin768 = window.matchMedia('(min-width:768px)');

	var JC = function() {
		var lightbox = ( window.lightGallery ) ? $('.lightbox') : false,
			masonry = ( window.justifiedGallery ) ? $('.masonry-tiles') : false,
			search = $('input[type=search]'),
			map = $('.map-markers'),
			h = $('#front-hero h1');

		if ( typeof UIkit !== 'undefined' ) {
			UIkit.on( 'beforeready.uk.dom', function() {
				$.extend( UIkit.components.slideset.prototype.defaults, {
					animation: 'slide-horizontal',
					controls: true,
					small: 2,
					medium: 3,
					large: 4,
					default: 5
				} );
			});
		}

		if ( search ) {
			$(search).on('keyup keypress touchend', function(event) {
				var keyCode = event.keyCode || event.which || event.charCode;

				if ( keyCode == 13 ) {
					event.preventDefault();
				}
			});
		}

		if ( lightbox ) {
			var lgOpts = {
				share:false,
				hash:false,
				zoom:false,
				download:false,
				counter:false,
				fullScreen:false,
				autoplay:false,
				autoplayControls:false,
				loop:false,
				speed:250,
				backdropDuration:100,
				hideControlOnEnd:true,
				mousewheel:false,
				swipeThreshold:100,
				enableDrag:false,
				selector: '.lb'
			};
			$(lightbox).lightGallery(lgOpts);
		}

		if ( masonry && window.matchMedia('(min-width: 768px)').matches ) {
			var masonryOpts = {
				lastRow:'nojustify',
				rowHeight:250,
				maxRowHeight:250,
				margins:35,
				border:0,
				waitThumbnailsLoad:true,
				captions:true,
				refreshSensitivity:20,
				cssAnimation:true
			};
			$(masonry).justifiedGallery(masonryOpts);
		}

		if ( h && typeof Splitting !== 'undefined' && typeof anime !== 'undefined' ) {
			var l = Splitting({ target: h, by: 'chars', whitespace: true }),
				chars = {
					targets: '#front-hero h1 .char',
					opacity: [0,1],
					easing: "easeInOutQuad",
					delay: 3000,
					duration: 750,
					delay: function(el, i) {
						return 150 * (i + 1)
					}
				},
				h1 = {
					targets: '#front-hero h1',
					opacity: 0,
					duration: 1000,
					easing: "easeOutExpo",
					delay: 5000
				};

			anime.timeline({loop: true}).add(chars).add(h1);
		}
	};

	var STICK = function() {
		var top = Math.max(document.body.scrollTop, document.documentElement.scrollTop),
			sticky = $('#sticky');

		if ( top > 220 ) {
			sticky.addClass('stick');
		}
		else {
			sticky.removeClass('stick');
		}
	};


	var MASONRY = function() {
		var container = document.querySelector('.masonry');

		if ( container && typeof rowGrid !== 'undefined' ) {
			rowGrid(container, {
				itemSelector: '.--item',
				firstItemClass: 'first-item',
				lastRowClass: 'last-row',
				minMargin: 30,
				maxMargin: 30,
				minWidth: 275
			});
		}
	};

	var FLICK = function() {
		var $carousel = $('.carousel-tiles');

		if ( $carousel && typeof Flickity !== 'undefined' ) {
			var flickOpts = {
				pageDots: false,
				draggable: false,
				contain: true,
				wrapAround: true,
				cellAlign: 'left',
				arrowShape: {
					x0: 10,
					x1: 60, y1: 50,
					x2: 65, y2: 40,
					x3: 25
				}
			};

			$carousel.flickity( flickOpts );
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
				FLICK();
				MASONRY();
			}
		}

		document.addEventListener('DOMContentLoaded', JC, options);
		// document.addEventListener('DOMContentLoaded', MODAL, options);

		window.addEventListener('scroll', STICK, options);

		mqMin768.addListener(orientation);
		orientation(mqMin768);
	}
	catch( error ) {
		passiveSupported = false;
		console.log( 'Error: ' + error.name + '; Message: ' + error.message );
	}
}( jQuery ));
