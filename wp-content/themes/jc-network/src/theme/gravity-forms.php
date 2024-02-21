<?php
/*
**  @file    gravity-forms.php
**  @desc    Changes to Gravity Forms
**  @info    
**  @path    /inc/theme-setup/gravity-forms.php
**  @package jc-network
**  @author  Lee Peterson
**  @date    4/30/17
*/


/*
* Convert state names to abbreviations
------------------------------------ */
add_filter( 'gform_address_types', 'gf_state_abbr', 10, 2 );

function gf_state_abbr( $address_types, $form_id ) {
	$address_types["us"] = array(
		"label" => "United States",
		"country" => "US",
		"zip_label" => "Zip Code",
		"state_label" => "State",
		"states" => array(
			"" => "",
			"AL" => "Alabama",
			"AK" => "Alaska",
			"AZ" => "Arizona",
			"AR" => "Arkansas",
			"CA" => "California",
			"CO" => "Colorado",
			"CT" => "Connecticut",
			"DE" => "Delaware",
			"DC" => "District of Columbia",
			"FL" => "Florida",
			"GA" => "Georgia",
			"GU" => "Guam",
			"HI" => "Hawaii",
			"ID" => "Idaho",
			"IL" => "Illinois",
			"IN" => "Indiana",
			"IA" => "Iowa",
			"KS" => "Kansas",
			"KY" => "Kentucky",
			"LA" => "Louisiana",
			"ME" => "Maine",
			"MD" => "Maryland",
			"MA" => "Massachusetts",
			"MI" => "Michigan",
			"MN" => "Minnesota",
			"MS" => "Mississippi",
			"MO" => "Missouri",
			"MT" => "Montana",
			"NE" => "Nebraska",
			"NV" => "Nevada",
			"NH" => "New Hampshire",
			"NJ" => "New Jersey",
			"NM" => "New Mexico",
			"NY" => "New York",
			"NC" => "North Carolina",
			"ND" => "North Dakota",
			"OH" => "Ohio",
			"OK" => "Oklahoma",
			"OR" => "Oregon",
			"PA" => "Pennsylvania",
			"PR" => "Puerto Rico",
			"RI" => "Rhode Island",
			"SC" => "South Carolina",
			"SD" => "South Dakota",
			"TN" => "Tennessee",
			"TX" => "Texas",
			"UT" => "Utah",
			"VT" => "Vermont",
			"VA" => "Virginia",
			"WA" => "Washington",
			"WV" => "West Virginia",
			"WI" => "Wisconsin",
			"WY" => "Wyoming"
		)
	);
	
	return $address_types;
}

add_filter( 'gform_confirmation_anchor', '__return_false' );
add_filter( 'pre_option_rg_gforms_disable_css', '__return_true' );










if ( !class_exists( 'JC_Edit_Gravity_Form' ) ) {

	/**
	 * Plugin Class
	 */
	final class JC_Edit_Gravity_Form {

		/**
		 * Form IDs
		 *
		 * @since  1.0.0
		 * @var mixed
		 * @access public
		 */
		public static $form_IDs;


		/**
		 * Empty constructor
		 *
		 * @since  1.0.0
		 * @return  void
		 */
		public function __construct() {}


		/**
		 * Init plugin
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public static function init() {

			add_filter( 'gform_shortcode_form', array( __CLASS__, 'gform_shortcode_form' ), 10, 3  );
			add_action( 'admin_bar_menu',       array( __CLASS__, 'admin_bar_menu' ),       79.797 );
			add_action( 'wp_head',              array( __CLASS__, 'print_styles' ),         10     );
		}


		/**
		 * Hook to [gravityform] shortcode to collect Form IDs
		 *
		 * @since  1.0.0
		 * @param string  $shortcode_string Shortcode string
		 * @param mixed   $attributes       Shortcode attributes
		 * @param string  $content          Shortcode content
		 * @return string                   Unmodified shortcode string
		 */
		public static function gform_shortcode_form( $shortcode_string, $attributes, $content ) {

			// Check capability
			if ( !GFAPI::current_user_can_any( 'gravityforms_edit_forms' ) ) {
				return $shortcode_string;
			}

			// Check that Form ID is set properly
			if ( !isset( $attributes['id'] ) || !is_numeric( $attributes['id'] ) ) {
				return $shortcode_string;
			}

			// Add Form ID to global variable
			self::$form_IDs[] = $attributes['id'];

			// Return unmodified string
			return $shortcode_string;
		}


		/**
		 * Add new Toolbar nodes
		 *
		 * @since  1.0.0
		 * @param mixed   $toolbar WP_Admin_bar instance
		 * @return void
		 */
		public static function admin_bar_menu( $toolbar ) {

			// Check there is at least one form on the page
			if ( empty( self::$form_IDs ) ) {

				return;
			}

			// Add single node
			if ( count( self::$form_IDs ) === 1 ) {

				$form_ID = self::$form_IDs[0];

				$args = array(
					'id'     => 'admin-bar-edit-links-for-gravity-forms-item-' . $form_ID,
					'href'   => admin_url( 'admin.php?page=gf_edit_forms&id=' . $form_ID ),
					'title'  => __( 'Edit GForm', 'admin-bar-edit-links-for-gravity-forms' ),
					'meta'   => array(
						'class' => 'admin-bar-edit-links-for-gravity-forms-item-top'
					),
				);

				// Add Toolbar node
				$toolbar->add_node( $args );
			}

			// Add multiple nodes (with parent)
			elseif ( count( self::$form_IDs ) > 1 ) {

				// Parent node args
				$args = array(
					'title' => __( 'Edit GForms', 'admin-bar-edit-links-for-gravity-forms' ),
					'id'    => 'admin-bar-edit-links-for-gravity-forms-group',
					'meta'   => array(
						'class' => 'admin-bar-edit-links-for-gravity-forms-item-top'
					),
				);

				// Add parent node
				$toolbar->add_node( $args );

				// Loop through Form IDs
				foreach ( self::$form_IDs as $form_ID ) {

					// Get form data
					$form = GFAPI::get_form( $form_ID );

					// Child node args
					$args = array(
						'id'     => 'admin-bar-edit-links-for-gravity-forms-item-' . $form_ID,
						'parent' => 'admin-bar-edit-links-for-gravity-forms-group',
						'href'   => admin_url( 'admin.php?page=gf_edit_forms&id=' . $form_ID ),
						'title'  => $form['title'],
						'meta'   => array(
							'class' => 'admin-bar-edit-links-for-gravity-forms-item-sub'
						),
					);

					// Add child node
					$toolbar->add_node( $args );
				}
			}
		}


		/**
		 * Print some CSS to add an icon to the Toolbar node
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public static function print_styles() {

			// Check this is front and Toolbar is showing
			if ( !is_admin() && is_admin_bar_showing() ) {
				echo "\n<style>.admin-bar-edit-links-for-gravity-forms-item-top>.ab-item:before{content:'\\f464';top:2px}</style>\n";
			}
		}


	} // END GF_Toolbar_Edit_Links class

	// Init plugin
	add_action( 'plugins_loaded', array( 'JC_Edit_Gravity_Form', 'init' ) );

} // END if class_exists check


// Strings for PO Edit
if ( false ) {
	__( 'Adds "Edit GForm" link to Admin Bar on pages with Gravity Forms shortcodes', 'admin-bar-edit-links-for-gravity-forms' );
}











































