<?php
/*
**  @file               model-carousel-taxonomy.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/19/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_carousel_taxonomy' ) ) :

	function jc_carousel_taxonomy( $taxonomy = null ) {

		$taxonomy = $taxonomy ?? false;

		if ( $taxonomy ) :
			$terms = get_terms( $taxonomy, ['hide_empty=1'] );
			$args  = [ 'width' => 525, 'height' => 525, 'resize' => true, 'crop' => true ];

			if ( is_array( $terms ) && ! empty( $terms ) ) :

			ob_start(); ?>

			<div class="uk-slidenav-position no-print" data-uk-slider="{infinite: false,threshold: 1000}">
				<div class="uk-slider-container">
					<ul class="uk-slider uk-grid uk-grid-medium uk-grid-width-large-1-4 uk-grid-width-medium-1-3 uk-grid-width-1-2" data-uk-grid-match>
					<?php
					foreach ( $terms as $term ) :

						$pods = pods( $term->taxonomy, $term->term_id, true );
						$export = $pods->export();
						$urls = $export['image_urls'];

						if ( isset( $urls ) && ! empty( $urls ) && is_string( $urls ) ) :
							$urls = explode('|', $urls);

							if ( is_array( $urls ) && isset( $urls[0] ) && ( ! empty( $urls[0] ) ) ) :
								$url = esc_url_raw( $urls[0] );
								$thumb = wpthumb( $url, $args ); ?>

								<li class="carousel">
									<figure class="uk-overlay" style="background-image:url(<?= $thumb ?>)">
										<canvas width="525" height="525" tabindex="-1"></canvas>

										<div class="uk-overlay-panel uk-flex uk-flex-top">
											<figcaption>
												<span class="uk-padding-vertical-xsmall uk-padding-horizontal-small sans-thin color-<?= get_post_type() ?> text-shadow"><?= $term->name ?></span>
											</figcaption>
										</div>

										<a class="uk-position-cover" href="<?= esc_url_raw( get_term_link( $term ) ) ?>" title="View More <?= $term->name ?>"></a>
									</figure>
								</li>

								<?php
							endif;
						else :
							return false;
						endif;
					endforeach; ?>

					</ul>
				</div>

				<?php if ( count( $terms ) > 4 ) : ?>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
				<?php endif ?>
			</div>

			<?php ob_get_flush();

			endif;
		endif;

	}

endif;
