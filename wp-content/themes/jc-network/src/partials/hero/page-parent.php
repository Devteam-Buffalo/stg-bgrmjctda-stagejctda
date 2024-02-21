<?php
/*
**  @file               page-parent.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/1/18
*/
defined( 'ABSPATH' ) || exit;

if ( has_post_thumbnail( $post_id ) ) :
	$p_args = [
		'width'              => 1600,
		'height'             => 525,
		'crop'               => true,
		'crop_from_position' => 'center,center',
		'resize'             => true,
		'jpeg_quality'       => 80,
	];
	$t = get_post_thumbnail_id( $post_id );
	$c = get_post_meta( $post_id, 'copyright', true );
	$h = wp_get_attachment_image_url( $t, $p_args, false ); ?>

	<header class="entry-header page-parent-header">
		<div class="hero-container">
			<div class="hero parent-hero jc-hero">
				<figure class="uk-overlay page-parent-hero" style="background-image: url(<?= $h ?>)">
					<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
						<h1 class="uk-text-center script large-script white-text text-shadow large-shadow"><?= get_the_title( $post_id ) ?></h1>
						
						<?php if ( $c ) : ?><p class="uk-margin-remove uk-position-bottom-right uk-contrast uk-text-right uk-text-small"><?= $c ?></p><?php endif ?>
					</figcaption>
				</figure>
			</div>
		</div>
	</header>
<?php endif;