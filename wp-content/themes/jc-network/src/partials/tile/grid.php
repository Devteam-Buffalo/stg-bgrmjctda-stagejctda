<?php
/*
**  @file               grid.php
**  @description        Description.
**  @package            public
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/15/17
*/
defined( 'ABSPATH' ) || exit;

if ( $taxonomy && $terms && $quantity && $title ) {
	$g_args = array(
		'width'              => 525,
		'height'             => 525,
		'crop'               => true,
		'jpeg_quality'       => 80,
	);
	
	$args  = array(
		'taxonomy'     => $taxonomy, // array of taxonomies
		'slug'         => $terms,    // array of slugs
		'hierarchical' => false,     // default true
		'number'       => $quantity, // int|string
		'fields'       => 'all_with_object_id',
		'update_term_meta_cache' => false, // default true
	);
	$tiles = get_terms( $args );
	
	if ( $tiles && is_array( $tiles ) ) {
		if ( isset( $tiles[0]->term_id ) && metadata_exists( 'term', $tiles[0]->term_id, 'image_urls' ) ) {
			$large = [
				'img'   => jc_images_exist( jc_explode_data( get_term_meta( $tiles[0]->term_id, 'image_urls', true ) ) )[0],
				'name'  => $tiles[0]->name,
				'url'   => get_term_link( $tiles[0]->term_id, $tiles[0]->taxonomy ),
				'color' => $color,
			];
			
			$grid = [];
			
			foreach( $tiles as $k => $v ) :
				$grid[$k] = [
					'img'   => jc_images_exist( jc_explode_data( get_term_meta( $v->term_id, 'image_urls', true ) ) )[0],
					'name'  => $v->name,
					'url'   => get_term_link( $v->term_id, $v->taxonomy ),
					'color' => $color,
				];
			endforeach; ?>
			
			<section class="uk-container uk-container-center section-spacing">
				<h3 class="mountain"><?php echo $title; ?></h3>
				
				<div class="uk-grid uk-grid-width-large-1-2 uk-grid-width-1-1 content-tiles one-four-grid" data-uk-grid-margin>
					<div class="one-tile">
						<div class="content-tile featured-tile">
							<figure class="uk-overlay">
								<img src="<?php echo wpthumb( $large['img'], $g_args ); ?>" class="content-tile-img full-width-image lazyload">
			
								<figcaption class="uk-overlay-panel">
									<span class="overlay-content">
										<h3 class="section-title"><?php echo $title; ?></h3>
										<h4 class="sub-section-title text-shadow small-shadow overlay-title overlay-<?php echo $large['color']; ?>"><?php echo $large['name']; ?></h4>
									</span>
								</figcaption>
			
								<a class="uk-position-cover" href="<?php echo $large['url']; ?>">&nbsp;</a>
							</figure>
						</div>
					</div>
			
			
					<div class="four-tile-grid">
						<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-margin>
							<?php foreach( $grid as $tile ) : ?>
			
							<div class="one-tile">
								<div class="content-tile featured-tile">
									<figure class="uk-overlay">
										<img src="<?php echo wpthumb( $tile['img'], $g_args ); ?>" class="content-tile-img full-width-image lazyload">
					
										<figcaption class="uk-overlay-panel">
											<span class="overlay-content">
												<h3 class="section-title"><?php echo $title; ?></h3>
												<h4 class="sub-section-title text-shadow small-shadow overlay-title overlay-<?php echo $tile['color']; ?>"><?php echo $tile['name']; ?></h4>
											</span>
										</figcaption>
					
										<a class="uk-position-cover" href="<?php echo $tile['url']; ?>">&nbsp;</a>
									</figure>
								</div>
							</div>
			
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</section>
			
			<?php wp_reset_postdata() ?>
		}
	}
}
