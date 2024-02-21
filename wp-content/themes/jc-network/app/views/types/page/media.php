<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Media Room archive template - a collection of all Media Room posts.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.1.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/6/18
 * @file            media.php
 */
defined('ABSPATH') or exit;

$posts = null;
$types = [ 'press_release', 'b2b_news', 'mentions' ];
$args = [
	'posts_per_page'         => 5,
	'order'                  => 'DESC',
	'orderby'                => 'date',
	'post_status'            => [ 'publish', 'private' ],
	'perm'                   => 'readable',
	'cache_results'          => true,
	'update_post_meta_cache' => true,
	'update_post_term_cache' => false,
];

get_header(); ?>

<div class="uk-container">
	<?php jc_page_intro(['html' => 'header']) ?>
	<hr class="uk-article-divider">
	
	<div class="uk-grid uk-grid-large" data-uk-grid-margin>
		<section class="uk-width-1-1 uk-width-large-2-3">
			<div class="uk-grid" data-uk-grid-margin>
				<?php foreach ( $types as $type ) :
					$number = ( 'mentions' === $type ) ? 10 : $args['posts_per_page'];
					$posts = new WP_Query( wp_parse_args( [ 'post_type' => $type, 'posts_per_page' => $number ], $args )  );
					if ( $posts->have_posts() ) : 
						$name = get_post_type_object( $type )->labels->name; ?>
						<section id="media-<?= $type ?>" class="<?= ( 'mentions' !== $type ) ? 'uk-width-medium-1-2 ' : ' ' ?>uk-width-1-1">
							<?php printf('<h4>%s</h4>', esc_attr( $name ) ) ?>
		
							<ul class="uk-list uk-list-space<?= ( 'mentions' === $type ) ? ' uk-column-medium-1-2 uk-column-1-1' : '' ?>">
								<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
								<li <?php post_class( 'media-room-article' ) ?>>
									<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" class="uk-link-muted">
										<div class="uk-flex uk-margin-bottom-small uk-padding-bottom-small uk-border-bottom">
											<div class="uk-width-1-6 uk-text-center">
												<time datetime="<?php the_time('d') ?>" class="uk-display-block uk-padding-small uk-border background-light-grey">
													<span class="uk-display-block uk-text-small uk-text-uppercase text-grey"><?php the_time('M') ?></span>
													<span class="uk-display-block uk-text-large sans-bold text-blue"><?php the_time('d') ?></span>
												</time>
											</div>
											<div class="uk-width-5-6 uk-padding-left"><?php the_title() ?></div>
										</div>
									</a>
								</li>
								<?php endwhile ?>
							</ul>
		
							<a href="<?= get_post_type_archive_link( $type ) ?>" title="<?= get_post_type_object( $type )->labels->name ?>">Read More <?= get_post_type_object( $type )->labels->name ?> | Archives <i class="uk-icon-angle-right"></i></a>
						</section>
					<?php else : ?>
						<?= wp_kses_post( get_option( 'jc_general_settings_page_not_found' ) ) ?>
					<?php endif ?>
				<?php endforeach; wp_reset_postdata(); ?>
				
				<?php if ( shortcode_exists( 'gravityform' ) ) : ?>
				<div class="uk-width-medium-1-2 uk-width-1-1">
					<?php printf('<h4>%s</h4>', esc_attr( 'Image Library' ) ) ?>

					<?= do_shortcode('[gravityform id="9" title="false" description="true" ajax="true" tabindex="45"]') ?>
				</div>
				<?php endif ?>

				<div class="uk-width-medium-1-2 uk-width-1-1">
					<?php
					printf('<h4>%s</h4>', esc_attr( 'Media Kits &amp; Visits' ) );

					echo wp_kses_post( get_queried_object()->post_content );

					$files = get_attached_media( 'application/pdf', get_queried_object() );

					if ( $files ) :
						foreach ( $files as $file ) : ?>
						<a href="<?= wp_get_attachment_url( $file->ID ) ?>" title="<?php the_title_attribute( $file->ID ) ?>" class="uk-link-muted">
							<div class="uk-flex" style="padding-bottom:1rem;border-bottom:1px solid var(--light-grey)">
								<div class="uk-padding-right-small"><span class="uk-icon-justify uk-icon-file-pdf-o"></span></div>
								<div><?= get_the_title( $file->ID ) ?><br><time class="uk-badge uk-badge-primary" datetime="<?= get_the_date( 'c', $file->ID ) ?>"><?= get_the_date( get_option( 'date_format' ), $file->ID ) ?></time></div>
							</div>
						</a>
						<?php endforeach;
					endif; ?>
				</div>
			</div>
		</section>
		
		<aside class="uk-width-1-1 uk-width-large-1-3">
			<?php dynamic_sidebar( 'jc-media-room-sidebar' ) ?>
		</aside>
	</div>
</div>

<?php get_footer();