<?php
/**
 * Template Name:   ☠ Development
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Page template used only for development purposes
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */

// add_action( 'wp_enqueue_scripts', function() {
// 	wp_enqueue_style('jctda-dev', JCTDA_TEMPLATE_URL.'/assets/css/frontend/dev.css', [], null, 'screen');
// 	wp_enqueue_script('jctda-maps', JCTDA_TEMPLATE_URL.'/assets/js/frontend/maps.js', ['wp_leaflet_map'], null, true);
// });

$page_args = [
	'orderby' => 'title',
	'order' => 'ASC',
	// 'perm' => 'readable',
	'post_status' => 'publish',
	// 'no_found_rows' => true,
	// 'update_post_meta_cache' => false,
	// 'update_post_term_cache' => false,
	// 'lazy_load_term_meta' => true,
	// 'ignore_sticky_posts' => false,
	'posts_per_page' => 25,
	'offset' => 125,
];

// $jc_food_drink = get_posts([ 'post_type' => 'jc_lodging' ] + $page_args);


get_header();

// $attachments = [];

// foreach ( $jc_food_drink as $food ) {

// 	if ( !has_post_thumbnail( $food->ID ) ) {

// 		$featured_photo = pods_field( $food->post_type, $food->ID, 'featured_photo', true );

		// if ( 0 < strlen( $featured_photo ) )
			// $attachments[$food->post_title] = pods_attachment_import( esc_url_raw( $featured_photo ), $food->ID, true );

// 	}
// }


// show( $attachments );


get_footer();


// if ( !empty( $page_hero ) && 'none' !== $page_hero )
	// return;
// $sidebar = pods_field( get_post_type(), get_the_id(), 'sidebar', true );
//
// top-hero_top-heading|Featured Image on Top with Page Heading
// top-hero_no-heading|Featured Image on Top without Page Heading
// top-ugc_top-heading|UGC Gallery on Top with Page Heading
// top-ugc_no-heading|UGC Gallery on Top without Page Heading
// side-hero_body-heading|Featured Image on Left with Page Heading in Body
// side-hero_no-heading|Featured Image on Left without Page Heading
// side-ugc_body-heading|UGC Gallery on Left with Page Heading in Body
// side-ugc_no-heading|UGC Gallery on Left without Page Heading
// side-hero_top-ugc_top-heading|Featured Image on Left, UGC Gallery with Page Heading on Top
// side-hero_top-ugc_body-heading|Featured Image on Left, UGC Gallery with Page Heading in Body
// side-hero_top-ugc_no-heading|Featured Image on Left, UGC Gallery without Page Heading
// side-ugc_top-hero_top-heading|UGC Gallery on Left, Featured Image with Page Heading on Top
// side-ugc_top-hero_body-heading|UGC Gallery on Left, Featured Image with Page Heading in Body
// side-ugc_top-hero_no-heading|UGC Gallery on Left, Featured Image without Page Heading


// $classes[] = 'page';





// if ( strpos( 'top-hero', $page_class, true ) ) {
// }
// if ( strpos( 'top-heading', $page_class, true ) ) {
// 	$heading = '<figcaption>'.get_the_title().'</figcaption>';
// 	$hero_args[] = '<div>'.$heading.'</div></figure>';
// }

// 	elseif ( 'no-heading' === $page_hero ) {
// 		$hero_args['before'] = '<figure class="cover no-heading">';
// 		$hero_args['after'] = '</figure>';
// 	}
// 	elseif ( false !== strpos( $page_hero, 'ugc', 3 ) && !empty( $ugc_id = pods_field( get_post_type(), get_the_id(), 'ugc_id', true ) ) ) {
// 		$script = '<script id="'.$ugc_id.'" src="https://starling.crowdriff.com/js/crowdriff.js" async></script>';

// 		if ( 'top_ugc' === $page_hero ) {
// 			$hero_args['before'] = '<figure class="cover top-ugc">';
// 			$hero_args['after'] = '<div>'.$script.'<figcaption>'.get_the_title().'</figcaption></figure>';
// 		}
// 		else {
// 			$hero_args['before'] = '<figure class="cover top-ugc no-heading">';
// 			$hero_args['after'] = '<div>'.$script.'</div></figure>';
// 		}
// 	}
// 	$hero_img = Hybrid\Carbon\Image::image( 'featured', $hero_args );
// }

// show(  );

// if ( has_post_thumbnail() )
	// the_post_thumbnail();



// show( wp_sprintf( '<pre class="uk-scrollable-text">%s</pre>', htmlspecialchars( print_r( $page_hero, true ) ) ) );
// $hero_args = [
// 	'min_width' => 1200,
// 	'min_height' => 525,
// 	'before' => '<figure class="cover hero">',
// 	'after' => '<div><figcaption>'.get_the_title().'</figcaption></figure>'
// ];

// if ( !empty( $page_hero ) && 'none' !== $page_hero )
// 	$page_class = str_replace( '_', ' ', $page_hero );

?>

<!-- <main <?php // post_class( $page_class ) ?>> -->
	<!-- <article> -->
		<!-- <header> -->
			<?php // if ( false !== strpos( $page_class, 'top-hero' ) ) : ?>
			<!-- <figure class="cover hero"> -->
				<?php // Hybrid\Carbon\Image::display( 'featured' ) ?>
				<?php // if ( false !== strpos( $page_class, 'top-title' ) ) : ?>
				<!-- <div class="uk-position-cover uk-flex uk-flex-middle uk-flex-center"> -->
					<!-- <figcaption class="uk-text-center text-script text-white"> -->
						<?php // the_title() ?>
					<!-- </figcaption> -->
				<!-- </div> -->
				<?php // endif ?>
			<!-- </figure> -->
			<?php // if ( false !== strpos( $page_class, 'side-ugc' ) && isset( $post->cr_id ) && !empty( $post->cr_id ) ) : ?>
			<!-- <figure class="uk-position-relative ugc" style="transform: translateY(-80px)"> -->
				<!-- <script id="<?//= $post->cr_id ?>" src="//starling.crowdriff.com/js/crowdriff.js" async></script> -->
				<?php // if ( false !== strpos( $page_class, 'top-title' ) ) : ?>
				<!-- <div class="uk-position-cover uk-flex uk-flex-middle uk-flex-center"> -->
					<!-- <figcaption class="uk-text-center text-script text-white"> -->
						<?php // the_title() ?>
					<!-- </figcaption> -->
				<!-- </div> -->
				<?php // endif ?>
			<!-- </figure> -->
			<?php // endif ?>
		<!-- </header> -->

		<!-- <section> -->
			<?php // if ( false !== strpos( $page_class, 'top-hero' ) ) : ?>
			<!-- <figure class="cover hero" style="transform: translateY(-80px)"> -->
				<?php // Hybrid\Carbon\Image::display( 'featured' ) ?>
				<?php // if ( false !== strpos( $page_class, 'top-title' ) ) : ?>
				<!-- <div class="uk-position-cover uk-flex uk-flex-middle uk-flex-center"> -->
					<!-- <figcaption class="uk-text-center text-script text-white"> -->
						<?php // the_title() ?>
						<!-- Waterfalls -->
					<!-- </figcaption> -->
				<!-- </div> -->
				<?php // endif ?>
			<!-- </figure> -->
			<?php // endif ?>

			<!-- <div class="container --90"> -->
				<?php // get_template_part( 'partials/page-intro' ) ?>

				<?php // get_extended_template_part('map', 'collection', [ 'posts' => $children ], ['dir' => 'partials']) ?>
				<?php // get_extended_template_part('masonry', 'tiles', [ 'posts' => $children ], ['dir' => 'partials']) ?>
				<?php // the_content() ?>
				<?php // show($wp) ?>

				<!-- <footer> -->
					<?//= jc_page_edit() ?>
				<!-- </footer> -->
			<!-- </div> -->
		<!-- </section> -->
	<!-- </article> -->
<!-- </main> -->

