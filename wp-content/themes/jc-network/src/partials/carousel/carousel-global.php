<?php
$default_pages = array(
	get_the_id( get_page_by_path( 'outdoors', null, 'page' ) ),
	get_the_id( get_page_by_path( 'attractions', null, 'page' ) ),
	get_the_id( get_page_by_path( 'food-drink', null, 'page' ) ),
	get_the_id( get_page_by_path( 'lodging', null, 'page' ) ),
);

// $title   = $title   ?: 'Discover Jackson County';
// $type    = $type    ?: 'page';
// $include = $include ?: $default_pages;
// $number  = $number  ?: '4';
// $parent  = $parent  ?: false;
// $color   = $color   ?: 'green';
// $classes = $classes ?: 'jc-discover-tiles';
// $order   = $order   ?: 'date menu_order';

$title   = 'Discover Jackson County';
$type    = 'page';
$include = $default_pages;
$number  = '4';
$parent  = false;
$color   = 'green';
$classes = 'jc-discover-tiles';
$order   = 'date menu_order';

$tiles = get_posts( array(
	'post_type'      => $type,
	'include'        => $include,
	'post_parent'    => $parent,
	'posts_per_page' => $number,
	'orderby'        => $order,
	'order'          => 'DESC',
	'post_status'    => 'publish'
) );

if( $tiles ) :
$c_args = array(
	'width'              => 525,
	'height'             => 525,
	'crop'               => true,
	'jpeg_quality'       => 80,
);
?>

<section class="uk-block uk-block-default uk-block-large <?php echo 'jc-has-' . $number . '-items '; echo $classes; ?> jc-tiles lazyload">
	<div class="uk-container uk-container-center">
		<h2 class="uk-h3 uk-text-center"><?php echo $title; ?></h2>
	
		<div class="uk-slidenav-position" data-uk-slider="{infinite: false}">
			<div class="uk-slider-container">
				<ul class="uk-slider uk-grid uk-grid-medium uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-1-1 carousel" data-uk-grid-match>
	
				<?php
				foreach($tiles as $tile) : setup_postdata($tile);
					$img_id = get_post_meta( $tile->ID, 'tile_image', true );
					$image  = wp_get_attachment_image_src( $img_id, $c_args );
					
					if( $image ) : ?>
					
					<li>
		
						<figure class="uk-overlay uk-contrast lazyload" style="background-image: url(<?php if( $image[0] ) echo $image[0]; ?>); background-size: cover;">
		
							<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="<?php the_title(); ?>" width="525" height="525" class="full-width-image lazyload">
							
							<noscript><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" width="525" height="" class="full-width-image lazyload"></noscript>
				
							<figcaption class="uk-overlay-panel uk-flex uk-flex-column uk-flex-left uk-flex-top">
								<p class="uk-text-bold uk-text-uppercase uk-text-small uk-text-break uk-margin-remove"><?php echo $title; ?></p>
									
								<h4 class="uk-h4 uk-text-nowrap uk-margin-remove overlay-<?php echo $color; ?>"><?php the_title(); ?></h4>
							</figcaption>
				
							<a class="uk-position-cover uk-overlay" href="<?php the_permalink(); ?>">&nbsp;</a>
		
						</figure>
		
					</li>
		
					<?php
					endif;
					
				endforeach;
				?>
		
				</ul>
			</div>
	
			<?php if( $number > 4 || is_mobile() || is_tablet() ) : ?>
			<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
			<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php
wp_reset_postdata();

endif;