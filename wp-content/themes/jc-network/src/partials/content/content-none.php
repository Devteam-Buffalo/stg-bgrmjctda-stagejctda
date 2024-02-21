<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jc-network
 */

?>

<section class="uk-container uk-container-center error-404 not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Page Not Found', 'jc-network' ); ?></h1>
	</header>

	<div class="page-content">
		<p>Sorry, but the content you've requested cannot be found. Try one of the links below to narrow down your search, or <a href="javascript:history.back();" title="click here" class="">click here</a> to return to your previous location.</p>

		<?php get_search_form(); ?>
		
		<h3>Popular Destinations</h3>

		<?php pods_view( 'src/partials/content/content-sitemap.php' ) ?>
	</div>
</section>
