<?php
/*
**  @file               page-hero.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/6/18
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_page_image' ) ) :

	function jc_page_image( $args = null ) {

		if ( post_password_required() ) 
			return;

		$thumbnail_id = $args['ID'] ? get_post_thumbnail_id( $args['ID'] ) : get_post_thumbnail_id( get_queried_object_id() );
		
		$args = wp_parse_args( $args, [
			'image'     => 'figure',
			'caption'   => 'figcaption',
			'class'     => 'uk-thumbnail uk-thumbnail-expand',
			'width'     => 800,
			'height'    => 600,
			'copyright' => false,
			'crop'      => true,
		] );
		$args = apply_filters( 'jc_page_image', $args );
		
		$copyright = ( $args['copyright'] && metadata_exists( 'post', $thumbnail_id, 'copyright' ) ) 
			? get_post_meta( $thumbnail_id, 'copyright', true ) 
			: false;
		$caption = wp_get_attachment_caption( $thumbnail_id );
		
		$image = ipq_get_theme_image( $thumbnail_id, [ [ $args['width'], $args['height'], $args['crop'] ] ], [ 'class' => 'uk-width-1-1 uk-nbfc-alt lazyload' ] );

		ob_start(); ?>
		
		<<?= $args['image'] ?> class="uk-nbfc-alt <?= $args['class'] ?>" <?= $copyright ? 'data-jc-copyright="'.$copyright.'"' : null ?>>
			<?= $image ?>
			<noscript><img src="<?= ipq_get_theme_image_url( $thumbnail_id, [ $args['width'], $args['height'], $args['crop'] ] ) ?>" class="uk-width-1-1 uk-nbfc-alt"></noscript>

			<?php if ( !empty( $caption ) ) : ?>

			<<?= $args['caption'] ?> class="uk-width-1-1 uk-nbfc-alt uk-padding-vertical-small uk-text-center text-sans grey-text">
				<?= $caption ?>
			</<?= $args['caption'] ?>>

			<?php endif ?>
		</<?= $args['image'] ?>>
		
		<?php ob_get_flush();

	}

endif;