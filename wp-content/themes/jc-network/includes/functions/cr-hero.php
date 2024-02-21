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

		<header class="uk-position-relative no-print" style="max-height:var(--hero-height)!important;">
			<figure class="ugc uk-margin-bottom-remove">
				<script id="<?= $args['cr_id'] ?>" src="https://starling.crowdriff.com/js/crowdriff.js" async></script>
			</figure>
			<h1 class="uk-text-center uk-margin-top-remove uk-margin-bottom-remove" style="font-size:clamp(4rem,5vw,8rem)"><?= $args['title'] ?></h1>
		</header>

		<?php ob_get_flush();
	}
}
