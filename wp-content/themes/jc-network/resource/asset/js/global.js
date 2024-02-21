( function( $, w, d ) {
	'use strict';

	var JC = function() {
		var $html = $( 'html' ),
			$body = $html.find( 'body' ),
			$page = $html.find( '#page' ),
			$carousel = $body.find( '.carousel' ),
			$sticky = $body.find( '.sticky' ),
			$lightbox = $body.find( '.lightbox' ),
			$masonry = $body.find( '.masonry-tiles' ),
			$map = $body.find('.map-markers');

		UIkit.on( 'beforeready.uk.dom', function() {
			$.extend( UIkit.components.slideset.prototype.defaults, {
				animation: 'slide-horizontal',
				controls: true,
				small: 2,
				medium: 3,
				large: 4,
				default: 5
			} );

			$.extend( UIkit.components.scrollspy.prototype.defaults, {
				cls: 'uk-animation-fade',
				target: '>*',
				delay: 100
			} );

			$.extend( UIkit.components.dropdown.prototype.defaults, {
				mode: 'click',
				justify: '.site-header',
				pos: 'bottom-center',
				boundary: '.site-header',
				preventflip: true
			} );
		});

		$body.on( '[role="search"]', 'keyup keypress touchend', function( searchEl ) {
			var keyCode = searchEl.keyCode || searchEl.which;

			if ( keyCode === 13 )
				searchEl.preventDefault();
		});

		$html.hasClass('uk-touch')
			$body.find('.search-header').appendTo('.search-mobile');

		$('.primary-nav-link').on( 'click', function( navEl ) {
			navEl.preventDefault();

			var $thisSubnav = $(this).attr('href');
			var $allSubnavs = $body.find('.mega-subnav');
			var $closeSubnavs = $body.find('.mega-subnav-close');

			$allSubnavs.each( function( index, subnavEl ) {
				if ( $(this).hasClass('visible') )
					$(this).removeClass('visible');
			});

			$($thisSubnav).addClass('visible');

			$closeSubnavs.on( 'click', function( closeEl ) {
				closeEl.preventDefault();

				$allSubnavs.each( function( index, subnavEl ) {
					if ( $(this).hasClass('visible') )
						$(this).removeClass('visible');
				});
			});
		});

		if ( $carousel.length ) {
			$carousel.each( function( index, element ) {
				var carousel = UIkit.slideset( element );
			});
		}

		if ( $lightbox.length )
			$lightbox.lightGallery({'selector':'.lb'});

		if ( $masonry.length && w.matchMedia( '(min-width: 768px)' ).matches ) {
			var masonryOptions = {
				rowHeight          : 250,
				maxRowHeight       : 250,
				lastRow            : 'nojustify',
				margins            : 35,
				border             : 0,
				waitThumbnailsLoad : true,
				captions           : true,
				refreshSensitivity : 20,
				cssAnimation       : true
			};
			$masonry.justifiedGallery( masonryOptions );
		}

		w.onscroll = function() {
			if ( $body.scrollTop > 220 ) {
				$page.addClass('sticky-active');
			}
			else {
				$page.addClass('sticky-active');
			}
		}
	};

	JC();
}(jQuery, window, document));
