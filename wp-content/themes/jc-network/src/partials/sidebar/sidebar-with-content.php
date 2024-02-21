<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="uk-container uk-container-center">
			<h1 class="uk-margin-large-top text-script" style="font-size: 7rem;"><?php the_title(); ?></h1>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="uk-container uk-container-center">
			<?php the_field( 'page_content' ); ?>
		</div>
	</div><!-- .entry-content -->

	<footer class="screen-reader-text entry-footer">
		<?php
			jc_network_blog_author();
			jc_network_blog_date();
			jc_network_blog_categories();
			jc_network_blog_tags();
			jc_network_edit_post_link();
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->