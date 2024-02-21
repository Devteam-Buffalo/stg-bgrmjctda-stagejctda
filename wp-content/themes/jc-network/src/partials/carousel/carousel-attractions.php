<section class="uk-container uk-container-center section-spacing lazyload">
	<h2 class="uk-text-center section-heading">Attractions</h2>

	<div class="uk-slidenav-position" data-uk-slider>
		<div class="uk-slider-container">
			<div class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-2 uk-grid-width-1-1 carousel content-tiles child-section-tiles four-tiles">
			<?php
			$posts = get_posts( array(
			'post_type'        => 'attraction',
			'posts_per_page'   => 100,
			'orderby'          => 'date menu_order',
			'order'            => 'DESC',
			'post_status'      => 'publish' ) );
	
			foreach( $posts as $post ) {
				$thumb = get_field('tile_image');
				$img   = wp_get_attachment_image_url( $thumb['id'], 'full' ); ?>
				<div class="content-tile">
					<figure class="uk-overlay lazyload" style="background-image: url(<?php echo $img; ?>); background-size: cover;">
						<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="<?php the_title(); ?>" width="525" height="525" class="full-width-image lazyload">
					<noscript><img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" width="525" height="" class="full-width-image lazyload"></noscript>
		
						<figcaption class="uk-overlay-panel">
							<span class="overlay-content">
								<h3 class="section-title">Attractions</h3>
								<h4 class="sub-section-title overlay-title overlay-yellow"><?php the_title(); ?></h4>
							</span>
						</figcaption>
		
						<a class="uk-position-cover" href="<?php the_permalink(); ?>">&nbsp;</a>
					</figure>
				</div>
			<?php } wp_reset_postdata(); ?>
			</div>
		</div>

		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
	</div>
</section>