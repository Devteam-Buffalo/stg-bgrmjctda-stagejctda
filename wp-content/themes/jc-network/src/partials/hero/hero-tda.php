<header class="entry-header jc-hero">
	<div class="hero-container">
		<div class="hero child-hero">
			<figure class="uk-overlay">
				<?php
					$thumb_id = get_post_thumbnail_id($post->ID);
					$photo_credit = get_field('photo_credit', $thumb_id); 
					if( $thumb_id )
						echo wp_get_attachment_image( $thumb_id, 'full', '', array( 'class' => 'full-width-image lazyload' ) ); ?>
				
				<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
					<h1 class="uk-text-center script large-script white-text text-shadow large-shadow">JCTDA</h1>

					<div class="hero-template-copyright photo-copyright" style="position: absolute; bottom: 20px; right: 20px;">
						<p class="uk-text-small"><?php if( $photo_credit ) echo $photo_credit; ?></p>
					</div>
				</figcaption>
			</figure>
		</div>
	</div>
</header>
