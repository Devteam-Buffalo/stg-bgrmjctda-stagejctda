<?php
/*
**  @file    blog-pagination.php
**
**  @desc
**
**  @path    /blog-pagination.php
**  @package public
**  @author  Lee Peterson
**  @date    11/6/17
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'jc_paginate' ) ) :

	function jc_paginate( $pages = null, $range = null, $paged = null, $args = null ) {

		/**
		* This first part of our function is a fallback
		* for custom pagination inside a regular loop that
		* uses the global $paged and global $wp_query variables.
		*
		* It's good because we can now override default pagination
		* in our theme, and use this function in default quries
		* and custom queries.
		*/
		global $paged;

		if ( is_null( $pages ) ) :

			global $wp_query;

			$pages = $wp_query->max_num_pages;

			if ( ! $pages ) :

				$pages = 1;

			endif;

		endif;

		/**
		* We construct the pagination arguments to enter into our paginate_links
		* function.
		*/
		$args = [
			'base'               => get_pagenum_link(1) . '%_%',
			'format'             => 'page/%#%',
			'end_size'           => 1,
			'mid_size'           => $range ?? 2,
			'current'            => $paged ?? 1,
			'total'              => $pages,
			'show_all'           => false,
			'prev_next'          => true,
			'type'               => 'array',
			'prev_text'          => '<span class="uk-pagination-previous"><i class="uk-icon-chevron-left"></i> Prev</span>',
			'next_text'          => '<span class="uk-pagination-next">Next <i class="uk-icon-chevron-right"></i></span>',
			'before_page_number' => '',
			'after_page_number'  => '',
			'add_fragment'       => '',
		];

		$args = wp_parse_args( $args, [
			'add_args' => $add_args ?? null,
		] );

		$links = paginate_links( $args );

		ob_start();

		if ( is_array( $links ) ) : ?>

			<h3 class="screen-reader-text no-print">Posts Navigation</h3>
			<hr class="no-print">
			<nav class="post-pagination no-print" role="navigation">
				<ul class="uk-pagination">
				<?php foreach ( $links as $link ) : ?>
					<li><?= $link ?></li>
				<?php endforeach ?>
				</ul>
			</nav>

		<?php else :

			echo $links;

		endif;

		return ob_get_clean();

	}

endif;

if( ! function_exists( 'jc_blog_pagination' ) ) {

	function jc_blog_pagination( $pages = null, $range = null, $paged = null ) {



		if( is_null( $range ) ) :

			$range = 2;

		endif;



		/**
		* This first part of our function is a fallback
		* for custom pagination inside a regular loop that
		* uses the global $paged and global $wp_query variables.
		*
		* It's good because we can now override default pagination
		* in our theme, and use this function in default quries
		* and custom queries.
		*/
		global $paged;



		if( is_null( $paged ) ) :

			$paged = 1;

		endif;



		if( is_null( $pages ) ) :

			global $wp_query;

			$pages = $wp_query->max_num_pages;

			if( ! $pages ) :

				$pages = 1;

			endif;

		endif;



		/**
		* We construct the pagination arguments to enter into our paginate_links
		* function.
		*/
		$args = array(
			'base'               => get_pagenum_link(1) . '%_%',
			'format'             => 'page/%#%',
			//'end_size'           => 1,
			'mid_size'           => $range,
			'current'            => $paged,
			'total'              => $pages,
			//'show_all'           => false,
			'prev_next'          => true,
			'type'               => 'array',

			'prev_text'          => '<span class="uk-pagination-previous"> <span class="uk-icon-chevron-left"></span> Prev </span>',
			'next_text'          => '<span class="uk-pagination-next"> Next <span class="uk-icon-chevron-right"></span> </span>',
			'type'               => 'array',
			'before_page_number' => '',
			'after_page_number'  => '',

			'add_fragment'       => '',
			//'add_args'           => false,
		);

		$links = paginate_links( $args );



		if( $links ) :

			echo '<h3 class="screen-reader-text">Posts Navigation</h3>';

			echo '<hr>';

			echo '<nav class="post-pagination">';

				echo '<ul class="uk-pagination">';

					foreach( $links as $link ) {

						echo '<li>' . $link . '</li>';

					}

				echo '</ul>';

			echo '</nav>';

		endif;


	}

}
