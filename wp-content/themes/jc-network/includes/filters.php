<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Register WordPress Filter Hooks
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */

namespace Jctda\Filters;

$n = function( $function ) {
	return __NAMESPACE__ . "\\$function";
};
add_filter( 'pre_option_blogdescription', $n('filter_pre_option_blogdescription') );
add_filter( 'pre_option_blogname', $n('filter_pre_option_blogname') );
// add_filter( 'pre_option_home', $n('filter_pre_option_home') );
// add_filter( 'pre_option_siteurl', $n('filter_pre_option_siteurl') );
add_filter( 'login_headertitle', $n('filter_login_headertitle') );
add_filter( 'login_headerurl', $n('filter_login_headerurl') );
add_filter( 'excerpt_length', $n('filter_excerpt_length') );
add_filter( 'get_custom_logo', $n('filter_get_custom_logo') );
add_filter( 'nav_menu_link_attributes', $n('filter_nav_menu_link_attributes'), 10, 4 );
add_filter( 'navigation_markup_template', $n('filter_navigation_markup_template'), 10, 2 );
add_filter( 'next_posts_link_attributes', $n('filter_previous_posts_link_attributes') );
add_filter( 'previous_posts_link_attributes', $n('filter_previous_posts_link_attributes') );
add_filter( 'script_loader_tag', $n('filter_script_loader_tag'), 11, 2 );
// add_filter( 'upload_mimes', $n('filter_upload_mimes') );
add_filter( 'wp_kses_allowed_html', $n('filter_wp_kses_allowed_html') );
add_filter( 'widget_nav_menu_args', $n('filter_widget_nav_menu_args'), 10, 4 );
// add_filter( 'wp_get_attachment_image_attributes', $n('filter_wp_get_attachment_image_attributes'), 10, 2 );
add_filter( 'image_size_names_choose', $n('filter_image_size_names_choose') );
add_filter( 'tribe_event_featured_image_size', $n('filter_tribe_event_featured_image_size'), 10, 2 );
// add_filter( 'embed_thumbnail_image_size', $n('filter_embed_thumbnail_image_size'), 10, 2 );
add_filter( 'tribe_rsvp_email_recipient', '__return_empty_array' );
add_filter( 'disable_wpseo_json_ld_search', '__return_true' );
add_filter( 'wpseo_json_ld_output', '__return_empty_array' );

function filter_pre_option_siteurl() {
	return;// constant('WP_SITEURL');
}
function filter_pre_option_home() {
	return;// constant('WP_HOME');
}
function filter_pre_option_blogname() {
	return 'Discover Jackson NC';
}
function filter_pre_option_blogdescription() {
	return 'The North Carolina Mountain Towns of Cashiers, Cherokee, Dillsboro and Sylva';
}
function filter_login_headerurl( $message ) {
	return;// constant('WP_HOME');
}
function filter_login_headertitle( $message ) {
	return 'Discover Jackson NC';
}
function filter_tribe_event_featured_image_size( $size, $post_id ) {
	return 'masonry';
}
function filter_embed_thumbnail_image_size( $image_size, $thumbnail_id ) {
	return 'card';
}

/**
 * Ensure plugin assets loaded from within the theme are served at a corrected URL
 * @return string $url
 */
function filter_plugins_url( $url = '', $path = '', $plugin = '' ) {
	if ( empty( $plugin ) )
		return $url;

	if  ( 0 === strpos( $plugin, JCTDA_PATH ) ) {
		$url_override = str_replace( JCTDA_PATH, JCTDA_TEMPLATE_URL, dirname( $plugin ) );
		$url = trailingslashit( $url_override ) . $path;
	}

	return $url;
}

/**
 * Add async/defer attributes to enqueued scripts that have the specified `attributes` flag.
 *
 * @link https://core.trac.wordpress.org/ticket/12009
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @return string
 */
function filter_script_loader_tag( $tag, $handle ) {
	$attribute = wp_scripts()->get_data( $handle, 'attribute' );

	if ( !$attribute )
		return $tag;

	if ( ! preg_match( ":\s$attribute(=|>|\s):", $tag ) )
		$tag = preg_replace( ':(?=></script>):', " $attribute", $tag, 1 );

	return $tag;
}

/**
 * Add support for HTML 5 "async" and "defer" attributes
 * @see https://core.trac.wordpress.org/ticket/12009#comment:57
 */
function filter_loader_src( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );

	return $src;
}

/**
 * Process content for its links and allow transformation for CDN link rewrites.
 *
 * @param string $content Content to be processed.
 * @return string
 */
function filter_content_links( $content ) {
	$content = preg_replace_callback( '#<a[^>]*href=[\'\"]([^\'\"]+)[\'\"][^>]*>[^<]*<\/a>#', function( $matches ) {
		/**
		 * Permit third-party modification of all identified links.
		 *
		 * @param string $html Full link HTML.
		 * @param string $href Link href.
		 */
		$matches[0] = apply_filters( 'filter_content_links', $matches[0], $matches[1] );
		return $matches[0];
	}, $content );

	return $content;

	// Remove paragraph tags around images
	// return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

/**
 * Filters the admin post thumbnail HTML markup to return
 *
 * @package         jctda
 * @since           20181211
 * @author          lpeterson
 *
 * @param string $content      Admin post thumbnail HTML markup.
 * @param int    $post_id      Post ID.
 * @param int    $thumbnail_id Thumbnail ID.
 */
function filter_admin_post_thumbnail_html( $content ) {
	return wp_sprintf( "<p><strong>%s</strong>%s</p>\n%s", 'Image Dimensions: ', 'Width: 7680px | Height: 4320px | Filesize: 250KB', $content );
}

/**
 * Filters the Read More link and length
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */
// function filter_excerpt_more( $more ) {
// 	global $post;
// 	if ( isset( $post->post_excerpt ) )
// 		$more = wp_sprintf(
// 			'<p><a href="%s" class="%s">%s <i class="%s"></i></a></p>',
// 			get_permalink( $post->ID ),
// 			'read-more',
// 			'Continue Reading '.get_the_title( $post->ID ),
// 			'uk-icon-arrow-right'
// 		);

// 	return $more;
// }
function filter_excerpt_length( $length ) {
	return 250;
}

/**
 * Filters the custom logo output
 *
 * @package         jctda
 * @since           20181214
 * @author          lpeterson
 */
function filter_get_custom_logo() {
	return wp_sprintf(
		'<a href="%1$s" class="custom-logo-link" title="%2$s" rel="home" itemprop="url"><img src="%3$s" alt="%2$s" class="custom-logo" itemprop="logo"></a>',
		esc_url( WP_HOME ),
		esc_attr( 'Discover Jackson NC Logo' ),
		esc_url( JCTDA_TEMPLATE_URL.'/dist/img/logo.svg' )
	);
}


/**
 * Description:     Filters the names and labels of the default image sizes.
 *
 * @package         jctda
 * @since           20181211
 * @author          lpeterson
 *
 * @param array $size_names Array of image sizes and their names. Default values
 *                          include 'Thumbnail', 'Medium', 'Large', 'Full Size'.
 */
function filter_image_size_names_choose( $size_names ) {
	return [
		'tile' => 'Tile (275 x 275, Center Crop)',
		'card' => 'Card (480 x 360, Center Crop)',
		'masonry' => 'Masonry (Proportionate x 525, No Crop)',
		'full' => 'Full Size (not recommended)',
	];
}

function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
	$item_has_children = in_array( 'menu-item-has-children', $item->classes );
	if ( $item_has_children ) {
		$atts['aria-haspopup'] = 'true';
		$atts['aria-expanded'] = 'false';
	}
	return $atts;
}

/**
 * Filters the navigation markup template.
 *
 * @package         jctda
 * @since           20181214
 * @author          lpeterson
 *
 *  Note: The filtered template HTML must contain specifiers for the navigation
 *  class (%1$s), the screen-reader-text value (%2$s), and placement of the
 *  navigation links (%3$s):
 *
 *      <nav class="navigation %1$s" role="navigation">
 *          <h2 class="screen-reader-text">%2$s</h2>
 *          <div class="nav-links">%3$s</div>
 *      </nav>
 *
 *  @param string $template The default template.
 *  @param string $class    The class passed by the calling function.
 *  @return string Navigation template.
 *
 */
function filter_navigation_markup_template( $template, $class ) {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages > 1 ) {
		$args = [
			'mid_size'           => 1,
			'prev_text'          => _x( 'Previous', 'previous set of posts' ),
			'next_text'          => _x( 'Next', 'next set of posts' ),
			'screen_reader_text' => __( 'Posts navigation' ),
		];

		// Make sure we get a string back. Plain is the next best thing.
		if ( isset( $args['type'] ) && 'array' == $args['type'] )
			$args['type'] = 'plain';

		// Set up paginated links.
		$links = paginate_links( $args );
		$markup = '';

		if ( $links )
			$markup = '<nav class="%1$s" role="navigation">'.
				'<h2 class="uk-visible screen-reader-text">%2$s</h2>'.
				'<hr class="uk-article-divider">'.
				'<ul class="uk-flex uk-grid-width-1-1 uk-grid-width-medium-1-2 uk-pagination">'.
					'<li class="uk-text-left">'.
						next_post_link( '<div class="uk-text-small uk-text-uppercase"><small class="uk-icon-chevron-left"></small> Prev Blog Post</div><div class="uk-text-small uk-text-uppercase">%3$s</div>', '%title', true ).
					'</li>'.
					'<li class="uk-text-right">'.
						previous_post_link( '<div class="uk-text-small uk-text-uppercase">Next Blog Post <small class="uk-icon-chevron-right"></small></div><div class="uk-text-small uk-text-uppercase">%3$s</div>', '%title', true ).
					'</li>'.
				'</ul>'.
			'</nav>';

		$template = sprintf( $markup, sanitize_html_class('nav-links'), esc_html('Post Navigation'), $links );
	}

	return $template;
}

/**
 * Filters the anchor tag attributes for the previous/next posts page links.
 *
 * @package         jctda
 * @since           20181214
 * @author          lpeterson
 */
function filter_previous_posts_link_attributes( $attributes ) {
	if ( isset( $attributes ) )
		$attributes['class'] = 'uk-button uk-button-primary uk-button-large';

	return $attributes;
}

/**
 * Filters the arguments for the Navigation Menu widget
 * @param  [type] $nav  $nav_menu_args {
 *                                  @type callable|bool $fallback_cb
 *                                  @type mixed $menu Menu ID, slug, or name
 * @param  [type] $menu Nav menu object for the current menu
 * @param  [type] $args Display arguments for the current widget
 * @param  [type] $i    Array of settings for the current widget
 * @return [type]       [description]
 */
function filter_widget_nav_menu_args( $nav_menu_args, $nav_menu, $args, $instance ) {
	$candidates = [
		'Media Room',
		'Tourism Development Authority',
		'Primary Sections',
		'Secondary Sections',
		'Other Sections',
		'Contact'
	];
	if ( in_array( $instance['title'], $candidates ) )
		$nav_menu_args['menu_class'] = 'uk-nav uk-list widget_nav_menu';

	return $nav_menu_args;
}

/**
 * Define allowable upload file types via upload_mimes
 *
 * @package         jctda
 * @since           20181003
 * @author          lpeterson
 */
function filter_upload_mimes( $mimes ) {
	$mimes['png']  = 'image/png';
	$mimes['jpg']  = 'image/jpeg';
	$mimes['jpeg'] = 'image/jpeg';
	$mimes['gif']  = 'image/gif';
	$mimes['svg']  = 'image/svg+xml';
	$mimes['webp'] = 'image/webp';
	$mimes['webm'] = 'audio/webm';
	$mimes['webm'] = 'video/webm';
	$mimes['doc']  = 'application/msword';
	$mimes['ppt']  = 'application/vnd.mspowerpoint';
	$mimes['xls']  = 'application/msexcel';
	$mimes['xml']  = 'application/xml';
	$mimes['json'] = 'javascript/json';

	return $mimes;
}

/**
 * Filters the list of attachment image attributes
 *
 * @package         jctda
 * @since           2.8.0
 * @author          lpeterson
 *
 * @param array     $attr       Attributes for the image markup.
 * @param WP_Post   $attachment Image attachment post.
 * @param str|arr   $size       Requested size. Image size or array of width and height values
 *                              (in that order). Default 'thumbnail'.
 */
function filter_wp_get_attachment_image_attributes( $attr, $attachment ) {
	if ( !in_array( 'lazyload', array_values( wp_scripts()->in_footer ), true ) )
		return $attr;

	/**
	 * Add lazyload support via LazyLoad
	 * @see https://github.com/verlok/lazyload
	 */
	if ( !is_admin() && '' !== $attr['src'] ) {

		// Provide LazyLoad with the src value
		$attr['data-src'] = $attr['src'];

		// ... and the srcset values
		$attr['data-srcset'] = isset( $attr['srcset'] ) ? $attr['srcset'] : null;

		// ... and the sizes values
		$attr['data-sizes'] = isset( $attr['sizes'] ) ? $attr['sizes'] : null;

		// Add native lazyload support
		$attr['loading'] = 'lazy';

		// Finally, strip the src value
		// $attr['src'] = null;

		// Append the lazyload class name
		$attr['class'] = $attr['class'] . ' lazyload';
	}

	return $attr;
}

/**
 * Filters the HTML that is allowed for a given context
 *
 * @package         jctda
 * @since           20181214
 * @author          lpeterson
 *
 * @global array $allowedposttags
 * @global array $allowedtags
 * @global array $allowedentitynames
 *
 * @param array[]|string $context      Context to judge allowed tags by.
 * @param string         $context_type Context name.
 */
function filter_wp_kses_allowed_html( $allowedposttags ) {
	if ( !current_user_can( 'publish_posts' ) )
		return $allowedposttags;

	$allowedposttags['iframe'] = [
		'align' => true,
		'width' => true,
		'height' => true,
		'frameborder' => true,
		'name' => true,
		'src' => true,
		'id' => true,
		'class' => true,
		'style' => true,
		'scrolling' => true,
		'marginwidth' => true,
		'marginheight' => true,
		'gesture' => true,
		'allow' => true,
		'allowfullscreen' => true,
	];

	$allowedposttags['script'] = [
		'src' => true,
		'id' => true,
		'class' => true,
		'style' => true,
		'crossorigin' => true,
	];

	return $allowedposttags;
}


