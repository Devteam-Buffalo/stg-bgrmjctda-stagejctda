<?php
/**
 * Page content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('uk-margin-large-bottom'); ?>>
	<?php pods_view( 'src/partials/content/content-basic-heading.php' ); ?>

	<div class="uk-container uk-container-center entry-content">
		<?php the_field( 'page_content' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
