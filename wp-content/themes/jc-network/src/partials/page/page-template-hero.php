<?php
/**
 * Page template content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php pods_view( 'src/partials/hero/hero-parent.php' ); ?>

	<div class="entry-content">
		<?php pods_view( 'src/partials/content/content-section-intro.php' ); ?>
		
		<div class="uk-container uk-container-center">
			<?php the_field( 'page_content' ); ?>
		</div>
	</div><!-- .entry-content -->

	<footer class="screen-reader-text entry-footer">
		<div class="uk-container uk-container-center">
			<?php 
			if( is_singular( 'outdoor' ) )
				pods_view( 'src/partials/carousel/carousel-outdoors.php' ); 
			?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->