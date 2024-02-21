<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Panoramic photos, aka Favorite Views
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

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
]; ?>

<style>
	.uk-modal-page,
	.uk-modal-page > body{ position: fixed !important; z-index: 100; top: 0; left: 0; right: 0; bottom: 0; overflow: hidden; padding: 0 !important; margin: 0 !important; width: 100% !important; height: 100% !important }
	.uk-modal.uk-open > .uk-modal-dialog,
	.uk-modal.uk-open > .uk-modal-dialog > .uk-lightbox-content,
	.uk-modal.uk-open > .uk-modal-dialog > .uk-lightbox-content > iframe.uk-responsive-width{ top: 20px !important; right: 20px !important; bottom: 20px !important; left: 20px !important; width: 100% !important; height: 100% !important; margin: 0 !important; padding: 0 !important }
	.uk-modal.uk-open > .uk-modal-dialog-lightbox > .uk-close:first-child{top: 20px !important; right: 20px !important;bottom: auto !important; left: auto !important}
</style>

<article class="uk-container uk-container-center" role="article">
	<header>
		<?php the_post_thumbnail() ?>

		<div class="styled-intro"><?= jc_page_intro( $post ) ?></div>
	</header>

	<section>
		<?= jc_page_content( $post ) ?>

		<div class="uk-grid uk-grid-width-1-2 uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-xlarge-1-5 uk-flex">
			<?php foreach ( $panos as $k => $v ) : ?>
			<div>
				<div class="pano-item">
					<a href="<?= get_theme_file_uri( 'app/views/templates/favorite-views/src/'.absint($k).'.html' ) ?>" title="View a Panoramic View of <?= strip_tags( $v['caption'] ) ?>" data-uk-lightbox="{group:'jc-pano',width:'100%',height:'100%'}" data-lightbox-type="iframe">
						<img src="<?= get_theme_file_uri( 'app/views/templates/favorite-views/thumb/'.absint($k).'.jpg' ) ?>" alt="<?= strip_tags( $v['caption'] ) ?>" width="225" height="125">
						<span class="uk-icon-search-plus"></span>
					</a>
					<a href="<?= esc_url_raw( $v['link'] ) ?>" title="Find Out More About <?= strip_tags( $v['caption'] ) ?>"><?= $v['caption'] ?></a>
				</div>
			</div>
			<?php endforeach ?>
		</div>

		<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<hr class="uk-article-divider">', '', get_the_id(), 'uk-button-link' ) ?>
	</section>
</article>
