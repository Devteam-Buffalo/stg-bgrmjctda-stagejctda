<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     404 page of website
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190214
 * @author          lpeterson
 */
?>

<?php get_header() ?>

<style>
.sitemap-lists ul {
	padding-left: 0;
}
#main-search::before {
	left: auto;
	right: 0;
}
</style>

<main class="uk-container uk-container-center">
	<article class="uk-margin-top uk-margin-bottom page-article">
		<header class="uk-margin-bottom page-header">
			<div class="uk-text-center"><?= get_option('jc_general_settings_page_not_found') ?></div>
			<br>
			<div class="uk-container-center uk-width-small-3-5 uk-width-large-2-3"><?= get_search_form() ?></div>
		</header>
	</article>
</main>

<?php get_footer() ?>
