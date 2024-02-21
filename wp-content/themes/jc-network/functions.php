<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Entry point for theme
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181102
 * @author          lpeterson
 */

// Useful global constants.
define( 'JCTDA_VERSION', wp_get_theme()->get('Version') );
define( 'JCTDA_TEXT_DOMAIN', wp_get_theme()->get('Text Domain') );
define( 'JCTDA_TEMPLATE_URL', get_template_directory_uri() );
define( 'JCTDA_PATH', get_template_directory() );
define( 'JCTDA_INC', JCTDA_PATH . '/includes' );

require_once JCTDA_PATH . '/vendor/autoload.php';
require_once JCTDA_INC . '/classes/class-plugin-gravity-forms.php';
// require_once JCTDA_INC . '/classes/class-plugin-searchwp.php';
require_once JCTDA_INC . '/classes/class-plugin-facetwp.php';
// require_once JCTDA_INC . '/classes/class-recent-posts-widget.php';
require_once JCTDA_INC . '/classes/class-sidebars.php';
require_once JCTDA_INC . '/actions.php';
require_once JCTDA_INC . '/filters.php';
require_once JCTDA_INC . '/core.php';
require_once JCTDA_INC . '/blocks.php';
require_once JCTDA_INC . '/constants.php';

foreach ( glob( JCTDA_INC.'/functions/*.php' ) as $function ) require_once $function;

Jctda\Core\setup();
Jctda\Blocks\setup();
Jctda\Gravity_Forms\setup();
Jctda\Sidebars::getInstance();
// Jctda\Search_WP::getInstance();
new Jctda\Facet_WP;

// add_action('widgets_init', function() {
	// return register_widget( new Jctda\Recent_Blog_Posts );
// });

add_filter( 'searchwp_dashboard_widget', '__return_false' );

add_filter( 'searchwp_admin_bar', '__return_false' );

add_filter( 'searchwp_failed_index_notice', '__return_false' );

add_filter( 'searchwp_show_conflict_notices', '__return_false' );

add_filter( 'searchwp_show_filter_conflict_notices', '__return_false' );

add_filter( 'searchwp_missing_integration_notices', '__return_false' );

add_filter( 'searchwp_in_admin', '__return_false' );

add_filter( 'searchwp_refine_and_results', '__return_false' );

add_filter( 'searchwp_nuke_on_delete', '__return_true' );

add_filter( 'searchwp_index_attachments', '__return_false' );

add_filter( 'searchwp_index_comments', '__return_false' );

add_filter( 'searchwp_omit_document_processing', '__return_true' );

add_filter( 'searchwp_purge_pdf_content', '__return_true' );

add_filter( 'searchwp_skip_vendor_libs', '__return_true' );

add_filter( 'searchwp_license_key', function(){
    return '82e7a93051a3f1b42be06124b90e5cdd';
});

add_filter( 'searchwp_log_search', function( $log, $engine, $search_terms, $number_of_results ) {
    return ! is_user_logged_in();
}, 10, 4 );

add_filter( 'searchwp_settings_cap', function() {
    return 'administrator';
});

add_filter( 'searchwp_statistics_cap', function() {
    return 'rawlemurdy';
});
add_filter( 'searchwp_post_statuses', function( $post_status, $engine ) {
    return ['publish'];
}, 10, 2 );

// add_filter( 'searchwp_indexed_post_types', function( $post_types ) {
//     $post_types = [
//         'page', 'post', 'tribe_events',
//         'outdoor', 'attraction', 'jc_food_drink', 'jc_lodging', 'wedding', 'town',
//         'jc_trip_idea', 'jc_visitor_gallery',
//     ];
//     return $post_types;
// });
add_filter( 'searchwp_live_search_posts_per_page', function() {
    return 10;
});


function et_theme_enqueue_stylesheet() {
	$current_date_time = date('YmdHis');
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/custom-style.css', array(), $current_date_time);
}
add_action( 'wp_enqueue_scripts', 'et_theme_enqueue_stylesheet' );

// function add_cors_header() {
//     header("Access-Control-Allow-Origin: https://stg-bgrmjctda-stagejctda.kinsta.cloud");
// }
// add_action('init', 'add_cors_header');
// header('X-Frame-Options: ALLOW-FROM https://stg-bgrmjctda-stagejctda.kinsta.cloud');

// function add_content_security_policy_header() {
//     header("Content-Security-Policy: frame-src 'self' https://www.youtube.com;");
// }
// add_action('send_headers', 'add_content_security_policy_header');


// add_filter( 'gform_export_field_value', 'set_export_values', 10, 4 );
// function set_export_values( $value, $form_id, $field_id, $entry ) {
//     if($form_id == 6){
//         print_r($field_id);
//     }
//     // switch ( $field_id ) {
//     //     case 'custom_field1' :
//     //         $value = 'valueforcustomfield1';
//     //         break;
//     //     case 'custom_field2' :
//     //         $value = 'valueforcustomfield2';
//     //         break;
//     // }
 
//     // return $value;
// }

// add_filter( 'gform_export_field_value', 'your_function_name', 999, 4 );

// function your_function_name($value, $form, $field, $entry) {
//     wp_die("Test");
//     print_r($value);
//     print_r($form);
//     print_r($field);
//     print_r($entry);
//     die;
//     // Check if the entry is from Form ID 6, "Visitor Guide," and Field ID 8, "Mailing Address"
//     //if ($form['id'] == 6 && $field['id'] == 8 && $input_id == 4) {
//         if ($form['id'] == 6 && $field->id == 8 && $input_id == 4) {
//             wp_die("Test");
//         // Create an array to map full state names to abbreviations
//         $state_name_to_abbreviation = array(
//             'North Carolina' => 'NC',
//             // Add more state mappings here as needed
//         );

//         // Check if the value exists in the mapping array and replace it
//         if (array_key_exists($value, $state_name_to_abbreviation)) {
//             return $state_name_to_abbreviation[$value];
//         }
//     }

//     // Return the original value for other fields
//     // return $value;
// }



add_filter( 'gform_export_field_value', 'set_export_values', 10, 4 );
function set_export_values( $value, $form_id, $field_id, $entry ) {
    if($form_id == 24 || $form_id == 6){

        $state_name_to_abbreviation = array(
            'North Carolina' => 'NC',
            // Add more state mappings here as needed
        );

        switch ( $field_id ) {
            case '8.4' :
                $value = (isset( $state_name_to_abbreviation[$value]) ? $state_name_to_abbreviation[$value] : $value);
                break;
        }
    }
 
    return $value;
}