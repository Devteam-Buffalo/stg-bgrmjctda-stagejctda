<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.3.0
 * @link            https://www.discoverjacksonnc.com
 * @author          Lee Peterson
 * @date            6/19/18
 * @file            tiles.php
 */
defined('ABSPATH') or exit;

if ( ! function_exists( 'jc_post_tiles' ) ) {

	function jc_post_tiles( $args = [] ) {
		global $post;

		$size = isset( $args['size'] ) ? $args['size'] : 'tile_small_size';
		$type = isset( $args['type'] ) ? $args['type'] : 'carousel';
		$featured = ( isset( $args['featured'] ) && false !== $args['featured'] ) ? true : false;
		$cpt = isset( $args['post_type'] ) ? $args['post_type'] : false;

		ob_start();

		extract( $args, EXTR_SKIP );

		if ( isset( $args['items'] ) ) {
			$items = $args['items'];
		}
		else {
			$args = wp_parse_args( $args, [
				'post_status'    => 'publish',
				'perm'           => 'readable',
				'orderby'        => 'menu_order title modified',
				'order'          => 'ASC',
			] );

			$items = get_posts( $args );
		}

		if ( is_array( $items ) && !empty( $items ) ) :
			if ( 'carousel' == $type ) : ?>

				<div class="<?= $type ?> no-print">
					<div class="uk-slidenav-position">
						<ul class="uk-slideset uk-grid">
						<?php
						foreach ( $items as $post ) :
							setup_postdata( $post );

							if ( has_post_thumbnail() ) : ?>

							<li id="post_id-<?= $post->ID ?>" class="post_type-<?= $post->post_type ?> post_name-<?= $post->post_name ?>">
								<div class="uk-overlay uk-cover tile trans-<?= $post->post_type ?>">
									<?php the_post_thumbnail( $size ) ?>

									<figcaption class="uk-overlay-panel">
										<div class="tile_type-<?= $type ?>">
											<span class="uk-padding-vertical-xsmall uk-padding-horizontal-small uk-text-large clone text-shadow text-white sans-light background-<?= $post->post_type ?>"><?= $post->post_title ?></span>
										</div>
									</figcaption>

									<a class="uk-position-cover" href="<?php the_permalink() ?>" title="View More <?= esc_attr( $post->post_title ) ?>"></a>
								</div>
							</li>

							<?php endif;
						endforeach; ?>
						</ul>

						<a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
						<a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
					</div>
				</div>

			<?php else :

				foreach ( $items as $post ) :
					setup_postdata( $post );

					if ( 'masonry' == $type && metadata_exists( 'post', $post->ID, 'masonry_photo' ) ) :
						$size = array_rand( ['masonry_small_size', 'masonry_medium_size', 'masonry_large_size'], 1 );

						$thumb = get_metadata( 'post', $post->ID, 'masonry_photo', true );

						if ( !empty( $thumb ) ) :

							$post_thumbnail_id = $thumb['ID'];

							$image = wp_get_attachment_image_src( $post_thumbnail_id, 'full', false );
							$class = 'lazyload';
							//$alt = get_metadata( 'post', $post_thumbnail_id, '_wp_attachment_image_alt', true );

							$atts = [
								//'src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"',
								'src="'.esc_url($image[0]).'"',
								'width="'.$image[1].'"',
								'height="'.$image[2].'"',
								//'data-size="'.esc_attr($size).'"',
								//'class="lazyload"',
								//'alt="'.esc_attr(empty($alt)?get_the_title($post_thumbnail_id):$alt).'"',
								'itemprop="image"',
							];
							$html = '<figure class="post-thumbnail">'."\n" .
								'<img ' . implode( ' ', $atts ) . '>'."\n" .
							'</figure>'."\n";

							?>

							<div id="post_id-<?= $post->ID ?>" class="post_type-<?= $post->post_type ?> post_name-<?= $post->post_name ?> masonry-tile no-print">
								<div class="uk-overlay uk-cover tile trans-<?= $post->post_type ?>">
									<?= $html ?>

									<figcaption class="uk-overlay-panel">
										<div class="tile_type-<?= $type ?>">
											<span class="uk-padding-vertical-xsmall uk-padding-horizontal-small uk-text-large clone text-shadow text-white sans-light background-<?= $post->post_type ?>"><?= $post->post_title ?></span>
										</div>
									</figcaption>

									<a class="uk-position-cover" href="<?php the_permalink() ?>" title="View More <?= esc_attr( $post->post_title ) ?>"></a>
								</div>
							</div>

						<?php endif;

					else :

						if ( has_post_thumbnail() ) : ?>

						<div id="post_id-<?= $post->ID ?>" class="post_type-<?= $post->post_type ?> post_name-<?= $post->post_name ?> no-print">
							<div class="uk-overlay uk-cover tile trans-<?= $post->post_type ?>">
								<?php the_post_thumbnail( $size ) ?>

								<figcaption class="uk-overlay-panel">
									<?php if ( 'overlay' == $type ) : ?>
									<div class="tile_type-<?= $type ?>">
										<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?= wp_http_validate_url( CDN_ASSET."/img/icons/icon-blog.svg" ) ?>" class="uk-display-block uk-margin-bottom-small uk-align-center icon lazyload" width="38">
										<label>
											<time datetime="<?php the_date( 'c' ) ?>" itemprop="datePublished"><?= get_the_date(get_option( 'date_format'),$post->ID) ?></time>
										</label>
										<h3 class="uk-margin-bottom-large uk-margin-top-remove"><?= $post->post_title ?></h3>
										<button class="uk-button uk-button-large uk-button-secondary">Read More</button>
									</div>

									<?php else : ?>

									<div class="tile_type-<?= $type ?>">
										<span class="uk-padding-vertical-xsmall uk-padding-horizontal-small uk-text-large clone text-shadow text-white sans-light background-<?= $post->post_type ?>"><?= $post->post_title ?></span>
									</div>
									<?php endif ?>
								</figcaption>

								<a class="uk-position-cover" href="<?php the_permalink() ?>" title="View More <?= esc_attr( $post->post_title ) ?>"></a>
							</div>
						</div>

						<?php
						endif;
					endif;
				endforeach;
			endif;
		endif;

		wp_reset_postdata();

		ob_get_flush();
	}
}
