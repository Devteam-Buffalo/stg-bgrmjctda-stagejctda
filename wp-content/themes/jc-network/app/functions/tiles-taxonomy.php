<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Display taxonomy terms with photos in a grid or as a carousel
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181003
 * @author          lpeterson
 */

if ( ! function_exists( 'jc_tax_tiles' ) ) {

	function jc_tax_tiles( $args = null ) {

		$size = isset( $args['size'] ) ? $args['size'] : 'tile_small_size';
		$type = isset( $args['type'] ) ? $args['type'] : 'carousel';
		$featured = ( isset( $args['featured'] ) && false !== $args['featured'] ) ? true : false;
		$cpt = isset( $args['post_type'] ) ? $args['post_type'] : false;

		ob_start();

		extract( $args, EXTR_SKIP );

		$args = wp_parse_args( $args, [
			'taxonomy'     => $args['taxonomy'],
			'orderby'      => 'count',
			'order'        => 'ASC',
			'hide_empty'   => true,
			'number'       => 30,
			'offset'       => 0,
			'hierarchical' => false,
		]);
		$meta_key = isset( $args['meta_key'] ) ? $args['meta_key'] : 'tile';

		$items = get_terms( $args );

		if ( is_array( $items ) && !empty( $items ) ) :

			if ( 'carousel' == $type ) : ?>
				<div data-uk-slider="{infinite: false,threshold: 1000}">
				<div class="uk-slidenav-position <?= $type ?> no-print">
					<div class="uk-slider-container">
						<ul class="uk-slider uk-grid uk-grid-medium uk-grid-width-large-1-4 uk-grid-width-medium-1-3 uk-grid-width-1-2" data-uk-grid-match>
						<?php
						foreach ( $items as $item ) :

							if ( metadata_exists( 'term', $item->term_id, $meta_key ) ) :

								$thumb = get_term_meta( $item->term_id, $meta_key, true );

								if ( !empty( $thumb ) ) :

									$post_thumbnail_id = $thumb['ID'];

									$data_src = wp_get_attachment_image_url( $post_thumbnail_id, $size, false );
									$class = 'lazyload';
									$alt = get_metadata('post', $post_thumbnail_id, '_wp_attachment_image_alt', true);

									$atts = [
										'src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"',
										'data-src="'.esc_url($data_src).'"',
										'data-size="'.esc_attr($size).'"',
										'class="lazyload"',
										'alt="'.esc_attr(empty($alt)?get_the_title($post_thumbnail_id):$alt).'"',
										'itemprop="image"',
										'width="180"', 'height="180"'
									];
									$html = '<figure class="post-thumbnail">'."\n" .
										'<img ' . implode( ' ', $atts ) . '>'."\n" .
									'</figure>'."\n";

									?>

									<li id="term_id-<?= $item->term_id ?>" class="taxonomy-<?= $item->taxonomy ?> term_slug-<?= $item->slug ?>">
										<div class="uk-overlay uk-cover tile trans-<?= $item->taxonomy ?>">
											<?= $html ?>

											<figcaption class="uk-overlay-panel">
												<!--<div class="tile_type-<?//= $type ?>">-->
													<span class="uk-padding-vertical-xsmall uk-padding-horizontal-small uk-text-large clone text-shadow text-white sans-thin color-<?= $item->taxonomy ?>"><?= $item->name ?></span>
												<!--</div>-->
											</figcaption>

											<a class="uk-position-cover" href="<?= get_term_link( $item->term_id, $item->taxonomy ) ?>" title="View More <?= $item->name ?>"></a>
										</div>
									</li>

								<?php endif;
							endif;
						endforeach; ?>
						</ul>

						<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
						<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
					</div>
				</div>
				</div>
				<?php

			else :

				foreach ( $items as $item ) :

					if ( metadata_exists( 'term', $item->term_id, $meta_key ) ) :

						$thumb = get_term_meta( $item->term_id, $meta_key, true );

						if ( !empty( $thumb ) ) :

							$post_thumbnail_id = $thumb['ID'];

							$data_src = wp_get_attachment_image_url( $post_thumbnail_id, $size, false );
							$class = 'lazyload';
							$alt = get_metadata('post', $post_thumbnail_id, '_wp_attachment_image_alt', true);

							$atts = [
								'src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"',
								'data-src="'.esc_url($data_src).'"',
								'data-size="'.esc_attr($size).'"',
								'class="lazyload"',
								'alt="'.esc_attr(empty($alt)?get_the_title($post_thumbnail_id):$alt).'"',
								'itemprop="image"',
							];
							$html = '<figure class="post-thumbnail">'."\n" .
								'<img ' . implode( ' ', $atts ) . '>'."\n" .
							'</figure>'."\n";

							?>

							<div id="term_id-<?= $item->term_id ?>" class="taxonomy-<?= $item->taxonomy ?> term_slug-<?= $item->slug ?> <?= $featured ? ' featured' : '' ?> no-print">
								<div class="uk-overlay uk-cover tile trans-<?= $item->taxonomy ?>">
									<?= $html ?>

									<?php if ( $featured ) : ?>

									<figcaption class="uk-overlay-panel">
										<div class="tile_type-<?= $type ?>">
											<label class="uk-padding uk-text-center">
												<span class="uk-display-inline-block uk-text-large uk-text-uppercase text-shadow text-white sans-light"><?= $item->name ?></span>
											</label>
											<h3 class="uk-margin-bottom-large"><?= strip_tags( term_description( $item->term_id, $item->taxonomy ) ) ?></h3>
											<button class="uk-button uk-button-large text-white background-<?= $item->taxonomy ?>">View Locations</button>
										</div>
									</figcaption>

									<?php else : ?>

									<figcaption class="uk-overlay-panel">
										<div class="tile_type-<?= $type ?>">
											<span class="uk-padding-vertical-xsmall uk-padding-horizontal-small uk-text-large clone text-shadow text-white sans-light background-<?= $item->taxonomy ?>"><?= $item->name ?></span>
										</div>
									</figcaption>

									<?php endif ?>

									<a class="uk-position-cover" href="<?= get_term_link( $item->term_id, $item->taxonomy ) ?>" title="View More <?= $item->name ?>"></a>
								</div>
							</div>

					<?php endif;

					endif;

				endforeach;

			endif;

		endif;

		wp_reset_postdata();

		ob_get_flush();
	}
}

