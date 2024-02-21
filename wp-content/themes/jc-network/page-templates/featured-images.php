<?php
/**
 * Template Name:   Featured Images
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     A list of featured images with hard-cropped height which need replacements
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181031
 * @author          lpeterson
 */

$all_posts = get_posts([
	'post_type' => 'any',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'post_parent' => null,
]);

get_header();

if ( $all_posts ) : ?>

<article class="uk-container uk-container-center post-article">
	<header>
		<h3>Featured Images with Hard-Cropped Height</h3>
		<p>A list of featured images with hard-cropped height which need full-size originals.</p>
	</header>

	<section>
		<ol>
		<?php
			foreach ( $all_posts as $post ) {
				setup_postdata( $post );

				if ( has_post_thumbnail( $post->ID ) ) {
					$thumbnail_id = get_post_thumbnail_id( $post->ID );
					$metadata = wp_get_attachment_metadata( $thumbnail_id );
					$image_src = wp_get_attachment_image_src( $thumbnail_id, 'full', false );

					if ( isset( $metadata['height'] ) && is_int( $metadata['height'] ) && $metadata['height'] <= 525 ) {
						echo '<li>';
							echo '<details>'.
								'<summary style="display:inline-block;border-bottom:1px dashed blue;cursor:pointer">Post Title: '.get_the_title( $post->ID ).'</summary><br>';

							if ( isset( $image_src[0] ) )
								echo '<img src="'.$image_src[0].'" width="'.$image_src[1].'">';

							if ( isset( $metadata['file'] ) )
								echo '<p>File Name: '.$metadata['file'].'</p>';

							if ( isset( $metadata['width'] ) )
								echo '<p>Width: '.$metadata['width'].'px</p>';

							echo '<p>Height: '.$metadata['height'].'px</p>';

							if ( empty( $metadata['sizes'] ) ) {
								echo '<p>Sizes: Corrupt/Unset; result of ACF bug</p>';
							}
							else {
								foreach ( $metadata['sizes'] as $size )
									echo '<p>Size: '.show($size).'</p>';
							}

							if ( !empty( $metadata['image_meta'] ) ) {
								echo '<p>Metadata:</p>'.
									'<ul>';

								foreach ( $metadata['image_meta'] as $k => $v )
									echo '<li>'.$k.': '.$v.'</li>';

								echo '</ul>';
							}

							echo '</details>';
						echo '</li>';
					}

					echo '</li>';
				}
			}
			wp_reset_postdata();
		?>
		</ol>
	</section>
</article>

<?php

endif;

get_footer();

