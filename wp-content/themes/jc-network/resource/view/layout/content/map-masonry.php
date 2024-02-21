<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Masonry template with optional map shown on parent pages; called by page-template-masonry.php
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181228
 * @author          lpeterson
 */

$post_type = get_post_type( get_post() );
$post_slug = get_post_field( 'post_name', get_post() );
$args = [
	'post_type'              => ( 'page' != $post_type ) ? $post_type : rtrim( $post_slug, 's' ),
	'post_parent'            => ( 'page' != $post_type && has_children() ) ? get_the_id() : 0,
	'post_status'            => ['publish'],
	'posts_per_page'         => 50,
	'order'                  => 'ASC',
	'orderby'                => 'menu_order title date',
	'nopaging'               => false,
	'no_found_rows'          => true,
	'cache_results'          => true,
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
];
$posts = new WP_Query( $args );

if ( $posts->have_posts() ) : ?>

<article class="post-article" role="article">
	<?php if ( metadata_exists( 'post', $post->ID, 'cr_id' ) ) : ?>
		<?php jc_cr_hero( [ 'cr_id' => get_post_meta( $post->ID, 'cr_id', true ), 'title' => get_the_title( $post->ID ) ] ) ?>
	<?php else : ?>
		<?= jc_page_hero( [ 'post_id' => $post->ID ] ) ?>
	<?php endif ?>

	<div class="uk-container uk-container-center">
		<?php if ( 'page' != $post_type && has_children() ) : ?>
			<?php get_template_part( 'resource/view/layout/content/map' ) ?>
		<?php endif ?>

		<?php //if ( isset($post->page_subheading || $post->page_intro) ) : ?>
		<div class="uk-text-center"><?= jc_page_intro( get_post() ) ?></div>
		<?php //endif ?>

		<div class="uk-block">
			<div class="masonry-tiles">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php get_template_part( 'resource/view/layout/content/masonry' ) ?>
			<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>

		<?php get_template_part( 'partials/search-body' ) ?>

		<div class="uk-grid uk-grid-width-small-1-2 uk-grid-small signup-event">
			<div>
				<?php get_template_part( 'partials/signup-widget' ) ?>
			</div>

			<div>
				<?php get_template_part( 'tribe-events/widgets/list-widget' ) ?>
			</div>
		</div>
	</div>
</article>

<?php endif ?>
