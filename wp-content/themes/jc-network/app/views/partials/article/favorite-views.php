<?php
/*
**  @file               favorite-views.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/4/18
*/
defined( 'ABSPATH' ) || exit; 

$pano = MEDIA . '/wp-content/themes/jc-network/template-parts/pano';
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
					<a href="<?= esc_url_raw( $pano.'/pano/'.absint($k).'.html') ?>" title="View a Panoramic View of <?= strip_tags( $v['caption'] ) ?>" data-uk-lightbox="{group:'jc-pano'}" data-lightbox-type="iframe">
						<img src="<?= esc_url_raw( $pano.'/thumb/'.absint($k).'.jpg') ?>" alt="<?= strip_tags( $v['caption'] ) ?>" width="225" height="125">
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