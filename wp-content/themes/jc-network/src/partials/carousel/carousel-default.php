<?php
$post = null;

$posts = get_posts( array(
'post_type'        => $carousel_type,
'post_parent'      => $parent,
'posts_per_page'   => -1,
'orderby'          => 'menu_order',
'order'            => 'ASC',
'post_status'      => 'publish' ) ); 

$c_args = array(
	'width'              => 525,
	'height'             => 525,
	'crop'               => true,
	'jpeg_quality'       => 80,
);?>

<section class="uk-container uk-container-center section-spacing">
	<h2 class="uk-text-center section-heading"><?php echo $carousel_title; ?></h2>
	
	<div class="uk-slidenav-position" data-uk-slider>
		<div class="uk-slider-container">
			<div class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-2 uk-grid-width-1-1 carousel-tiles">
			<?php
			foreach($posts as $post) :
			
			$post_id = $post->ID;
			
			$thumb_id  = get_post_meta( $post_id, 'tile_image', true );
			$thumbnail = wp_get_attachment_image_src( $thumb_id, $c_args );
			?>
				<div class="carousel-tile">
					<a href="<?php echo get_the_permalink( $post_id ); ?>" class="carousel-link">
						<img src="<?php echo $thumbnail[0]; ?>" class="full-width-image lazyload">
						<h3 class="section-title text-shadow small-shadow"><?php echo $carousel_title; ?></h3>
						<h4 class="sub-section-title overlay-<?php echo $title_color; ?> text-shadow small-shadow"><?php echo get_the_title( $post_id ); ?></h4>
					</a>
				</div>
			<?php endforeach; ?>
			</div>
		</div>

		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
	</div>
</section>

<?php wp_reset_postdata(); ?>