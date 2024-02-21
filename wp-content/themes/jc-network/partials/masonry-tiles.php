<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Masonry template part.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190811
 * @author          lpeterson
 */

$children = $this->vars['posts'] ?? $wp_query->posts;
?>

<div class="uk-block no-print">
	<div class="uk-flex uk-flex-wrap uk-flex-wrap-top masonry">
		<?php
		foreach ( $children as $post ) : setup_postdata( $post );
			if ( $post->masonry_image )
				if ( is_array( $post->masonry_image ) && isset( $post->masonry_image['ID'] ) )
					$image = wp_get_attachment_image( $post->masonry_image['ID'], 'masonry', false );
				elseif ( is_numeric( $post->masonry_image ) )
					$image = wp_get_attachment_image( $post->masonry_image, 'masonry', false );
			elseif ( has_post_thumbnail() )
				$image = get_the_post_thumbnail( $post, 'masonry' );
			else
				$image = false;

			if ( $image ) : ?>

			<figure class="--tile --item" data-post-type="<?= get_post_type() ?>">
				<?= $image ?>
				<figcaption>
					<div>
						<h6><?php the_title() ?></h6>
					</div>
				</figcaption>
				<?= wp_sprintf('<a href="%s" title="%s"></a>', get_the_permalink(), the_title_attribute('echo=false') ) ?>
			</figure>

			<?php endif ?>
		<?php endforeach; wp_reset_postdata(); ?>
	</div>
</div>
