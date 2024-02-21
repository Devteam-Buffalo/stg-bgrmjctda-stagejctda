<?php
/*
**  @file               model-page-hero.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               3/30/18
<figure class="jc-image" data-img-url="<?//= $img['wp']['url'] ?>" data-img-width="<?//= $img['wp']['width'] ?>" data-img-height="<?//= $img['wp']['height'] ?>" data-img-alt="<?//= $img['content']['alt'] ?>" data-img-src="<?//= $img['src']['url'] ?>" data-img-quality="<?//= $img['wp']['quality'] ?>">
	<figcaption class="jc-caption">
	</figcaption>
</figure>
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_page_hero' ) ) :

	function jc_page_hero( $args = [] ) {

		$hero = jc_get_page_hero( $args );

		$image_url  = $hero['image']['url'] ?? false;
		$image_alt  = $hero['image']['alt'] ?? false;
		$img_title  = $hero['image']['title'] ?? false;
		$img_copy   = $hero['image']['copyright'] ?? false;
		$img_credit = $hero['image']['credit'] ?? false;
		$page_title = $hero['page']['title'] ?? false;

		ob_start(); ?>

		<header class="jc-hero no-print">
			<figure class="uk-cover-background uk-cover uk-flex uk-flex-center uk-flex-middle" style="background-image: url(<?= $image_url ?>)"
				<?= $img_copy ? 'data-jc-copyright="'.sanitize_text_field( $img_copy ).'"' : false ?>
				<?= $img_credit ? 'data-jc-credit="'.sanitize_text_field( $img_credit ).'"' : false ?>
				<?= $image_alt ? 'alt="'.sanitize_text_field( $image_alt ).'"' : false ?>
				<?= $img_title ? 'title="'.sanitize_text_field( $img_title ).'"' : false ?>>
				<?= $page_title ? '<h1 class="uk-text-center text-script text-white text-shadow">'.sanitize_text_field( $page_title ).'</h1>' : false ?>
		</figure>
		</header>

		<?php return ob_get_clean();

	}

endif;
