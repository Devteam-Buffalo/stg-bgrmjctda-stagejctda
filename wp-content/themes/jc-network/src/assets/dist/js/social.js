window.onload = function(){
	var $ = jQuery();
	
	$('.jc-social-likes').find('.jc-social-link').each( function(e) {
		$('.jc-social-link').on( 'click', function() {
			$('.jc-social-like-tooltip').removeClass('visible');
			$(this).next('.jc-social-like-tooltip').addClass('visible');
	
			e.stopPropagation();
		});
	});

	if( $('html').hasClass('uk-notouch') ) {
		$('.social-grid').on('init.uk.scrollspy', function() {
			$('.social-posts-container').socialfeed({
				facebook:{
					accounts: ['@discoverjacksonnc'],
					limit: 12,
					access_token: '553776858160898|e4e234f1f7a665f6e89a9c833fff0b8c'
				},
				
				twitter:{
					accounts: ['@visitjacksonnc'],
					limit: 12,
					consumer_key: 'UP2sYX9dph86eUVgEak61DqqY',
					consumer_secret: 'c4pvt5mDI2f6p3KtvRLuUCL57xYWurmJx5evC67m3mS75E45HR'
				},
				
				instagram:{
					accounts: ['@discoverjacksonnc'],
					limit: 12,
					client_id: 'c2390c82677d47e69ceb4bf8d3a48c89',
					access_token: '994713676.c2390c8.634e5d5944e2442883953f2b45a60ae2'
				},
				
				length: 100,
				show_media: true,
				update_period: 6400,
				template: "/wp-content/themes/jc-network/social-feed.html",
				date_format: "LLLL"
			});

			var socialPosts = $('.social-posts');
			
			var slideset = UIkit.slideset(socialPosts, {
				default: 3,
				small:   1,
				medium:  2,
				large:   3
			});
			
			$('.social-placeholder').remove();
		});
	}
};