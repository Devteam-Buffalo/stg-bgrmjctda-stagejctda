<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('media-archive'); ?>>
	<header class="entry-header">
		<?php if( has_post_thumbnail($post->ID) ) : ?>
		<div class="featured-image">
			<img src="<?php the_post_thumbnail_url($post->ID); ?>" alt="<?php the_title(); ?>" width="800" height="400" class="full-size-image">
			<span class="post-date"><?php jc_network_blog_date(); ?> </span>
		</div>
		<?php
		endif;

		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if( is_singular( 'media_highlights' ) ) : ?>
			<a href="<?php the_field('media_highlight_link'); ?>" class="read-more">Read More</a>
		<?php elseif( is_singular( 'images_library' ) ) : ?>
			<a href="<?php the_field('media_highlight_link'); ?>" class="read-more">Read More</a>
		<?php elseif( is_singular( 'press_release' ) ) :
			the_field('page_content');
		elseif( is_singular( 'pr_highlights' ) ) :
			the_field('publication_title');
			the_field('page_content');
		else :
			the_field('page_content');
		endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
