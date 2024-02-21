<?php
/*
**  @file               front-tiles-lodging.php
**  @description        Description.
**  @package            public
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/14/17
*/
defined( 'ABSPATH' ) || exit;

$title = 'Lodging';
$args  = array(
	'taxonomy'         => array(
		'jc_lodging_type',
		'jc_lodging_accommodation',
	),
	'fields'           => 'id=>name',
	'hierarchical'     => false,
	'hide_empty'       => false,
	'include'          => array(
		588,           // Cabin in jc_lodging_accommodation
		617,           // Great Views in jc_lodging_type
		609,           // Pet Friendly in jc_lodging_type
		618,           // Romantic Getaways in jc_lodging_type
		648,           // Historic in jc_lodging_type
	),
	'number'           => 5,
	'update_term_meta_cache' => false
);
$terms = get_terms( $args );

?>

<section class="uk-container uk-container-center section-spacing">
	<h2 class="uk-text-center section-heading"><?php echo $title; ?></h2>
	
	<div class="uk-grid uk-grid-width-large-1-2 uk-grid-width-1-1 content-tiles one-four-grid" data-uk-grid-margin>
		<?php foreach ( $terms as $key => $value ) :
			if( $key == '588' ) :
			
			$pods   = pods( 'jc_lodging_accommodation', $key );
			$thumbs = $pods->row()['image_urls'];
			$thumbs = jc_explode_data( $thumbs );
			$thumbs = jc_images_exist( $thumbs );
			?>
			<div class="one-tile">
				<div class="content-tile featured-tile">
					<figure class="uk-overlay">
						<img src="<?php echo $thumbs[0]; ?>" class="content-tile-img full-width-image lazyload">
	
						<figcaption class="uk-overlay-panel">
							<span class="overlay-content">
								<h3 class="section-title"><?php echo $title; ?></h3>
								<h4 class="sub-section-title overlay-title overlay-blue"><?php echo $value; ?></h4>
							</span>
						</figcaption>
	
						<a class="uk-position-cover" href="<?php echo get_term_link( $key ); ?>">&nbsp;</a>
					</figure>
				</div>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>

		<div class="four-tile-grid">
			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-margin>
				<?php foreach ( $terms as $key => $value ) :
					if( $key != '588' ) :
					
					$pods   = pods( 'jc_lodging_type', $key );
					$thumbs = $pods->row()['image_urls'];
					$thumbs = jc_explode_data( $thumbs );
					$thumbs = jc_images_exist( $thumbs );
					?>
					<div class="one-tile">
						<div class="content-tile featured-tile">
							<figure class="uk-overlay">
								<img src="<?php echo $thumbs[0]; ?>" class="content-tile-img full-width-image lazyload">
			
								<figcaption class="uk-overlay-panel">
									<span class="overlay-content">
										<h3 class="section-title"><?php echo $title; ?></h3>
										<h4 class="sub-section-title overlay-title overlay-blue"><?php echo $value; ?></h4>
									</span>
								</figcaption>
			
								<a class="uk-position-cover" href="<?php echo get_term_link( $key ); ?>">&nbsp;</a>
							</figure>
						</div>
					</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
