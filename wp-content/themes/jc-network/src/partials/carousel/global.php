<?php 
$post = null;

$posts = get_posts( array(
'post_type'      => $type,
'include'        => $include,
'post_parent'    => $parent,
'posts_per_page' => $number,
'orderby'        => $order,
'order'          => 'DESC',
'post_status'    => 'publish' ) ); 

$c_args = array(
	'width'              => 525,
	'height'             => 525,
	'crop'               => true,
	'jpeg_quality'       => 80,
);
?>

<section class="uk-block uk-block-default uk-block-large <?php echo 'jc-has-' . $number . '-items '; if( $classes ) echo $classes; ?> jc-tiles lazyload">
	<div class="uk-container uk-container-center">
		<?php if( $title ) echo '<h3 class="mountain">' . $title . '</h3>'; ?>
	
		<div class="uk-slidenav-position" data-uk-slider="{infinite: false}"><div class="uk-slider-container">
			<ul class="uk-slider uk-grid uk-grid-medium uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-width-1-1" data-uk-grid-match>
			<?php foreach($posts as $post) :
			$thumb_id  = get_post_meta( $post->ID, 'tile_image', true );
			$thumbnail = wp_get_attachment_image_src( $thumb_id, $c_args ); ?>
			<li>
				<figure class="uk-overlay uk-contrast lazyload" style="background-image: url(<?php if( $thumbnail[0] ) echo $thumbnail[0]; ?>); background-size: cover;">
					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="<?php get_the_title( $post->ID ); ?>" width="525" height="525" class="full-width-image lazyload">
		
					<noscript><img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo get_the_title( $post->ID ); ?>" width="525" class="full-width-image lazyload"></noscript>
		
					<figcaption class="uk-overlay-panel uk-flex uk-flex-column uk-flex-left uk-flex-top">

						<?php if( $title ) echo '<p class="uk-text-bold uk-text-uppercase uk-text-small uk-text-break uk-margin-remove">' . $title . '</p>'; ?>

						<h4 class="uk-h4 uk-text-nowrap uk-margin-remove overlay-<?php if( $color ) echo $color; ?>"><?php echo get_the_title( $post->ID ); ?></h4>
					</figcaption>
		
					<a class="uk-position-cover uk-overlay" href="<?php echo get_the_permalink( $post->ID ); ?>">&nbsp;</a>
				</figure>
			</li>
			<?php endforeach; ?>
			</ul></div>
	
			<?php if( $number > 4 || is_mobile() || is_tablet() ) : ?>
			<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
			<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php wp_reset_postdata(); ?>