<?php
/*
**  @file               tile-discover.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

$include = array(
	'outdoors',
	'attractions',
	'food-drink',
	'lodging',
);

$posts = get_posts( array(
	'post_type'        => 'page',
	'include'          => $include,
	'posts_per_page'   => 4,
	'orderby'          => 'date menu_order',
	'order'            => 'DESC',
	'post_status'      => 'publish'
) ); 

$t_args = array(
	'width'              => 525,
	'height'             => 525,
	'crop'               => true,
	'jpeg_quality'       => 80,
);?>

<section class="uk-container uk-container-center section-spacing lazyload">
	<h2 class="uk-text-center section-heading">Discover Jackson County</h2>

	<div class="uk-slidenav-position" data-uk-slider>
		<div class="uk-slider-container">
			<div class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-small-1-2 uk-grid-width-1-1 content-tiles child-section-tiles four-tiles" data-uk-grid-match>
			<?php foreach( $posts as $post ) :
				$image_urls = get_post_meta( $post->ID, 'image_urls', true );
				$image_urls = $image_urls ? explode('|', $image_urls) : false; 

				$disc_img = wpthumb($image_urls[0],$t_args);

				if( $disc_img ) : ?>
	
					<div class="content-tile">
						<figure class="uk-overlay lazyload" style="background-image: url(<?php echo $disc_img; ?>); background-size: cover;">
							<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="<?php the_title(); ?>" width="525" height="525" class="full-width-image lazyload">
							
							<noscript><img src="<?php echo $disc_img; ?>" alt="<?php the_title(); ?>" width="525" height="" class="full-width-image lazyload"></noscript>
			
							<figcaption class="uk-overlay-panel">
								<span class="overlay-content">
									<h3 class="section-title">&nbsp;</h3>
									<h4 class="sub-section-title overlay-title overlay-green"><?php the_title(); ?></h4>
								</span>
							</figcaption>
			
							<a class="uk-position-cover" href="<?php the_permalink(); ?>">&nbsp;</a>
						</figure>
					</div>
				
				<?php
				endif;
				
			endforeach;
			
			wp_reset_postdata();
			?>
			</div>
		</div>

		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous uk-hidden-large" data-uk-slider-item="previous"></a>
		<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next uk-hidden-large" data-uk-slider-item="next"></a>
	</div>
</section>