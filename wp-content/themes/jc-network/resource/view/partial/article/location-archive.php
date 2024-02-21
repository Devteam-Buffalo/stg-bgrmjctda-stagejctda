<?php
/*
**  @file               location-archive.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/22/18
*/
defined( 'ABSPATH' ) || exit;

$post_type_page  = is_post_type_archive( 'jc_food_drink' ) ? 6021 : 6019;
$archive_term_id = is_post_type_archive( 'jc_food_drink' ) ? 663 : 664; ?>

<style>.map-markers>.map-marker{display:none}.caption .uk-icon-external-link:before{top:-1rem;font-size:1rem}</style>

<article class="post-article">
	<?php if ( metadata_exists( 'post', $post_type_page, 'cr_id' ) ) : ?>
		<?php jc_cr_hero( [ 'cr_id' => get_post_meta( $post_type_page, 'cr_id', true ), 'title' => get_the_title( $post_type_page ) ] ) ?>
	<?php else : ?>
		<?= jc_page_hero( [ 'post_id' => $post_type_page ] ) ?>
	<?php endif ?>

	<div class="uk-container uk-container-center cr">
		<?= jc_page_intro( get_post( $post_type_page ) ) ?>

		<div class="masonry-tiles">
		<?php foreach( $terms as $term ) :
			$pods   = pods( $taxonomy, $term->term_id );
			$thumbs = $pods->row()['image_urls'];
			$thumbs = jc_explode_data( $thumbs ); ?>

			<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="masonry-tile masonry-link" title="View <?php echo $term->name; ?>">
				<img src="<?php echo $thumbs[1]; ?>" alt="<?php echo $term->name; ?> Image" class="masonry-image">
				<h4 class="masonry-title caption caption-visible color-<?php echo $term->taxonomy; ?>"><?php echo $term->name; ?> <?= ( $term->slug == 'zairbnb' ) ? '<span class="uk-icon-external-link"></span>' : '' ?></h4>
			</a>

		<?php endforeach; ?>
		</div>

		<?php wp_reset_postdata() ?>

		<?php get_template_part( 'resource/view/partial/form/search' ,'body' ) ?>

		<div class="uk-block">
			<?php get_template_part( 'resource/view/layout/content/signup', 'events' ) ?>
		</div>
	</div>
</article>
