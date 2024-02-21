<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('uk-margin-large-bottom'); ?>>
	<header class="entry-header">
		<?php 
		if( has_post_thumbnail($post->ID) ) echo '<div class="featured-image">' . the_post_thumbnail($post->ID) . '</div>';
		
		if( '' !== $post->page_heading ) echo '<h1 class="uk-margin-large-bottom uk-margin-large-top">' . $post->page_heading . '</h1>';
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if( '' !== $post->page_subheading ) echo '<h3 class="uk-text-uppercase section-subheading">' . $post->page_subheading . '</h3>';

		if( '' !== $post->page_intro ) echo '<p class="intro-paragraph">' . $post->page_intro . '</p>';

		if( '' !== $post->page_excerpt ) echo '<blockquote>' . $post->page_excerpt . '</blockquote>';
		
		if( '' !== $post->page_content ) {
			echo apply_filters( 'the_content', $post->page_content );
		}
		
		if( '' !== get_the_content() ) {
			the_content();
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
