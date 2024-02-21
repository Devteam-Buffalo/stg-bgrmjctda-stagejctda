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
 * @since           20190209
 * @author          lpeterson
 */

/**
 * Prints HTML with meta information for the tags.
 */
if ( !function_exists( 'jc_list_tags' ) ) {
	function jc_list_tags() {
		if ( has_tag() ) {
			$tags_list = get_the_tag_list( '', ',', '' );
			ob_start(); ?>

			<ul class="uk-subnav uk-subnav-line post-meta post-tags no-print">
				<li><span class="uk-icon-tags uk-icon-justify uk-display-inline-block uk-padding-right-small"></span></li>
				<li class="uk-text-uppercase text-light-grey sans-serif"><?= $tags_list ?></li>
			</ul>

			<?php ob_get_flush();
		}
	}
}

/**
 * Prints HTML with meta information for the categories.
 */
if ( !function_exists( 'jc_list_categories' ) ) {
	function jc_list_categories() {
		if ( has_category() ) {
			$categories_list = get_the_category_list( ',' );
			ob_start(); ?>

			<ul class="uk-subnav uk-subnav-line post-meta post-categories no-print">
				<li><span class="uk-icon-folder uk-icon-justify uk-display-inline-block uk-padding-right-small"></span></li>
				<li class="uk-text-uppercase text-light-grey sans-serif"><?= $categories_list ?></li>
			</ul>

			<?php ob_get_flush();
		}
	}
	/*
	* Delete Category Transients
	* Flush post category transients upon editing a category name
	* and saving posts which use categories
	------------------------------------ */
	function jc_cache_categories() {
		$jc_category_count = get_transient( 'jc_category_count' );
		if ( false === $jc_category_count ) {
			$jc_all_categories = get_categories( [
				'fields'     => 'ids',
				'hide_empty' => 1,
				'number'     => 2,
			]);
			$jc_category_count = count( $jc_all_categories );
			set_transient( 'jc_category_count', $jc_category_count );
		}
		if ( $jc_category_count < 2 )
			return false;

		return true;
	}

	function jc_flush_category_transients() {
		delete_transient( 'jc_category_count' );
	}
	add_action( 'edit_category', 'jc_flush_category_transients' );
	add_action( 'save_post',	 'jc_flush_category_transients' );
}

if ( !function_exists( 'jc_post_date' ) ) {
	function jc_post_date() {
		if ( get_the_date() != '' ) {
			$post_date = get_the_date();
			$post_date_c = get_the_date( 'c' );
			ob_start(); ?>

			<ul class="uk-subnav uk-subnav-line post-meta post-date no-print">
				<li><span class="uk-icon-calendar uk-icon-justify uk-display-inline-block uk-padding-right-small"></span></li>
				<li><time class="uk-text-uppercase text-light-grey sans-serif" datetime="<?= esc_attr( $post_date_c ) ?>"><?= esc_html( $post_date ) ?></time></li>
			</ul>

			<?php ob_get_flush();
		}
	}
}

if ( !function_exists( 'jc_post_author' ) ) {
	function jc_post_author() {
		if ( get_the_author() != '' ) {
			$author_name = get_the_author();
			$author_id = get_the_author_meta( 'ID' );
			$author_url = get_author_posts_url( $author_id );
			ob_start(); ?>

			<ul class="uk-subnav uk-subnav-line post-meta post-date no-print">
				<li><span class="uk-icon-quote-left uk-icon-justify uk-display-inline-block uk-padding-right-small"></span></li>
				<li><a class="uk-text-uppercase text-light-grey sans-serif" href="<?= esc_url( $author_url ) ?>"><?= esc_html( $author_name ) ?></a></li>
			</ul>

			<?php ob_get_flush();
		}
	}
}

if ( ! function_exists( 'jc_archive_nav' ) ) {
	function jc_archive_nav() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 )
			return;

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = [];
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) )
			wp_parse_str( $url_parts[1], $query_args );

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		$links = paginate_links([
			'base'               => $pagenum_link,
			'format'             => $format,
			'total'              => $GLOBALS['wp_query']->max_num_pages,
			'current'            => $paged,
			'mid_size'           => 5,
			'add_args'           => array_map('urlencode', $query_args),
			'show_all'           => true,
			'end_size'           => 1,
			'prev_next'          => false,
			'prev_text'          => 'Newer Blog Posts <small class="uk-icon-chevron-right"></small>',
			'next_text'          => '<small class="uk-icon-chevron-left"></small> Older Blog Posts',
			'type'               => 'array',
			'add_fragment'       => '',
			'before_page_number' => '',
			'after_page_number'  => ''
		]);
		ob_start(); ?>

		<nav class="post-pagination no-print" role="navigation">
			<h2 class="uk-visible screen-reader-text">Posts Navigation</h2>
			<hr class="uk-article-divider">
			<ul class="uk-flex uk-flex-center uk-flex-space-around uk-pagination">
				<?php foreach ( $links as $link ) : ?>
				<li><?= $link ?></li>
				<?php endforeach ?>
			</ul>
		</nav>

		<?php ob_get_flush();
	}
}

if ( !function_exists('jc_post_nav') ) {
	function jc_post_nav() {
		ob_start(); ?>

		<nav class="nav-links no-print" role="navigation">
			<h2 class="uk-visible screen-reader-text">Post Navigation</h2>
			<hr class="uk-article-divider">
			<ul class="uk-flex uk-grid-width-1-1 uk-grid-width-medium-1-2 uk-pagination">
				<li class="uk-text-left">
					<?php next_post_link('<div class="uk-text-small uk-text-uppercase"><small class="uk-icon-chevron-left"></small> Prev Blog Post</div><div class="uk-text-small uk-text-uppercase">%link</div>', '%title', true) ?>
				</li>
				<li class="uk-text-right">
					<?php previous_post_link('<div class="uk-text-small uk-text-uppercase">Next Blog Post <small class="uk-icon-chevron-right"></small></div><div class="uk-text-small uk-text-uppercase">%link</div>', '%title', true) ?>
				</li>
			</ul>
		</nav>

		<?php ob_get_flush();
	}
}
