<?php
/*
**  @file               front-tiles-food.php
**  @description        Description.
**  @package            public
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/14/17
*/
/*

'taxonomy'               => null,
'object_ids'             => null,
'orderby'                => 'name',
'order'                  => 'ASC',
'hide_empty'             => true,
'include'                => array(), // (array|string) Array or comma/space-separated string of term ids to include. Default empty array.
'exclude'                => array(),
'exclude_tree'           => array(),
'number'                 => '',
'offset'                 => '',
'fields'                 => 'all', // (string) Term fields to query for. Accepts: 

'all' (returns an array of complete term objects), 
'all_with_object_id' (returns an array of term objects with the 'object_id' param; only works when the $fields parameter is 'object_ids' ), 
'ids' (returns an array of ids), 
'tt_ids' (returns an array of term taxonomy ids), 
'id=>parent' (returns an associative array with ids as keys, parent term IDs as values), 
'names' (returns an array of term names), 
'count' (returns the number of matching terms), 
'id=>name' (returns an associative array with ids as keys, term names as values), or 
'id=>slug' (returns an associative array with ids as keys, term slugs as values). 
Default 'all'.

'count'                  => false,
'name'                   => '', // (string|array) Optional. Name or array of names to return term(s) for.
'slug'                   => '', // (string|array) Optional. Slug or array of slugs to return term(s) for.
'term_taxonomy_id'       => '', // (int|array) Optional. Term taxonomy ID, or array of term taxonomy IDs, to match when querying terms.
'hierarchical'           => true,
'search'                 => '',
'name__like'             => '',
'description__like'      => '',
'pad_counts'             => false,
'get'                    => '', // (string) Whether to return terms regardless of ancestry or whether the terms are empty. Accepts 'all' or empty (disabled).
'child_of'               => 0,
'parent'                 => '',
'childless'              => false,
'cache_domain'           => 'core',
'update_term_meta_cache' => true, // set false for performance boost
'meta_query'             => '',
'meta_key'               => '',
'meta_value'             => '',
'meta_type'              => '',
'meta_compare'           => '',
);


Array (
    [0] => WP_Term Object (
        [term_id]          => 523
        [name]             => American
        [slug]             => american
        [term_group]       => 0
        [term_taxonomy_id] => 523
        [taxonomy]         => jc_food_type
        [description]      => 
        [parent]           => 0
        [count]            => 32
        [filter]           => raw
    )
)

*/
defined( 'ABSPATH' ) || exit;

$title = 'Food & Drink';

$taxonomy = array(
	'jc_food_type',
);

$terms = array(
	'american',            // American
	'casual-eats',         // Casual Eats
	'coffee-shop-cafe',    // Coffee Shop/Café
	'lighter-fares-tapas', // Lighter Fares/Tapas
	'wine-cocktail-bars',  // Wine & Cocktail Bars
);

$args  = array(
	'taxonomy'     => $taxonomy, // array of taxonomies
	'slug'         => $terms,    // array of slugs
	'hierarchical' => false,     // default true
	'hide_empty'   => false,     // default true
	'fields'       => 'all_with_object_id',
	'update_term_meta_cache' => false, // default true
);
$terms = get_terms( $args );

/*
Array
(
    [img] => Array
        (
            [0] => https://s3.amazonaws.com/jctda-media/2016/10/jctda-food-drink-american-hero-3.jpg
            [1] => https://s3.amazonaws.com/jctda-media/2016/10/jctda-food-drink-american-hero-1.jpg
            [2] => https://s3.amazonaws.com/jctda-media/2016/10/jctda-food-drink-american-hero-2.jpg
        )

    [name] => American
    [url] => https://www.discoverjacksonnc.com/food-drink/type/american/
    [color] => jc_food_type
)
*/

$large = array(
	'img'   => jc_images_exist( jc_explode_data( get_term_meta( $terms[0]->term_id, 'image_urls', true ) ) )[0],
	'name'  => $terms[0]->name,
	'url'   => get_term_link( $terms[0]->term_id, $terms[0]->taxonomy ),
	'color' => $terms[0]->taxonomy,
);


/*
Array
(
    [1] => Array
        (
            [img] => https://s3.amazonaws.com/jctda-media/2016/11/jctda-food-drink-casual-eats-tile.jpg
            [name] => Casual Eats
            [url] => https://www.discoverjacksonnc.com/food-drink/type/casual-eats/
            [color] => jc_food_type
        )

    [2] => Array
        (
            [img] => https://s3.amazonaws.com/jctda-media/2016/10/jctda-lodging-inn-hero-tile.jpg
            [name] => Coffee Shop/Café
            [url] => https://www.discoverjacksonnc.com/food-drink/type/coffee-shop-cafe/
            [color] => jc_food_type
        )

    [3] => Array
        (
            [img] => https://s3.amazonaws.com/jctda-media/2016/11/jctda-food-drink-lighter-fare-tapas-tile.jpg
            [name] => Lighter Fares/Tapas
            [url] => https://www.discoverjacksonnc.com/food-drink/type/lighter-fares-tapas/
            [color] => jc_food_type
        )

    [4] => Array
        (
            [img] => https://s3.amazonaws.com/jctda-media/2016/11/jctda-food-drink-wine-bars-hero-525.jpg
            [name] => Wine & Cocktail Bars
            [url] => https://www.discoverjacksonnc.com/food-drink/type/wine-cocktail-bars/
            [color] => jc_food_type
        )

)
*/
$tiles = $terms; unset( $tiles[0] ); $grid = array();

foreach( $tiles as $key => $value ) :
	$grid[$key] = array(
		'img'   => jc_images_exist( jc_explode_data( get_term_meta( $value->term_id, 'image_urls', true ) ) )[0],
		'name'  => $value->name,
		'url'   => get_term_link( $value->term_id, $value->taxonomy ),
		'color' => $value->taxonomy,
	);
endforeach; ?>

<section class="uk-container uk-container-center section-spacing">
	<h2 class="uk-text-center section-heading"><?php echo $title; ?></h2>
	
	<div class="uk-grid uk-grid-width-large-1-2 uk-grid-width-1-1 content-tiles one-four-grid" data-uk-grid-margin>
		<div class="one-tile">
			<div class="content-tile featured-tile">
				<figure class="uk-overlay uk-contrast lazyload">
					<img src="<?php echo $large['img']; ?>" class="content-tile-img full-width-image lazyload">

					<figcaption class="uk-overlay-panel">
						<span class="overlay-content">
							<h3 class="section-title"><?php echo $title; ?></h3>
							<h4 class="sub-section-title overlay-title overlay-<?php echo $large['color']; ?>"><?php echo $large['name']; ?></h4>
						</span>
					</figcaption>

					<a class="uk-position-cover" href="<?php echo $large['url']; ?>">&nbsp;</a>
				</figure>
			</div>
		</div>


		<div class="four-tile-grid">
			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-margin>
				<?php foreach( $grid as $tile ) : ?>

				<div class="one-tile">
					<div class="content-tile featured-tile">
						<figure class="uk-overlay">
							<img src="<?php echo $tile['img']; ?>" class="content-tile-img full-width-image lazyload">
		
							<figcaption class="uk-overlay-panel">
								<span class="overlay-content">
									<h3 class="section-title"><?php echo $title; ?></h3>
									<h4 class="sub-section-title overlay-title overlay-<?php echo $tile['color']; ?>"><?php echo $tile['name']; ?></h4>
								</span>
							</figcaption>
		
							<a class="uk-position-cover" href="<?php echo $tile['url']; ?>">&nbsp;</a>
						</figure>
					</div>
				</div>

				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>