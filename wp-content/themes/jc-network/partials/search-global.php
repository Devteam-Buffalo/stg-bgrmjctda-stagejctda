<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Primary menu dropdown search
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190317
 * @author          lpeterson
 */
?>

<form class="uk-flex uk-flex-column uk-flex-top uk-flex-nowrap no-print" method="get" action="<?= esc_html( get_permalink() ) ?>" role="search" style="margin-left:var(--logo-width)">
	<div class="uk-flex-item-1 uk-width-1-1 mega-header">
		<h2 class="mega-section">Search</h2>
		<label for="search-close" title="Close Menu" class="mega-close">
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
		</label>
	</div>
	<label class="uk-flex-item-1 uk-width-1-1 label" title="Search" for="global-search">
		<input name="swpquery" data-swplive="true" data-swpengine="default" id="global-search" class="uk-flex-item-1 uk-width-1-1 field" type="search" placeholder="Click here to search" aria-label="Click here to search" minlength="3" maxlength="32" autofocus required>
	</label>
</form>
<style>
#global-search {
	background: rgba(255,255,255,0.1);
	border: none;
	color: white;
	font-family: var(--sans-light);
	font-size: 1.5rem;
	height: 3rem;
	line-height: 3rem;
}
#global-search::placeholder {
	color: rgba(255,255,255,0.5);
}
</style>
