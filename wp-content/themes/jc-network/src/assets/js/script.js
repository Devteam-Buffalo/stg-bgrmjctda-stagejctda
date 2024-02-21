;(function($) {
	"use strict";
	
	$(document).ready( function() {
		var visibleClass = 'visible';
	
		var htmlEl = document.documentElement,
			primNavLinkEl = document.getElementsByClassName('primary-nav-link'),
			megaSubnavEl = document.getElementsByClassName('mega-subnav'),
			megaSubnavCloseEl = document.getElementsByClassName('mega-subnav-close'),
			ukSearchEl = document.getElementsByClassName('uk-search'),
			searchHeaderEl = document.getElementsByClassName('search-header'),
			searchMobileEl = document.getElementsByClassName('search-mobile');
	
		$(primNavLinkEl).on( 'click', function(e) {
			e.preventDefault();
	
			$(megaSubnavEl).each( function() {
				if( $(this).hasClass(visibleClass) ) {
					$(this).removeClass(visibleClass);
				}
			});
	
			$(this.getAttribute('href')).toggleClass(visibleClass);
		});
	
		$(megaSubnavCloseEl).on( 'click', function(e) {
			e.preventDefault();
	
			$(this).closest(megaSubnavEl).removeClass(visibleClass);
		});
	
		$(ukSearchEl).on('keyup keypress', function(e) {
			var keyCode = e.keyCode || e.which;
			
			if (keyCode === 13) { 
				e.preventDefault();
				
				return false;
			}
		});
	
		if( $(htmlEl).hasClass('uk-touch') ) {
			$(searchHeaderEl).appendTo(searchMobileEl);
		}
	} );
	
	//SocialShareKit.init();
})(jQuery);