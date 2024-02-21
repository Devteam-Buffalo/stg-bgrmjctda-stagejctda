<?php
/**
 * Template part for displaying single JCTDA board members.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

$jctda_attachment = get_field('jctda_attachment');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('jctda-file-attachment'); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( $jctda_attachment['url'] ) . '" rel="bookmark"><i class="uk-icon-file"></i> ', '</a></h2>' ); ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
