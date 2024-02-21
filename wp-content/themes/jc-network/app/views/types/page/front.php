<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Front page of the site.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.1.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/4/18
 * @file            front-page.php
 */
defined('ABSPATH') or exit;

$poster = get_attached_media( 'image/jpeg', $post->ID ); end($poster);
$video = get_attached_media( 'video/mp4', $post->ID ); end($video);

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<figure class="uk-hero">
		<video src="<?= wp_get_attachment_url( $video->ID ) ?>" 
			poster="<?= wp_get_attachment_url( $poster->ID ) ?>"
			playsinline="true"
			loop="true"
			crossorigin="anonymous"
			muted="true"
			autoPlay>
		</video>
		<figcaption data-uk-scrollspy>
			<div class="uk-heading-hero" data-uk-scrollspy>
				<span>W</span><span>e</span><span>l</span><span>c</span><span>o</span><span>m</span><span>e</span><span>&nbsp;</span><span>t</span><span>o</span><span>&nbsp;</span><br><span>J</span><span>a</span><span>c</span><span>k</span><span>s</span><span>o</span><span>n</span><span>&nbsp;</span><span>C</span><span>o</span><span>u</span><span>n</span><span>t</span><span>y</span>
			</div>
		</figcaption>
	</figure>

	<div class="uk-container uk-text-center mountain">
		<?php jc_page_intro() ?>
	</div>

	<div class="uk-container uk-padding-vertical" data-uk-scrollspy>
		<h2 class="uk-text-center mountain">Discover Jackson County</h2>
		<?php jc_post_tiles( [ 'post_type' => 'page', 'post_name__in' => [ 'outdoors', 'attractions', 'food-drink', 'lodging', 'your-trip' ] ] ) ?>
	</div>

	<div class="uk-container uk-padding-vertical-large" data-uk-scrollspy>
		<?php get_template_part( 'resource/view/partial/widget/signup_event' ) ?>
	</div>

	<article <?php post_class('uk-article page-article uk-padding-vertical-large') ?> data-uk-scrollspy>
		<?php jc_page_content() ?>
	</article>

	<div class="uk-container uk-padding-vertical" data-uk-scrollspy>
		<h2 class="uk-text-center mountain">Outdoors</h2>
		<?php jc_post_tiles( [ 'post_type' => 'outdoor', 'posts_per_page' => 30, 'post_parent' => 0 ] ) ?>
	</div>
	
	<div class="uk-container uk-padding-vertical" data-uk-scrollspy>
		<h2 class="uk-text-center mountain">Attractions</h2>
		<?php jc_post_tiles( [ 'post_type' => 'attraction', 'posts_per_page' => 30, 'post_parent' => 0 ] ) ?>
	</div>

	<article <?php post_class('uk-padding-vertical-large') ?> data-uk-scrollspy>
		<figure class="uk-flex uk-flex-middle uk-padding-vertical-large">
			<div class="uk-width-medium-1-2 uk-width-1-1">
				<img src="" data-src="<?= CDN_ASSET .'/img/features/Breweries_FeaturedImage_Half-edit.jpg' ?>" alt="Photo of Jackson County Ale Trail" class="lazyload" draggable="false">
			</div>
			
			<figcaption class="uk-width-large-1-3 uk-width-medium-1-2 uk-width-1-1">
				<div class="uk-padding-horizontal-large">
					<h2>Jackson County Ale Trail</h2>

					<p class="uk-text-large">Whether you enjoy sipping a smooth golden ale, something hoppy or a dark IPA, Jackson County's craft breweries have you covered.</p>

					<p>Not many towns boast walkable brewery tours, but Sylva's Main Street plays host to three breweries in an easily-walkable, scenic one-mile stretch, called the Jackson County Ale Trail.</p>

					<a href="/attractions/brewery-trail/" title="Tour Jackson County Ale Trail" class="uk-button uk-button-large uk-button-secondary" draggable="false">Tour Our Breweries</a>
				</div>
			</figcaption>
		</figure>
	</article>

	<div class="uk-container uk-padding-vertical" data-uk-scrollspy>
		<h2 class="uk-text-center mountain">Food &amp; Drink</h2>

		<div class="grid grid-tiles">
			<?php jc_tax_tiles( [ 'post_type' => 'jc_food_drink', 'taxonomy' => ['jc_food_type','jc_food_amenity'], 'number' => 1, 'offset' => 0, 'meta_key' => 'tile_photo', 'type' => 'grid', 'size' => 'tile_large_size', 'featured' => true ] ) ?>

			<?php jc_tax_tiles( [ 'post_type' => 'jc_food_drink', 'taxonomy' => ['jc_food_type','jc_food_amenity'], 'number' => 4, 'offset' => 1, 'meta_key' => 'tile_photo', 'type' => 'grid', 'size' => 'tile_small_size' ] ) ?>
		</div>
	</div>

	<div class="uk-container uk-padding-vertical" data-uk-scrollspy>
		<h2 class="uk-text-center mountain">Lodging</h2>

		<div class="grid grid-tiles">
			<?php jc_tax_tiles( [ 'post_type' => 'jc_lodging', 'taxonomy' => ['jc_lodging_type','jc_lodging_amenity','jc_lodging_accommodation','jc_camping_amenity'], 'number' => 1, 'offset' => 0, 'meta_key' => 'tile_photo', 'type' => 'grid', 'size' => 'tile_large_size', 'featured' => true ] ) ?>

			<?php jc_tax_tiles( [ 'post_type' => 'jc_lodging', 'taxonomy' => ['jc_lodging_type','jc_lodging_amenity','jc_lodging_accommodation','jc_camping_amenity'], 'number' => 4, 'offset' => 1, 'meta_key' => 'tile_photo', 'type' => 'grid', 'size' => 'tile_small_size' ] ) ?>
		</div>
	</div>

	<div class="uk-container uk-padding-vertical" data-uk-scrollspy>
		<h2 class="uk-text-center mountain">Recent Blog Posts</h2>
		
		<div class="grid overlay-tiles">
			<?php jc_post_tiles( [ 'page' => 1, 'orderby' => 'modified date', 'posts_per_page' => 3, 'type' => 'overlay', 'size' => 'tile_medium_size' ] ) ?>
		</div>
	</div>
<?php endwhile; endif;

get_footer();

// 		$items = get_posts( $args );
		
// 		show(count($items));
		
// 		foreach ( $items as $item ) {
// 			$media = get_attached_media( '', $item->ID );
// 			$media = array_values($media);
// 			foreach ( $media as $attachment ) {
				//wp_delete_attachment( $attachment->ID, true );
// 				show( $attachment );
// 			}
			
			//
			
			
// 			echo '<br><hr><hr><br>';
// 		}
// 			$pod = pods( $item->post_type, $item->ID, true );
			
// 			$urls = get_metadata( 'post', $item->ID, 'featured_photo', true );
			
// 			if ( $urls && !empty($urls) && is_string($urls) ) {
				
// 				$images = explode('|', $urls);
				
// 				if ( $images && is_array($images) ) {
// 					if ( isset($images[0]) ) {
// 						$tile_url = wp_http_validate_url( $images[0] );
// 						$tile_id = pods_attachment_import( $tile_url, $item->term_id, false );
// 						$tile = $pod->add_to( 'tile_photo', $tile_id );
// 						show($tile);
// 					}
					
// 					if ( isset($images[1]) ) {
// 						$masonry_url = wp_http_validate_url( $images[1] );
// 						$masonry_id = pods_attachment_import( $masonry_url, $item->term_id, false );
// 						$masonry = $pod->add_to( 'masonry_photo', $masonry_id );
// 						show($masonry);
// 					}
					
// 					if ( isset($images[2]) ) {
// 						$hero_url = wp_http_validate_url( $urls );
// 						$hero_id = pods_attachment_import( $hero_url, $item->ID, true );
// 						$hero = $pod->add_to( 'hero_photo', $hero_id );
// 						show($hero_id);
// 					}
// 				}
// 			}
			
// 		}
			

			?>

<!--
			<div class="uk-accordion">
				<h2 class="uk-accordion-title">
					<a href="/outdoors/" title="outdoors" class="">
						Outdoors
					</a>
				</h2>
			</div>

			<div class="uk-accordion">
				<h2 class="uk-accordion-title">
					<a href="<?//= get_post_type_archive_link( 'attraction' ) ?>" title="<?//= get_post_type_object( 'attraction' )->labels->name ?>" class="">
						<?//= get_post_type_object( 'attraction' )->labels->name ?>
					</a>
				</h2>
			</div>

			<div class="uk-accordion">
				<h2 class="uk-accordion-title">
					<a href="<?//= get_post_type_archive_link( 'jc_food_drink' ) ?>" title="<?//= get_post_type_object( 'jc_food_drink' )->labels->name ?>" class="">
						<?//= get_post_type_object( 'jc_food_drink' )->labels->name ?>
					</a>
				</h2>
			</div>

			<div class="uk-accordion">
				<h2 class="uk-accordion-title">
					<a href="<?//= get_post_type_archive_link( 'jc_lodging' ) ?>" title="<?//= get_post_type_object( 'jc_lodging' )->labels->name ?>" class="">
						<?//= get_post_type_object( 'jc_lodging' )->labels->name ?>
					</a>
				</h2>
			</div>

			<div class="uk-accordion">
				<h2 class="uk-accordion-title">
					<a href="<?//= get_the_permalink( get_page_by_title( 'Your Trip' ) ) ?>" title="<?//= get_the_title( get_page_by_title( 'Your Trip' ) ) ?>" class="">
						<?//= get_the_title( get_page_by_title( 'Your Trip' ) ) ?>
					</a>
				</h2>
			</div>
			<?php //endif ?>
		</article>
-->
