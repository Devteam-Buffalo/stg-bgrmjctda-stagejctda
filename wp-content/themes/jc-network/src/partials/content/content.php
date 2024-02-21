<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

$feat_img = has_post_thumbnail() ? '<img src="' . wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' ) . '" alt="' . get_the_title() . '">' : false; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('uk-margin-large-bottom'); ?>>
	<header class="entry-header">
		<?php if($feat_img) : ?><div class="featured-image">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php echo $feat_img; ?></a><span class="post-date"><?php jc_network_blog_date(); ?> </span>
		</div><?php endif; ?>
		
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header>
	<div class="entry-content">
		<?php
		if ( is_single() ) :
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'jc-network' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		else :
			the_excerpt();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jc-network' ),
				'after'  => '</div>',
			) );
		endif;
		?>
	</div>
	<footer class="entry-footer">
		<span class="post-categories">Posted in <?php jc_network_blog_categories(); ?> </span><span class="post-tags">and tagged <?php jc_network_blog_tags(); ?></span><span class="post-edit"><?php jc_network_edit_post_link(); ?></span>
	</footer>
</article>