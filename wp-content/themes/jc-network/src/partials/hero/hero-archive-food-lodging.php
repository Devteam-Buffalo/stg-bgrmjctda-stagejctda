<?php
/*
**  @file               hero-archive-food-lodging.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/10/17
*/
defined( 'ABSPATH' ) || exit; ?>

<header class="entry-header archive-location-header">
	<div class="hero-container">
		<div class="hero child-hero">
			<figure class="uk-overlay archive-location-hero <?php echo $post->post_name; ?>" style="background-image: url(<?php echo $image_url; ?>);">
				<figcaption class="uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
					<?php the_title( '<h1 class="uk-container hero-title text-shadow large-shadow">', '</h1>' ); ?>
				</figcaption>
			</figure>
		</div>
	</div>
</header>
