<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Single parent location post template.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190326
 * @author          lpeterson
 */

$post = $this->vars['post'] ?? $wp_query->post;
$children = $this->vars['posts'] ?? $wp_query->posts;

if ( $post->cr_id )
	echo jc_cr_hero( [ 'title' => $post->post_title, 'cr_id'=>$post->cr_id ] );
elseif ( has_post_thumbnail() )
	echo jc_page_hero( [ 'title' => $post->post_title, 'post_id' => $post->ID ] );

?>

<main class="uk-container uk-container-center">
	<article class="page-article">
		<div class="uk-padding-top uk-margin-bottom uk-hidden-small">
			<?php get_template_part( 'partials/post-intro' ) ?>
		</div>

		<section class="page-content print">
			<header class="uk-margin-bottom post-header uk-visible-small">
				<?php get_template_part( 'partials/post-intro' ) ?>
			</header>

			<?= jc_page_content( $post ) ?>

			<?php get_extended_template_part('masonry', 'tiles', ['posts' => $children], ['dir' => 'partials']) ?>

			<?php get_template_part( 'partials/search-body' ) ?>

			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-small signup-event">
				<div>
					<?php get_template_part( 'partials/signup-widget' ) ?>
				</div>

				<div>
					<?php get_template_part( 'tribe-events/widgets/list-widget' ) ?>
				</div>
			</div>

			<div class="uk-block">
				<h3 class="mountain"><?= ucfirst( get_post_type_object( $post->post_type )->labels->name ) ?></h3>
				<?php
				get_extended_template_part('carousel', 'tiles', [
					'post_type' => $post->post_type,
					'posts_per_page' => 6,
					'orderby' => 'menu_order',
				], ['dir' => 'partials']);
				?>
			</div>

			<?= jc_page_edit() ?>
		</section>
	</article>
</main>
