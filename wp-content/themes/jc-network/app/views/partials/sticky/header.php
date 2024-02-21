<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.3.0
 * @link            https://www.discoverjacksonnc.com
 * @author          Lee Peterson
 * @date            6/30/18
 * @file            header.php
 */
defined('ABSPATH') or exit; ?>

<div class="uk-sticky uk-hidden-large header">
	<nav class="uk-flex uk-flex-middle uk-flex-center uk-flex-space-between uk-padding-vertical-small uk-text-center">
		<button class="uk-button-icon" type="button" autocomplete="false" data-uk-offcanvas>
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="30px" viewBox="0 0 40 30" version="1.1"><defs></defs><g id="button" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="lines" fill="#4F5858" fill-rule="nonzero"><path d="M38.5365868,0.5 C39.2101048,0.5 39.756099,0.94771525 39.756099,1.5 C39.756099,2.05228475 39.2101048,2.5 38.5365868,2.5 L2.04878053,2.5 C1.37526252,2.5 0.829268293,2.05228475 0.829268293,1.5 C0.829268293,0.94771525 1.37526252,0.5 2.04878053,0.5 L38.5365868,0.5 Z" id="line1"></path><path d="M38.6310899,9.5 C39.3062959,9.5 39.8536585,9.94771525 39.8536585,10.5 C39.8536585,11.0522847 39.3062959,11.5 38.6310899,11.5 L2.05183691,11.5 C1.37663091,11.5 0.829268293,11.0522847 0.829268293,10.5 C0.829268293,9.94771525 1.37663091,9.5 2.05183691,9.5 L38.6310899,9.5 Z" id="line2"></path><path d="M38.6310899,18.5 C39.3062959,18.5 39.8536585,18.9477153 39.8536585,19.5 C39.8536585,20.0522847 39.3062959,20.5 38.6310899,20.5 L2.05183691,20.5 C1.37663091,20.5 0.829268293,20.0522847 0.829268293,19.5 C0.829268293,18.9477153 1.37663091,18.5 2.05183691,18.5 L38.6310899,18.5 Z" id="line3"></path><path d="M38.6310899,27.5 C39.3062959,27.5 39.8536585,27.9477153 39.8536585,28.5 C39.8536585,29.0522847 39.3062959,29.5 38.6310899,29.5 L2.05183691,29.5 C1.37663091,29.5 0.829268293,29.0522847 0.829268293,28.5 C0.829268293,27.9477153 1.37663091,27.5 2.05183691,27.5 L38.6310899,27.5 Z" id="line4"></path></g></g></svg>
			<span>Menu</span>
		</button>
	
		<a href="<?= get_home_url() ?>" title="Visit the Front Page" class="">
			<?php if ( has_custom_logo() ) : ?>
				<?= get_custom_logo() ?>
			<?php else : ?>
				<img src="<?= CDN_ASSET.'/img/logo.svg' ?>" alt="<?= get_bloginfo( 'name' ) ?> Logo">
			<?php endif ?>
		</a>
	
		<button class="uk-button-icon" type="button" autocomplete="false">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><defs></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><path d="M17.1526587,15.0943396 L16.0617496,15.0943396 L15.6843911,14.7169811 C17.0291595,13.1595197 17.838765,11.135506 17.838765,8.9193825 C17.838765,3.99313894 13.8456261,0 8.9193825,0 C3.99313894,0 0,3.99313894 0,8.9193825 C0,13.8456261 3.99313894,17.838765 8.9193825,17.838765 C11.135506,17.838765 13.1595197,17.0291595 14.7169811,15.6912521 L15.0943396,16.0686106 L15.0943396,17.1526587 L21.9554031,24 L24,21.9554031 L17.1526587,15.0943396 Z M9,15.75 C5.2725,15.75 2.25,12.7275 2.25,9 C2.25,5.2725 5.2725,2.25 9,2.25 C12.7275,2.25 15.75,5.2725 15.75,9 C15.75,12.7275 12.7275,15.75 9,15.75 Z" id="icon-search" fill="#4F5858" fill-rule="nonzero"></path></g></svg>
		</button>
	</nav>
</div>