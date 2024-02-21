<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('uk-clearfix'); ?>>
	<header class="entry-header">
		<?php if( has_post_thumbnail($post->ID) ) : ?>
		<div class="featured-image">
			<?php the_post_thumbnail($post->ID); ?>
			<span class="post-date"><?php jc_network_blog_date(); ?> </span>
		</div>
		<?php endif; ?>

		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php //jc_network_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'jc-network' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jc-network' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="uk-clearfix blog-post-footer entry-footer">
		<span class="uk-display-inline-block post-categories">Posted in <?php jc_network_blog_categories(); ?> </span>
		<span class="uk-display-inline-block uk-float-right post-share-container"><?php jc_network_share_post(); ?></span>
		<?php if( is_user_logged_in() ) : ?>
		<span class="uk-display-inline-block uk-float-right post-edit"><?php jc_network_edit_post_link(); ?></span>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
