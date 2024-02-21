<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Front page video hero with animated text.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190328
 * @author          lpeterson
 */
?>

<header id="front-hero" class="jc-hero no-print">
	<figure class="uk-cover uk-position-relative">
		<video id="front-video" class="uk-cover-object uk-position-absolute" src="<?= wp_get_attachment_url( 59921 ) ?>" muted autoplay playsinline loop></video>
		<figcaption class="uk-position-cover uk-flex uk-flex-center uk-flex-middle">
			<div>
				<h1>Welcome to Jackson County</h1>
			</div>
		</figcaption>
	</figure>
</header>


