<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php pods_view( 'src/partials/content/content-basic-heading.php' ); ?>

	<div class="entry-content">
		<div class="uk-container uk-container-center">
			<?php pods_view( 'src/partials/content/content-sitemap.php' ) ?>
		</div>
	</div><!-- .entry-content -->

	<footer class="screen-reader-text entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
