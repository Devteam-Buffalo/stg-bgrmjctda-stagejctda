<?php
/**
 * @package jc-network
 */

$link = null;

if( is_post_type_archive( 'media_highlights' ) || is_post_type_archive( 'mentions' ) ) :
	$link = get_field('media_highlight_link');
elseif( is_post_type_archive( 'pr_highlights' ) ) :
	$link = get_field('attachment');
else :
	$link = get_the_permalink();
endif;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('uk-margin-large-bottom media-archive'); ?>>
	<header class="entry-header">
		<?php if( has_post_thumbnail($post->ID) ) : ?>
		<div class="featured-image">
			<?php the_post_thumbnail($post->ID); ?>
			<?php //echo wp_get_attachment_image( $post->ID, array('1200', '600'), false, array('class', 'full-size-image') ); ?>
			<span class="post-date"><?php jc_network_blog_date(); ?> </span>
		</div>

		<?php
		endif;

		the_title( '<h3 class="entry-title"><a href="' . $link . '" rel="bookmark" target="_blank">', '</a></h3>' );
		
		echo '<div>' . get_the_date('m.d.Y') . '</div>';
		?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
