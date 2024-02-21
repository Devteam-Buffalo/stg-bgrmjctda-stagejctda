<?php
/**
 * Template Name:      ✓ Favorite Views
 * Template Post Type: page, outdoor, attraction, town, wedding, jc_trip_idea, jc_visitor_gallery
 * Project Name:       Discover Jackson NC
 * Project URI:        https://www.discoverjacksonnc.com
 * Description:        A page template for displaying a panoramic gallery of photos.
 * Agency:             Rawle Murdy Associates
 * Agency URI:         https://www.rawlemurdy.com
 * Text Domain:        jctda
 *
 * @package            jctda
 * @since              20190804
 * @author             lpeterson
 */

$panos_key = get_page_template_slug();

$panos = get_transient( $panos_key );

if ( false === $panos ) {

	delete_transient( $panos_key );

	$panos = [
		'1' => [
			'link' => get_the_permalink( get_page_by_path( 'blue-ridge-parkway', null, 'outdoor' ) ),
			'caption' => 'Cowee Overlook <br>Blue Ridge Parkway',
		],
		'2' => [
			'link' => get_the_permalink( get_page_by_path( 'blue-ridge-parkway', null, 'outdoor' ) ),
			'caption' => 'Thunderstruck Overlook <br>Blue Ridge Parkway',
		],
		'3' => [
			'link' => get_the_permalink( get_page_by_path( 'blue-ridge-parkway', null, 'outdoor' ) ),
			'caption' => 'Cowee Overlook <br>Blue Ridge Parkway',
		],
		'4' => [
			'link' => get_the_permalink( get_page_by_path( 'high-falls', null, 'outdoor' ) ),
			'caption' => 'High Falls/Cullowhee Falls',
		],
		'5' => [
			'link' => get_the_permalink( get_page_by_path( 'pinnacle-park-trail', null, 'outdoor' ) ),
			'caption' => 'Pinnacle Park',
		],
		'6' => [
			'link' => get_the_permalink( get_page_by_path( 'blue-ridge-parkway', null, 'outdoor' ) ),
			'caption' => 'Cowee Overlook <br>Blue Ridge Parkway',
		],
		'7' => [
			'link' => get_the_permalink( get_page_by_path( 'schoolhouse-falls', null, 'outdoor' ) ),
			'caption' => 'Schoolhouse Falls',
		],
		'8' => [
			'link' => get_the_permalink( get_page_by_path( 'panthertown-valley-trail', null, 'outdoor' ) ),
			'caption' => 'Panthertown Valley',
		],
		'9' => [
			'link' => get_the_permalink( get_page_by_path( 'shadow-of-the-bear', null, 'attraction' ) ),
			'caption' => 'Shadow of the Bear',
		],
		'10' => [
			'link' => get_the_permalink( get_page_by_path( 'whiteside-mountain-trail', null, 'outdoor' ) ),
			'caption' => 'Whiteside Mountain',
		],
	];
	set_transient( $panos_key, $panos, 12 * MONTH_IN_SECONDS );
}

get_header();

while ( have_posts() ) : the_post();
$sidebar = pods_field( get_post_type(), get_the_id(), 'sidebar', true );

if ( has_post_thumbnail() )
	echo jc_page_hero( [ 'post_id' => get_the_id() ] ); ?>

<style>
.uk-modal-page,
.uk-modal-page > body{ position: fixed !important; z-index: 100; top: 0; left: 0; right: 0; bottom: 0; overflow: hidden; padding: 0 !important; margin: 0 !important; width: 100% !important; height: 100% !important }
.uk-modal.uk-open > .uk-modal-dialog,
.uk-modal.uk-open > .uk-modal-dialog > .uk-lightbox-content,
.uk-modal.uk-open > .uk-modal-dialog > .uk-lightbox-content > iframe.uk-responsive-width{ top: 20px !important; right: 20px !important; bottom: 20px !important; left: 20px !important; width: 100% !important; height: 100% !important; margin: 0 !important; padding: 0 !important }
.uk-modal.uk-open > .uk-modal-dialog-lightbox > .uk-close:first-child{top: 20px !important; right: 20px !important;bottom: auto !important; left: auto !important}
</style>

<main class="uk-container uk-container-center">
	<article class="page-article">
		<div class="uk-padding-top uk-margin-bottom uk-hidden-small">
			<?php get_extended_template_part('page', 'intro', [ 'post' => $post ], ['dir' => 'partials']) ?>
		</div>

		<div class="uk-grid uk-grid-large">
			<section class="<?= is_active_sidebar( $sidebar ) ? 'uk-width-large-2-3' : 'uk-width-1-1' ?> page-content print">
				<header class="uk-margin-bottom post-header no-print">
					<div class="uk-visible-small">
						<?php get_extended_template_part('page', 'intro', [ 'post' => $post ], ['dir' => 'partials']) ?>
					</div>
				</header>

				<?php the_content() ?>

				<div class="uk-grid uk-grid-width-1-2 uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-xlarge-1-5 uk-flex">
					<?php foreach ( $panos as $k => $v ) : ?>
					<div>
						<div class="pano-item">
							<a href="<?= JCTDA_TEMPLATE_URL.'/templates/favorite-views/src/'.absint($k).'.html' ?>" title="View a Panoramic View of <?= strip_tags( $v['caption'] ) ?>" data-uk-lightbox="{group:'jc-pano',width:'100%',height:'100%'}" data-lightbox-type="iframe">
								<img src="<?= JCTDA_TEMPLATE_URL.'/templates/favorite-views/thumb/'.absint($k).'.jpg' ?>" alt="<?= strip_tags( $v['caption'] ) ?>" width="225" height="125">
								<span class="uk-icon-search-plus"></span>
							</a>
							<a href="<?= esc_url_raw( $v['link'] ) ?>" title="Find Out More About <?= strip_tags( $v['caption'] ) ?>"><?= $v['caption'] ?></a>
						</div>
					</div>
					<?php endforeach ?>
				</div>

				<?= jc_page_edit() ?>
			</section>

			<?php if ( is_active_sidebar( $sidebar ) ) : ?>
			<aside class="uk-width-large-1-3 page-aside no-print">
				<?php dynamic_sidebar( $sidebar ) ?>
			</aside>
			<?php endif ?>
		</div>
	</article>
</main>

<?php endwhile ?>

<?php get_footer() ?>
