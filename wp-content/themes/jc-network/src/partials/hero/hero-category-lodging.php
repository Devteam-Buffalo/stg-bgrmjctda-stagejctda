<?php global $term_id; ?>

<header class="entry-header">
	<div class="hero-container">
		<div class="hero child-hero">
			<figure class="uk-overlay">
				<?php
					$thumb_id = get_field( 'featured_image_category', 'lodging_category_' . $term_id ); 
					if( $thumb_id )
						echo wp_get_attachment_image( $thumb_id, 'full', '', array( 'class' => 'full-width-image lazyload' ) ); ?>
				
				<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
					<h1 class="uk-container hero-title text-shadow large-shadow"><?php single_term_title(); ?></h1>
				</figcaption>
			</figure>
		</div>
	</div>
</header>
