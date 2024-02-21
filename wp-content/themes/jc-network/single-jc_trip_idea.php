<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Single Trip Idea post type template.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20191206
 * @author          lpeterson
 */

get_header();

while ( have_posts() ) : the_post();

if ( $post->cr_id )
	echo jc_cr_hero( [ 'title' => get_the_title(), 'cr_id'=>$post->cr_id ] );
elseif ( has_post_thumbnail() )
	echo jc_page_hero( [ 'title' => get_the_title(), 'post_id' => get_the_id() ] );

?>

<main class="uk-container uk-container-center">
	<article class="page-article">
		<header class="uk-margin-bottom post-header no-print">
			<?= jc_page_intro( get_post() ) ?>
		</header>

		<?= jc_page_content( get_post() ) ?>

		<?= jc_page_edit() ?>
	</article>
</main>

<?php endwhile ?>

<?php get_footer() ?>
