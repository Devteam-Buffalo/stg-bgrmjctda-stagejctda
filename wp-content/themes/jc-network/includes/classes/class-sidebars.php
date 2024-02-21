<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Register WordPress Sidebars
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */

namespace Jctda;

/**
 * Register sidebars.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_sidebar/
 * @link   https://developer.wordpress.org/reference/functions/register_sidebars/
 * @since  1.0.0
 * @access public
 * @return void
 */
class Sidebars {
	private static $instance;

	public static function getInstance(): Sidebars {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	private function __construct() {
		add_action( 'widgets_init', [ $this, 'sidebars' ], 5 );
	}

	/**
	 * Build the sidebars containing widgets
	 *
	 * Calls {@see 'widgets_init'} action after all of the WordPress widgets have been registered
	 *
	 * @since 2.2.0
	 */
	function sidebars() {
		$defaults = [
			'before_widget' => '<section id="%1$s-widget" class="%2$s widget" style="margin:0 0 1rem">',
			'before_title' => '<h6 style="margin:1rem 0 .5rem;padding:0 0 .5rem;border-bottom:1px solid var(--light-grey);font:normal 1.25rem/1.2 var(--sans-regular);text-transform:uppercase;color:var(--green)">',
			'after_title' => '</h6>',
			'after_widget' => '</section><hr>',
		];

		$labels = [
			'Home Page' => 'The Front Page of the website; select available widgets from the left, choose setup options and re-order by dragging and dropping.',
			'Blog Page, Posts & Categories' => 'The sidebar for the Blog page, single blog posts and category, tag and date archives.',
			'TDA Pages, Docs & Categories' => 'The sidebar for the JCTDA document & member archives, TDA Docs pages and TDA documents.',
			'Mentions, Press Releases & News' => 'The sidebar for the Media Room page, single media room posts, media room archives and media room taxonomies.',
			'Sitemap Page & 404 (Page Not Found)' => 'The sidebar for the Sitemap and 404 pages.',
			'Calendar Events, Venues & Organizers' => 'The sidebar for the Calendar page, single events, venues & organizers and event archives.',
			'Contact Information' => 'The sidebar for the Contact Us page and any pages that display contact information.',
			'Blog Post Archives' => 'The sidebar for the Blog Archive page: paginated lists of 50 blog posts.',
			'Media Room Archives' => 'The sidebar for the Media Archive page: paginated lists of 50 articles.',
			'Header Signup Form' => 'The global Newsletter Signup Form displayed in the website header.',
			'Footer Signup Form' => 'The global Newsletter Signup Form displayed in the website footer.',
			'Inline Signup & Featured Event' => 'Newsletter Signup & Featured Event widgets displayed side-by-side.',
			'Header Search Form' => 'The global Newsletter Signup Form displayed in the website header.',
			'Mobile Search Form' => 'The global Website Search Form displayed in the dropdown menu.',
			'Outdoors Search Form' => 'The Search Form shown throughout the Outdoors section within the body content.',
			'Sticky Trip Plan CTA' => 'The call-to-action bar stuck to the bottom of every page.',
			'Plan Your Trip Tiles' => 'The grid of 5 tiles shown globally above the website footer.',
			'Blog Post Tiles' => 'The row of 3 tiles that show the latest blog posts, and list of text-based links displaying the last 5 blog posts.',
			'Advertisements' => 'The linked graphics that advertise sections of the site, shown within the header dropdown menus.',
			'Breadcrumbs' => 'The row of contextual links within the website header that allow for navigation back to the front page.',
			'Default Sidebar' => 'The default sidebar for pages requiring a sidebar. Default sidebar contents can be seen on the Blog page.',
		];

		/**
		 * Builds the definition for a single sidebar and returns the ID.
		 *
		 * @global array $wp_registered_sidebars Stores the new sidebar in this array by sidebar ID.
		 * @param array|string $args {
		 *     Optional. Array or string of arguments for the sidebar being registered.
		 *     @type string $name The name or title of the sidebar. Default 'Sidebar $instance'
		 *     @type string $id The unique identifier. Default 'sidebar-$instance'.
		 *     @type string $description Description of the sidebar. Default empty string.
		 *     @type string $class Extra CSS classes for each sidebar. Default empty.
		 *     @type string $before_widget Prepend each widget's HTML. Default '<ul>'.
		 *     @type string $after_widget Append each widget's HTML. Default '</ul>'.
		 *     @type string $before_title Prepend each sidebar's title. Default '<h2>'.
		 *     @type string $after_title  Append each sidebar's title. Default '</h2>'.
		 * }
		 * @return string Sidebar ID added to $wp_registered_sidebars global.
		 */
		foreach ( $labels as $name => $description )
			register_sidebar([
				'id' => __( sanitize_key( $name ), 'jctda' ),
				'class' => __( sanitize_title_with_dashes( $name ), 'jctda' ),
				'name' => __( sanitize_text_field( $name ), 'jctda' ),
				'description' => __( sanitize_textarea_field( $description ), 'jctda' ),
			] + $defaults);

		unset($labels);
	}

}
