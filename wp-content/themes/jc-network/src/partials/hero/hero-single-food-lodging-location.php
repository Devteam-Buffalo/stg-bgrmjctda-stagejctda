<header class="entry-header">
	<div class="hero-container">
		<div class="hero child-hero">
			<figure class="uk-overlay">
				<?php
				$location_feat_img = get_field( 'featured_photo_img' );
				$location_feat_url = $location_feat_img['id'];
			
				if($location_feat_url) : ?>
				<?php echo wp_get_attachment_image( $location_feat_url, 'full', false, array('class', 'image') ); ?>
				<?php else : ?>
					<div id="single-location-streetview">
						&nbsp;
					</div>
				<?php endif; ?>
				
				<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
					<?php //the_title( '<h1 class="uk-container hero-title text-shadow large-shadow">', '</h1>' ); ?>
				</figcaption>
			</figure>
		</div>
	</div>
</header>
