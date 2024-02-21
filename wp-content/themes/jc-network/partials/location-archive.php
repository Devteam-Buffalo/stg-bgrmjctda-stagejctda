<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */


$parent_id = $this->vars['parent_id'] ?? 6021;
$taxonomy  = $this->vars['taxonomy'] ?? 'jc_food_type';
$type      = $this->vars['type'] ?? 'jc_food_drink';
$terms     = $this->vars['terms'] ?? get_terms( ['taxonomy' => $taxonomy, 'hide_empty' => true] );

?>

<main role="main">
	<article class="post-article">
		<?php if ( metadata_exists( 'post', $parent_id, 'cr_id' ) ) : ?>
			<?php jc_cr_hero( [ 'cr_id' => get_post_meta( $parent_id, 'cr_id', true ), 'title' => get_the_title( $parent_id ) ] ) ?>
		<?php else : ?>
			<?= jc_page_hero( [ 'post_id' => $parent_id ] ) ?>
		<?php endif ?>

		<div class="uk-container uk-container-center cr">
			<?= jc_page_intro( get_post( $parent_id ) ) ?>

			<div class="uk-flex uk-flex-wrap uk-flex-wrap-top masonry">
			<?php
			foreach ( (array) $terms as $term ) {
				$urls = get_term_meta( $term->term_id, 'image_urls', true );
				$urls = ( false !== strpos( $urls, '|' ) ) ? explode( '|', $urls ) : [];
				if ( ! isset( $urls[1] ) ) continue;
				$image_url = $urls[1];
				$image_id = attachment_url_to_postid( $image_url );
				$image = wp_get_attachment_image( $image_id, 'masonry', false );
				$term_name = $term->name;
				$term_link = get_term_link( $term );
				$figure = '--tile --item';
				$pattern = '<figure class="%s">%s<figcaption><div><h6>%s</h6></div></figcaption><a href="%s" title="%s"></a></figure>';
				echo wp_sprintf( $pattern, $figure, $image, $term_name, $term_link, $term_name );
			}
			?>
			</div>

			<?php get_template_part( 'partials/search-body' ) ?>

			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-small signup-event">
				<div>
					<?php get_template_part( 'partials/signup-widget' ) ?>
				</div>

				<div>
					<?php get_template_part( 'tribe-events/widgets/list-widget' ) ?>
				</div>
			</div>
		</div>
	</article>
</main>
