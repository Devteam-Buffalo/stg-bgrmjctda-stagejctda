<?php
/**
 * Template part for displaying single JCTDA board members.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

$image = get_field('image');
$url = $image['url'];
$alt = $image['alt'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('uk-margin-large-bottom jctda-board-member-profile'); ?>>
	<div class="entry-content">
		<?php if( $image ) : ?>
			<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" class="" width="480" height="550">
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<h4><?php the_field('name'); ?></h4>
		<h5><?php the_field('title'); ?></h5>
		<h6><?php the_field('organization'); ?></h6>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
