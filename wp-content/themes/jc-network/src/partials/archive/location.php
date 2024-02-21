<?php
/*
**  @file               location.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/9/17
*/
defined( 'ABSPATH' ) || exit;

$default   = URI.'src/assets/img/' . $type . '-hero-default.jpg';
$hero_args = array(
	'width'              => 1600,
	'height'             => 525,
	'crop'               => true,
	'jpeg_quality'       => 80,
);

$post_type_page  = is_post_type_archive( 'jc_food_drink' ) ? 6021 : 6019;
$archive_term_id = is_post_type_archive( 'jc_food_drink' ) ? 663 : 664;
$page_heading    = get_post_meta( $parent_id, 'page_heading', true );
$page_subheading = get_post_meta( $parent_id, 'page_subheading', true );
$page_intro      = get_post_meta( $parent_id, 'page_intro', true );
$hero_id         = get_term_meta( $archive_term_id, 'default_media', true )['ID'];
$hero_url        = wp_get_attachment_image_src( $hero_id, 'full' );
$hero_img        = wpthumb( $hero_url[0], $hero_args );

if( $hero_img ) :
	$image_url = $hero_img;
else :
	$image_url = $default;
endif; ?>

<article class="post-article">
	<?= jc_page_hero( [ 'post_id' => $post_type_page ] ) ?>

	<div class="uk-container uk-container-center entry-content">
		<div class="uk-text-center">
			<?= jc_page_intro( get_post($post_type_page) ) ?>
		</div>

		<div class="post-content masonry-container">
			<div class="masonry-tiles">
				<?php foreach( $terms as $term ) :
				$pods   = pods( $taxonomy, $term->term_id );
				$thumbs = $pods->row()['image_urls'];
				$thumbs = jc_explode_data( $thumbs ); ?>
				
				<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="masonry-tile masonry-link" title="View <?php echo $term->name; ?>">
					<img src="<?php echo $thumbs[1]; ?>" alt="<?php echo $term->name; ?> Image" class="masonry-image">
					<h4 class="masonry-title caption caption-visible color-<?php echo $term->taxonomy; ?>"><?php echo $term->name; ?></h4>
				</a>
				
				<?php endforeach; ?>
			</div>
		</div>
		
		<?php wp_reset_postdata() ?>
		
		<?php if ( ! has_children() ) : ?>
		<div class="uk-block"><?php pods_view( 'resource/view/partial/form/search-body.php', compact( array_keys( get_defined_vars() ) ) ) ?></div>
		<?php endif ?>
		
		<?php pods_view( 'resource/view/layout/content/signup-events.php' ) ?>
	</div>
</article>