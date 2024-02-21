<?php
/*
**  @file               excerpts.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

get_header();
	do_action( 'jc_network_before_full_width_content_area' );
		while ( have_posts() ) : the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php if( has_post_thumbnail($post->ID) ) : ?>
				<div class="featured-image">
					<img src="<?php echo get_template_directory_uri(); ?>/inc/template-tags/mthumb.php?src=<?php the_post_thumbnail_url($post->ID); ?>&w=1200&h=600&q=90&a=c&zc=1" alt="<?php the_title(); ?>" width="800" height="400" class="full-size-image">
					<span class="post-date"><?php jc_network_blog_date(); ?> </span>
				</div>
				<?php
					endif;
					
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				?>

				<span class="post-author">Written by <?php jc_network_blog_author(); ?></span>
			</header><!-- .entry-header -->
		
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		
			<footer class="entry-footer">
				<span class="post-categories">Posted in <?php jc_network_blog_categories(); ?> </span>
				<span class="post-tags">and tagged <?php jc_network_blog_tags(); ?></span>
				<span class="post-edit"><?php jc_network_edit_post_link(); ?></span>
			</footer><!-- .entry-footer -->
		</article><!-- #post-## -->
		<?php
		endwhile;
	do_action( 'jc_network_after_full_width_content_area' );
get_footer();
