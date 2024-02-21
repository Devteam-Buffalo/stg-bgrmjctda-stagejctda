<?php
/* ---------------------------------------
*
* Markup templates for cleaner template files
*
* @package jc-network
*
------------------------------------ */

/*
* General Page templates
------------------------------------ */
function jc_network_add_before_page_content_area() {
	?>
	<div class="content-area primary-content-area">
		<main class="site-main main-content" role="main">
	<?php
}
add_action('jc_network_before_page_content_area', 'jc_network_add_before_page_content_area');

function jc_network_add_after_page_content_area() {
	?>
		</main>
	</div>
	<?php
}
add_action('jc_network_after_page_content_area', 'jc_network_add_after_page_content_area');


/*
* Full-width Page template
------------------------------------ */
function jc_network_add_before_full_width_content_area() {
	?>
	<div class="content-area primary-content-area">
		<main class="site-main main-content" role="main">
	<?php
}
add_action('jc_network_before_full_width_content_area', 'jc_network_add_before_full_width_content_area');

function jc_network_add_after_full_width_content_area() {
	?>
		</main>
	</div>
	<?php
}
add_action('jc_network_after_full_width_content_area', 'jc_network_add_after_full_width_content_area');


/*
* Archive templates
------------------------------------ */
function jc_network_add_before_archive_content_area() {
	?>
	<div class="content-area primary-content-area archive-content">
		<main class="site-main main-content" role="main">
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
	<?php
}
add_action('jc_network_before_archive_content_area', 'jc_network_add_before_archive_content_area');

function jc_network_add_after_archive_content_area() {
	?>
		</main>
	</div>
	<?php
}
add_action('jc_network_after_archive_content_area', 'jc_network_add_after_archive_content_area');


/*
* Sidebar template
------------------------------------ */
function jc_network_add_before_sidebar_content_area() {
	?>
	<div class="uk-container uk-container-center">
		<div class="uk-grid">
			<div class="uk-width-large-7-10 uk-width-1-1 content-area primary-content-area without-hero has-sidebar-content">
				<main class="site-main main-content" role="main">
	<?php
}
add_action('jc_network_before_sidebar_content_area', 'jc_network_add_before_sidebar_content_area');

function jc_network_add_after_sidebar_content_area() {
	?>
				</main>
			</div>
			
			<?php get_sidebar(); do_action('be_sidebar_selector'); ?>
		</div>
	</div>
	<?php
}
add_action('jc_network_after_sidebar_content_area', 'jc_network_add_after_sidebar_content_area');


/*
* 404/Sitemap
------------------------------------ */
function jc_network_add_before_sitemap_area() {
	?>
	<div class="uk-container uk-container-center">
		<div class="uk-grid">
			<div class="uk-width-large-7-10 uk-width-1-1 content-area primary-content-area without-hero has-sidebar-content">
				<main class="site-main main-content" role="main">
	<?php
}
add_action('jc_network_before_sitemap_area', 'jc_network_add_before_sitemap_area');

function jc_network_add_after_sitemap_area() {
	?>
				</main>
			</div>
			
			<?php get_sidebar(); do_action('be_sidebar_selector'); ?>
		</div>
	</div>
	<?php
}
add_action('jc_network_after_sitemap_area', 'jc_network_add_after_sitemap_area');


/*
* Page Builder Full Width
------------------------------------ */
function add_page_builder_full_before() {
	get_template_part( 'src/partials/content/page-builder', 'h1' );
		
	echo '<div class="uk-container uk-container-center">';
		echo '<main class="jc-page-builder site-main main-content" role="main">';
}
add_action( 'page_builder_full_before', 'add_page_builder_full_before' );

function add_page_builder_full_after() {
		echo '</main>';
	echo '</div>';
}
add_action( 'page_builder_full_after', 'add_page_builder_full_after' );

/*
* Page Builder Content with Sidebar
------------------------------------ */
function add_page_builder_sidebar_before() {
	echo '<div class="uk-container uk-container-center">';
		get_template_part( 'src/partials/content/page-builder', 'h1' );
		
		echo '<div class="uk-grid">';
			echo '<div class="uk-width-large-7-10 uk-width-1-1 content-area primary-content-area has-sidebar-content">';
				echo '<main class="jc-page-builder site-main main-content" role="main">';
}
add_action( 'page_builder_sidebar_before', 'add_page_builder_sidebar_before' );

function add_page_builder_sidebar_after() {
				echo '</main>';
			echo '</div>';
			
			do_action('be_sidebar_selector');
		echo '</div>';
	echo '</div>';
}
add_action( 'page_builder_sidebar_after', 'add_page_builder_sidebar_after' );

/*
* TDA Section - Sidebar template
------------------------------------ */
function add_tda_before() {
	if( is_page( 'tda-docs' ) ) get_template_part( 'src/partials/hero/hero', 'tda' );

	echo '<div class="uk-container uk-container-center uk-margin-large-bottom">';
		echo '<div class="uk-grid uk-margin-large-bottom">';
			echo '<div class="uk-width-large-7-10 uk-width-1-1 content-area primary-content-area has-sidebar-content">';
				echo '<main class="site-main main-content" role="main">';
}
add_action('tda_before', 'add_tda_before');

function add_tda_after() {
				echo '</main>';
			echo '</div>';
			
			get_sidebar('tda');
		echo '</div>';
	echo '</div>';
}
add_action( 'tda_after', 'add_tda_after' );