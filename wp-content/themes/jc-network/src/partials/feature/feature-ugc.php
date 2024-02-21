<?php
/*
**  @file               feature-ugc.php
**  @description        
**  @package            jctda-public-prod
**  @since              1.0.0
**  @author             lpeterson
**  @date               3/12/18
*/

defined('ABSPATH') || exit;

$ugc = get_post_meta( get_the_id(), 'ugc_script', true );
$txt = get_post_meta( get_the_id(), 'ugc_text', true );

if ( ! empty( $ugc ) ) : ?>

	<style>
		.site-content .cr__gallery { font: normal normal normal 1rem/1.4 "Proxima N W01 Light", sans-serif }
		.site-content .cr__gallery .loadMore {
			height: 3rem;
			line-height: 3rem;
			transition: 300ms all linear
		}
		.site-content .cr__gallery:hover .loadMore {
			height: 3.75rem;
			line-height: 3.75rem
		}
		.site-content .cr__gallery .loadMore::after { background-color: #069 !important }
		.site-content .cr__gallery:hover .loadMore::after { background-color: #033b57 !important }
	</style>
	<section class="featured-container home-featured-container ugc-container section-spacing">
		<?php
		echo $ugc;
		
		if( ! empty( $txt ) ) echo '<div class="uk-block uk-block-default uk-text-center jc-section-intro"><p class="uk-h4 jc-page-subheading">' . $txt . '</p></div>';
		?>
	</section>

<?php endif;