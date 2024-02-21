<?php
global $post;

$args = array(
	'post_type'        => $carousel_type,
	'post_parent'      => $parent,
	'posts_per_page'   => -1,
	'orderby'          => 'menu_order',
	'order'            => 'ASC',
	'post_status'      => 'publish' );

$posts = get_posts($args); ?>

<section class="uk-container uk-container-center section-spacing">
	<h2 class="uk-text-center section-heading"><?php echo $carousel_title; ?></h2>
	
	<div class="uk-slidenav-position" data-uk-slider>
		<div class="uk-slider-container">
			<div class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-2 uk-grid-width-1-1 carousel carousel-tiles">
			<?php
			foreach($posts as $post) : setup_postdata($post);
		
			$thumb_array = get_field('tile_image');
			$thumb_id = $thumb_array['id'];
			$img_src_1x = wp_get_attachment_image_url( $thumb_id, 'thumbnail' );
			$img_src_2x = wp_get_attachment_image_url( $thumb_id, 'medium' );
			?>
				<div class="carousel-tile">
					<a href="<?php the_permalink(); ?>" class="carousel-link">
						<img src="<?php echo $thumb_array['url']; ?>" class="full-width-image lazyload">
						<h3 class="section-title text-shadow small-shadow"><?php echo $carousel_title; ?></h3>
						<h4 class="sub-section-title overlay-<?php echo $title_color; ?> text-shadow small-shadow"><?php the_title(); ?></h4>
					</a>
				</div>
			<?php wp_reset_postdata(); endforeach; ?>
			</div>
		</div>

		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
	</div>
</section>
