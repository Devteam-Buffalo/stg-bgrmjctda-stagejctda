<?php
/*
**  @file               carousel.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/12/18
*/
defined( 'ABSPATH' ) || exit;

$args = [
	'post_type'        => get_post_type(),
	'post_parent'      => 0,
	'posts_per_page'   => 12,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_status'      => 'publish'
];

$posts = new WP_Query( $args );

if ( $posts->have_posts() ) : ?>
<div class="uk-block">
	<?php $object = get_post_type_object( get_post_type() ); ?>
	<h3 class="uk-text-center"><?= is_object( $object ) ? $object->labels->name : get_the_title() ?></h3>
	
	<div class="uk-slidenav-position" data-uk-slider>
		<div class="uk-slider-container">
			<div class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-2 uk-grid-width-1-1 carousel-tiles">
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<div class="carousel-tile">
					<a href="<?= get_the_permalink() ?>" class="carousel-link">
						<img src="<?= wpthumb( wp_get_attachment_image_url( get_field( 'tile_image', get_the_id() )['url'], 'full', false ), ['width'=>525,'height'=>525,'resize'=>true,'crop'=>true] ) ?>" class="full-width-image lazyload">
						<h3 class="section-title text-shadow small-shadow"><?= $object->labels->name ?></h3>
						<h4 class="sub-section-title color-<?= get_post_type() ?> text-shadow small-shadow"><?= get_the_title() ?></h4>
					</a>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>

		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
	</div>
</div>
<?php endif ?>