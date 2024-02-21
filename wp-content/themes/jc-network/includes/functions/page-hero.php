<?php


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

		<header class="jc-hero no-print" style="max-height:var(--hero-height)">
			<figure class="uk-cover uk-position-relative">
				<img src="<?= $image_url ?>" alt="<?= $image_alt ?>" width="1600" height="525" class="uk-cover-object uk-position-absolute" style="display: block;object-fit: cover;aspect-ratio: 3/1;width: 100%;height: auto;" loading="lazy" decoding="async">
				<?php if ( $page_title ) : ?>
				<figcaption class="uk-position-cover uk-flex uk-flex-center uk-flex-middle">
					<div><h1 class="text-script text-white text-shadow"><?= esc_html( $page_title ) ?></h1></div>
				</figcaption>
				<?php endif ?>
			</figure>
		</header>

		<?php return ob_get_clean();

	}

endif;
