<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     CR Hero
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           2.3.0
 * @author          lpeterson
 */

if ( !function_exists( 'jc_cr_hero' ) ) {
	function jc_cr_hero( $args = null ) {
		$args = wp_parse_args( $args, [
			'cr_id' => '',
			'title' => '',
		]);

		ob_start(); ?>

		<style class="no-print">
			.cr { padding-top: 0 !important }
			.ugc { z-index: 2; transform: translateY(-3rem) }
			.ugc figure > div { width: 100%; max-width: 100vw }

			.ugc h1 { position: absolute; width: 100%; z-index: 10; transition: all 300ms ease-in-out }
			.ugc + div > .map-frame,
			.ugc + section { position: relative; z-index: 10; transition: all 300ms ease-in-out }

			.ugc:hover h1 { z-index: -1 }
			.ugc:hover + div > .map-frame,
			.ugc:hover + section { z-index: 1 }
		</style>

		<header class="uk-cover uk-position-relative ugc no-print">
			<figure class="uk-flex uk-flex-center uk-flex-middle uk-margin-remove">
				<script id="<?= $args['cr_id'] ?>" src="https://starling.crowdriff.com/js/crowdriff.js" async></script>
				<h1 class="uk-text-center large-script text-script text-white text-shadow"><?= $args['title'] ?></h1>
			</figure>
		</header>

		<?php ob_get_flush();
	}
}
