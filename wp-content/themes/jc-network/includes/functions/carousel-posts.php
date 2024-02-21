<?php
/*
**  @file               model-carousel-posts.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/1/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_carousel_posts' ) ) :

	function jc_carousel_posts( $args = null ) {

		$options = wp_parse_args( $args, [
			'post_type'   => 'page',
			'post_parent' => 0,
			'post_status' => 'publish',
			'include'     => null,
			'numberposts' => 8,
			'orderby'     => 'menu_order',
			'order'       => 'ASC',
		] );

		$items = get_posts( $options );

		if ( is_array( $items ) && ! ( is_wp_error( $items ) && empty( $items ) ) ) :

		ob_start(); ?>
		<div data-uk-slider="{infinite: false,threshold: 1000}">
			<div class="uk-slidenav-position no-print">
				<div class="uk-slider-container">
					<ul class="uk-slider uk-grid uk-grid-medium uk-grid-width-large-1-4 uk-grid-width-medium-1-3 uk-grid-width-1-2" data-uk-grid-match>
						<?php
						foreach ( $items as $item ) :
							$url = wp_get_attachment_image_url( get_post_thumbnail_id( $item->ID ), 'full', false );
							$image = [ 'width' => 525, 'height' => 525, 'resize' => true, 'crop' => true ];
							$thumb = wpthumb( $url, $image );

							if ( $thumb && ! empty($thumb) ) : ?>

							<li class="carousel">
								<figure class="uk-overlay" style="background-image:url(<?= $thumb ?>)">
									<canvas width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" tabindex="-1"></canvas>

									<div class="uk-overlay-panel uk-flex uk-flex-top">
										<figcaption>
											<span class="uk-padding-vertical-xsmall uk-padding-horizontal-small sans-thin color-<?= get_post_type( $item->ID ) ?> text-shadow"><?= get_the_title( $item->ID ) ?></span>
										</figcaption>
									</div>

									<a class="uk-position-cover" href="<?= esc_url_raw( get_permalink( $item->ID ) ) ?>" title="View More <?php the_title_attribute( $item->ID ) ?>"></a>
								</figure>
							</li>

							<?php endif ?>

						<?php endforeach ?>

					</ul>

					<?php if ( count( $items ) > 4 ) : ?>
					<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
					<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
					<?php endif ?>
				</div>
			</div>
		</div>
		<?php
		wp_reset_postdata();

		ob_get_flush();

		endif;

	}

endif;
