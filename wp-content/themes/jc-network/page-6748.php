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

$args = [
	'post_type' => 'attraction',
	'post_parent' => 0,
	'post_status' => 'publish',
	'posts_per_page' => 100,
	'perm' => 'readable',
	'orderby' => 'menu_order title',
	'order' => 'ASC',
	'no_found_rows' => true,
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
	'lazy_load_term_meta' => true,
];

?>

<?php get_header() ?>

<main>
	<article class="post-article" role="article">
		<style>header.ugc{transform:none}@media(min-width:960px){header.ugc{transform:translateY(-6rem)}}</style>
		<?= $post->cr_id ? jc_cr_hero(['title' => $post->page_heading,'cr_id'=>$post->cr_id]) : jc_page_hero(['title' => $post->page_heading,'post_id'=>$post->ID]) ?>

		<div class="uk-container uk-container-center">
			<div class="uk-text-center">
				<div class="page-intro">
					<h2 class="uk-h1 uk-margin-top-remove uk-margin-bottom-remove uk-text-capitalize"><?= apply_filters( 'the_title', ucwords( strtolower( $post->page_subheading ) ) ) ?></h2>
					<?= apply_filters( 'the_excerpt', $post->page_intro ) ?>
				</div>
			</div>

			<div class="uk-block">
				<?php get_extended_template_part('masonry', 'tiles', ['posts' => get_posts($args)], ['dir' => 'partials']) ?>
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

<?php get_footer() ?>
