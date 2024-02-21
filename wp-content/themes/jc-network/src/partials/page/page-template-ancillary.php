<?php
/**
 * Page template content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

$thumb_id = get_post_thumbnail_id($post->ID);
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
$thumb_url = $thumb_url_array[0];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="uk-grid" data-uk-grid-match>
			<div class="uk-width-large-2-5 uk-width-1-1 ancillary-hero" style="background-image: url(<?php echo $thumb_url; ?>);">
				&nbsp;
			</div>

			<div class="uk-width-large-3-5 uk-width-1-1 ancillary-content">
				<h1 class="section-heading text-script large-script"><?php the_field('page_heading'); ?></h1>

				<h2 class="uk-text-uppercase section-subheading"><?php the_field('page_subheading'); ?></h2>

				<p class="uk-width-large-3-5 uk-width-1-1 intro-paragraph"><?php the_field('page_intro'); ?></p>
				
				<?php the_field( 'page_content' ); ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="uk-container uk-container-center">
			<?php 
			if( is_singular( 'outdoor' ) )
				pods_view( 'src/partials/carousel/carousel-outdoors.php' ); 
			?>
		</div>
	</div><!-- .entry-content -->

	<footer class="screen-reader-text entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->