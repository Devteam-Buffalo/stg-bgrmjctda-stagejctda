<?php
/**
 * Template Name:   ✓ Sitemap
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Sitemap page template.
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
	<article class="page-article">
		<header class="uk-margin-bottom page-header">
			<?= jc_page_intro( get_post() ) ?>
			<?= jc_page_content( get_post() ) ?>
			<br>
			<?= get_search_form() ?>
			<br>
		</header>

		<section class="page-content print">
			<div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-grid-width-xlarge-1-5 sitemap-lists" data-uk-margin>
				<div class="uk-margin-large-bottom">
					<h3><a href="/outdoors/" title="Outdoors">Outdoors</a></h3>
					<?php wp_nav_menu(['menu' => 'Outdoors Mega Menu','container_class' => 'uk-nav','container' => 'nav']) ?>
				</div>
				<div class="uk-margin-large-bottom">
					<h3><a href="/attractions/" title="Attractions">Attractions</a></h3>
					<?php wp_nav_menu(['menu' => 'Attractions Mega Menu','container_class' => 'uk-nav','container' => 'nav']) ?>
				</div>
				<div class="uk-margin-large-bottom">
					<h3><a href="/food-drink/" title="Food & Drink">Food & Drink</a></h3>
					<?php wp_nav_menu(['menu' => 'Food & Drink Mega Menu','container_class' => 'uk-nav','container' => 'nav']) ?>
				</div>
				<div class="uk-margin-large-bottom">
					<h3><a href="/lodging/" title="Lodging">Lodging</a></h3>
					<?php wp_nav_menu(['menu' => 'Lodging Mega Menu','container_class' => 'uk-nav','container' => 'nav']) ?>
				</div>
				<div class="uk-margin-large-bottom">
					<h3><a href="/your-trip/" title="Your Trip">Your Trip</a></h3>
					<?php wp_nav_menu(['menu' => 'Your Trip Mega Menu','container_class' => 'uk-nav','container' => 'nav']) ?>
				</div>
				<div class="uk-margin-large-bottom">
					<h3><a href="/your-trip/towns/" title="Towns">Towns</a></h3>
					<?php wp_nav_menu(['menu' => 'Towns','container_class' => 'uk-nav','container' => 'nav']) ?>
				</div>
				<div class="uk-margin-large-bottom">
					<h3><a href="/your-trip/trip-ideas/" title="Trip Ideas">Trip Ideas</a></h3>
					<?php wp_nav_menu(['menu' => 'Trip Ideas','container_class' => 'uk-nav','container' => 'nav']) ?>
				</div>
				<div class="uk-margin-large-bottom">
					<h3><a href="/your-trip/visitor-galleries/" title="Visitor Galleries">Visitor Galleries</a></h3>
					<?php wp_nav_menu(['menu' => 'Visitor Galleries','container_class' => 'uk-nav','container' => 'nav']) ?>
				</div>
				<div class="uk-margin-large-bottom">
					<h3><a href="/your-trip/blog/" title="Blog Categories">Blog Categories</a></h3>
					<?php wp_nav_menu(['menu' => 'Blog Categories','container_class' => 'uk-nav','container' => 'nav']) ?>
				</div>
				<div class="uk-margin-large-bottom">
					<h3>Additional Resources</h3>
					<?php wp_nav_menu(['menu' => 'Additional Resources','container_class' => 'uk-nav','container' => 'nav']) ?>
				</div>
			</div>
		</section>
	</article>
</main>

<?php get_footer() ?>
