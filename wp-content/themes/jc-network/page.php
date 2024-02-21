<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Main single page template for theme.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

get_header();

while ( have_posts() ) : the_post();
$sidebar = pods_field( get_post_type(), get_the_id(), 'sidebar', true );

if ( $post->cr_id )
	echo jc_cr_hero( [ 'title' => get_the_title(), 'cr_id'=>$post->cr_id ] );
elseif ( has_post_thumbnail() )
	echo jc_page_hero( [ 'title' => get_the_title(), 'post_id' => get_the_id() ] );

?>

<main class="uk-container uk-container-center">
	<article class="page-article">
		<div class="uk-padding-top uk-margin-bottom uk-hidden-small">
			<?= jc_page_intro( get_post() ) ?>
		</div>

		<div class="uk-grid uk-grid-large">
			<section class="<?= is_active_sidebar( $sidebar ) ? 'uk-width-large-2-3' : 'uk-width-1-1' ?> page-content print">
				<header class="uk-margin-bottom post-header no-print">
					<div class="uk-visible-small"><?= jc_page_intro( get_post() ) ?></div>
				</header>

				<?= jc_page_content( get_post() ) ?>

				<?= jc_page_edit() ?>
			</section>

			<?php if ( is_active_sidebar( $sidebar ) ) : ?>
			<aside class="uk-width-large-1-3 page-aside no-print">
				<?php dynamic_sidebar( $sidebar ) ?>
			</aside>
			<?php endif ?>
		</div>
	</article>
</main>

<?php endwhile ?>

<?php get_footer() ?>
