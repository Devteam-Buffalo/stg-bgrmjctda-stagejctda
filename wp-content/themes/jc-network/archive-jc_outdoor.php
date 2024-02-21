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
 * @since           20190209
 * @author          lpeterson
 */

add_action('wp_enqueue_scripts', function() {
	wp_enqueue_style('jctda-dev', JCTDA_TEMPLATE_URL.'/assets/css/frontend/dev.css', [], null, 'screen');
	wp_enqueue_script('jctda-maps', JCTDA_TEMPLATE_URL.'/assets/js/frontend/maps.js', ['wp_leaflet_map'], null, true);
});

$page_slug = substr( pods_v_sanitized('last', 'url'), 3 );
$page_object = get_page_by_path( $page_slug, OBJECT, 'page' );

if ( $page_object )
	$page_hero = pods_field($page_object->post_type, $page_object->ID, 'page_hero', true);

$page_class = ( !empty( $page_hero ) && 'none' !== $page_hero ) ? str_replace( '_', ' ', $page_hero ).' '.$page_slug : $page_slug;

get_header(); ?>

<main <?php post_class( $page_class ) ?>>
	<article>
		<header>
			<?php if ( false !== strpos( $page_class, 'top-hero' ) ) : ?>
			<figure class="uk-margin-bottom-remove cover hero">
				<?php Hybrid\Carbon\Image::display( 'featured' ) ?>
				<?php if ( false !== strpos( $page_class, 'top-title' ) ) : ?>
				<figcaption class="uk-position-cover uk-flex uk-flex-middle uk-flex-center">
					<h1 class="uk-text-center uk-margin-top-remove uk-margin-bottom-remove">
						<?= get_the_title( $page_object->ID ) ?>
					</h1>
				</figcaption>
				<?php endif ?>
			</figure>
			<?php elseif ( false !== strpos( $page_class, 'top-ugc' ) && isset( $page_object->cr_id ) && !empty( $page_object->cr_id ) ) : ?>
			<figure class="uk-margin-bottom-remove uk-position-relative ugc">
				<script id="<?= $page_object->cr_id ?>" src="//starling.crowdriff.com/js/crowdriff.js" async></script>
				<?php if ( false !== strpos( $page_class, 'top-title' ) ) : ?>
				<figcaption class="uk-position-cover uk-flex uk-flex-middle uk-flex-center">
					<h1 class="uk-text-center uk-margin-top-remove uk-margin-bottom-remove">
						<?= get_the_title( $page_object->ID ) ?>
					</h1>
				</figcaption>
				<?php endif ?>
			</figure>
			<?php endif ?>
			<?php //get_extended_template_part('map', 'collection', [ 'posts' => $posts ], ['dir' => 'partials']) ?>
		</header>

		<section class="container --1200">
			<?php get_extended_template_part('page', 'intro', [ 'post' => $page_object ], ['dir' => 'partials']) ?>
			<?php get_extended_template_part('masonry', 'tiles', [ 'posts' => $posts ], ['dir' => 'partials']) ?>
			<?php get_template_part( 'partials/search-body' ) ?>
			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-small signup-event">
				<div>
					<?php get_template_part( 'partials/signup-widget' ) ?>
				</div>
				<div>
					<?php get_template_part( 'tribe-events/widgets/list-widget' ) ?>
				</div>
			</div>
			<?php show($wp) ?>
		</section>

		<footer class="container --1200">
			<?= jc_page_edit() ?>
		</footer>
	</article>
</main>

<?php get_footer() ?>
