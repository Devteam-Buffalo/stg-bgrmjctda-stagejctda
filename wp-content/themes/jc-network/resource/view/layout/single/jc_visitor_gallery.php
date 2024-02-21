<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Visitor Gallery single page
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181211
 * @author          lpeterson
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<main class="uk-container uk-container-center">
	<?php while ( have_posts() ) : the_post(); ?>
	<article class="post-article">
		<header class="uk-padding-bottom"><?= jc_page_intro( $post ) ?></header>

		<section class=" print"><?= jc_page_content( $post ) ?></section>

		<?php edit_post_link( '<span class="uk-icon-pencil uk-icon-justify"></span> Edit this Page', '<footer><hr class="uk-article-divider">', '</footer>', get_the_id(), 'uk-button-link' ) ?>
	</article>
	<?php endwhile ?>
</main>
<?php endif ?>

<?php get_footer() ?>
