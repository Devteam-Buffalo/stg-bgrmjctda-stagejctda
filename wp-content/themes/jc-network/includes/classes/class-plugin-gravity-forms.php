<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Gravity Forms modifications
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */

namespace Jctda\Gravity_Forms;
use \WP_Error;
use \GFAPI;
use \GFCommon;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};
	add_filter( 'gform_export_field_value', $n('gform_export_field_value'), 10, 4 );
	add_action( 'gform_entry_created', $n('gform_entry_created'), 10, 2 );
	add_filter( 'pre_option_rg_gforms_disable_css', $n('pre_option_rg_gforms_disable_css') );
	add_filter( 'gform_replace_merge_tags', $n('gform_replace_merge_tags'), 10, 2 );
	add_filter( 'gform_field_css_class', $n('gform_field_css_class'), 10, 3 );
	// add_filter( 'gform_address_types', $n('gform_address_types'), 10, 2 );
	add_filter( 'gform_ajax_spinner_url', $n('gform_ajax_spinner_url'), 10, 2 );
	add_filter( 'gform_validation_message', $n('gform_validation_message'), 10, 2 );
	add_filter( 'gform_submit_button_13', $n('gform_submit_button_13'), 10, 2 );
	add_filter( 'gform_confirmation_19', $n('gform_confirmation_19'), 10, 4 );
	add_action( 'gform_enqueue_scripts_6', $n('gform_enqueue_scripts_6'), 10, 2 );
	add_action( 'gform_after_submission_20', $n('gform_after_submission_20'), 10, 2 );
	add_action( 'wp_ajax_nopriv_gf_button_get_form', $n('gf_button_ajax_get_form') );
	add_action( 'wp_ajax_gf_button_get_form', $n('gf_button_ajax_get_form') );
	add_filter( 'gform_shortcode_button', $n('gf_button_shortcode'), 10, 3 );
}

function gform_export_field_value( $value, $form_id, $field_id, $entry ) {
	switch ( $value ) {
		case 'Alabama':
			$value = 'AL';
			break;
		case 'Alaska':
			$value = 'AK';
			break;
		case 'American Samoa':
			$value = 'AS';
			break;
		case 'Arizona':
			$value = 'AZ';
			break;
		case 'Arkansas':
			$value = 'AR';
			break;
		case 'California':
			$value = 'CA';
			break;
		case 'Colorado':
			$value = 'CO';
			break;
		case 'Connecticut':
			$value = 'CT';
			break;
		case 'Delaware':
			$value = 'DE';
			break;
		case 'District of Columbia':
			$value = 'DC';
			break;
		case 'Florida':
			$value = 'FL';
			break;
		case 'Georgia':
			$value = 'GA';
			break;
		case 'Guam':
			$value = 'GM';
			break;
		case 'Hawaii':
			$value = 'HI';
			break;
		case 'Idaho':
			$value = 'ID';
			break;
		case 'Illinois':
			$value = 'IL';
			break;
		case 'Indiana':
			$value = 'IN';
			break;
		case 'Iowa':
			$value = 'IA';
			break;
		case 'Kansas':
			$value = 'KS';
			break;
		case 'Kentucky':
			$value = 'KY';
			break;
		case 'Louisiana':
			$value = 'LA';
			break;
		case 'Maine':
			$value = 'ME';
			break;
		case 'Maryland':
			$value = 'MD';
			break;
		case 'Massachusetts':
			$value = 'MA';
			break;
		case 'Michigan':
			$value = 'MI';
			break;
		case 'Minnesota':
			$value = 'MN';
			break;
		case 'Mississippi':
			$value = 'MS';
			break;
		case 'Missouri':
			$value = 'MO';
			break;
		case 'Montana':
			$value = 'MT';
			break;
		case 'Nebraska':
			$value = 'NE';
			break;
		case 'Nevada':
			$value = 'NV';
			break;
		case 'New Hampshire':
			$value = 'NH';
			break;
		case 'New Jersey':
			$value = 'NJ';
			break;
		case 'New Mexico':
			$value = 'NM';
			break;
		case 'New York':
			$value = 'NY';
			break;
		case 'North Carolina':
			$value = 'NC';
			break;
		case 'North Dakota':
			$value = 'ND';
			break;
		case 'Northern Mariana Islands':
			$value = 'NM';
			break;
		case 'Ohio':
			$value = 'OH';
			break;
		case 'Oklahoma':
			$value = 'OK';
			break;
		case 'Oregon':
			$value = 'OR';
			break;
		case 'Pennsylvania':
			$value = 'PA';
			break;
		case 'Puerto Rico':
			$value = 'PR';
			break;
		case 'Rhode Island':
			$value = 'RI';
			break;
		case 'South Carolina':
			$value = 'SC';
			break;
		case 'South Dakota':
			$value = 'SD';
			break;
		case 'Tennessee':
			$value = 'TN';
			break;
		case 'Texas':
			$value = 'TX';
			break;
		case 'Utah':
			$value = 'UT';
			break;
		case 'U.S. Virgin Islands':
			$value = 'VI';
			break;
		case 'Vermont':
			$value = 'VT';
			break;
		case 'Virginia':
			$value = 'VA';
			break;
		case 'Washington':
			$value = 'WA';
			break;
		case 'West Virginia':
			$value = 'WV';
			break;
		case 'Wisconsin':
			$value = 'WI';
			break;
		case 'Wyoming':
			$value = 'WY';
			break;
		case 'Armed Forces Americas':
			$value = 'AA';
			break;
		case 'Armed Forces Europe':
			$value = 'AE';
			break;
		case 'Armed Forces Pacific':
			$value = 'AP';
			break;
	}

	return $value;
}

function gform_entry_created( $entry, $form ) {
    $token = '9e5cc72a8326ca';
    $ipinfo = 'http://ipinfo.io/%s';
    if ( rgar( $entry, 'status' ) === 'spam' ) return;
    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? rgar( $entry, 'ip' );
    $remote = wp_remote_get( add_query_arg( [ 'token' => $token ], wp_sprintf( $ipinfo, $user_ip ) ) );
    if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) return;
    $response = json_decode( wp_remote_retrieve_body( $remote ), true );
    $entry_id = (string) rgar( $entry, 'id' );
    foreach ( $form['fields'] as $field ) {
        $field_name = rgar( $field, 'inputName' );
        if ( 'hidden' === rgar( $field, 'type' ) && isset( $response[$field_name] ) ) {
            $field_id = (string) rgar( $field, 'id' );
            $field_value = (string) rgar( $response, $field_name );
            GFAPI::update_entry_field( $entry_id, $field_id, $field_value );
        }
    }
}

function pre_option_rg_gforms_disable_css() {
	return true;
}

function gform_replace_merge_tags( $text, $form ) {
	$merge_tag = '{archive_title}';
	if ( strpos( $text, $merge_tag ) === false || ! empty( $form ) ) return $text;
	return str_replace( $merge_tag, get_the_archive_title(), $text );
}

function gform_field_css_class( $classes, $field, $form ) {
	if ( in_array( $field->type, ['text', 'email', 'tel', 'select', 'textarea', 'radio', 'checkbox', 'range'] ) ) $classes .= ' uk-form-controls';
	return $classes;
}

function gform_address_types( $address_types, $form_id ) {
	$address_types["us"] = [
	"label" => "United States",
	"country" => "US",
	"zip_label" => "Zip Code",
	"state_label" => "State",
	"states" => [ "" => "", "AL" => "Alabama", "AK" => "Alaska", "AZ" => "Arizona", "AR" => "Arkansas", "CA" => "California", "CO" => "Colorado", "CT" => "Connecticut", "DE" => "Delaware", "DC" => "District of Columbia", "FL" => "Florida", "GA" => "Georgia", "GU" => "Guam", "HI" => "Hawaii", "ID" => "Idaho", "IL" => "Illinois", "IN" => "Indiana", "IA" => "Iowa", "KS" => "Kansas", "KY" => "Kentucky", "LA" => "Louisiana", "ME" => "Maine", "MD" => "Maryland", "MA" => "Massachusetts", "MI" => "Michigan", "MN" => "Minnesota", "MS" => "Mississippi", "MO" => "Missouri", "MT" => "Montana", "NE" => "Nebraska", "NV" => "Nevada", "NH" => "New Hampshire", "NJ" => "New Jersey", "NM" => "New Mexico", "NY" => "New York", "NC" => "North Carolina", "ND" => "North Dakota", "OH" => "Ohio", "OK" => "Oklahoma", "OR" => "Oregon", "PA" => "Pennsylvania", "PR" => "Puerto Rico", "RI" => "Rhode Island", "SC" => "South Carolina", "SD" => "South Dakota", "TN" => "Tennessee", "TX" => "Texas", "UT" => "Utah", "VT" => "Vermont", "VA" => "Virginia", "WA" => "Washington", "WV" => "West Virginia", "WI" => "Wisconsin", "WY" => "Wyoming" ]

	];

	return $address_types;
}

function gform_ajax_spinner_url( $image_src, $form ) {
	return 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1heFlNaWQgbWVldCI+PHBhdGggZmlsbD0iI2QwZGZlYSIgZD0iTTIwLjIwMSA1LjE2OWMtOC4yNTQgMC0xNC45NDYgNi42OTItMTQuOTQ2IDE0Ljk0NiAwIDguMjU1IDYuNjkyIDE0Ljk0NiAxNC45NDYgMTQuOTQ2czE0Ljk0Ni02LjY5MSAxNC45NDYtMTQuOTQ2Yy0uMDAxLTguMjU0LTYuNjkyLTE0Ljk0Ni0xNC45NDYtMTQuOTQ2em0wIDI2LjU4Yy02LjQyNSAwLTExLjYzNC01LjIwOC0xMS42MzQtMTEuNjM0IDAtNi40MjUgNS4yMDktMTEuNjM0IDExLjYzNC0xMS42MzQgNi40MjUgMCAxMS42MzMgNS4yMDkgMTEuNjMzIDExLjYzNCAwIDYuNDI2LTUuMjA4IDExLjYzNC0xMS42MzMgMTEuNjM0eiIvPjxwYXRoIGZpbGw9IiMwNjkiIGQ9Im0yNi4wMTMgMTAuMDQ3IDEuNjU0LTIuODY2YTE0Ljg1NSAxNC44NTUgMCAwIDAtNy40NjYtMi4wMTJ2My4zMTJjMi4xMTkgMCA0LjEuNTc2IDUuODEyIDEuNTY2eiI+PGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlVHlwZT0ieG1sIiBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgZnJvbT0iMCAyMCAyMCIgdG89IjM2MCAyMCAyMCIgZHVyPSIwLjVzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSIvPjwvcGF0aD48L3N2Zz4=';
}

function gform_validation_message( $message, $form ) {
	$css_id = 'gform-validation-message-'.$form['id'];
	$css_class = 'uk-alert uk-alert-danger';
	$close = '<a href="#0" id="close-'.$css_id.'" class="uk-alert-close uk-close"></a>';
	$css_style = "#{$css_id} { padding-right: 24px; max-width: 50ch; }";
	$css_style .= "#{$css_id} h2.gform_submission_error { font-size: clamp(13px,3vw,19px); color: var(--red); }";
	$css_style = "<style>{$css_style}</style>";
	$pattern = '<div id="%s" class="%s" data-uk-alert>%s %s %s</div>';
	return wp_sprintf( $pattern, $css_id, $css_class, $close, $message, $css_style );
}

function gform_submit_button_13( $button, $form ) {
	$form_id = $form['id'];
	$data = "function gf_sms_click() {
		if ( window['gf_submitting_{$form_id}'] ) {
			return false;
		}
		if ( ! $('#gform_{$form_id}')[0].checkValidity || $('#gform_{$form_id}')[0].checkValidity() ) {
			window['gf_submitting_{$form_id}'] = true;
		}
	}
	function gf_sms_key() {
		if ( event.keyCode == {$form_id} ) {
			if ( window['gf_submitting_{$form_id}'] ) {
				return false;
			}
			if ( ! $('#gform_{$form_id}')[0].checkValidity || $('#gform_{$form_id}')[0].checkValidity() ) {
				window['gf_submitting_{$form_id}'] = true;
			}
			$('#gform_{$form_id}').trigger( 'submit', [true] );
		}
	}";
	wp_add_inline_script( 'jquery', $data, 'after' );

	return '<button id="gform_submit_button_'.$form_id.'" class="gform_button button uk-button uk-button-primary uk-button-large uk-width-1-1" title="Send this Location\'s Details via SMS" value="Send Location Details SMS" onclick="gf_sms_click()" onkeypress="gf_sms_key()" type="submit"><i class="uk-icon-commenting"></i> Send Message Now</button>';

}

function gform_confirmation_19( $confirmation, $form, $entry, $ajax ) {
	$origin = rgar( $entry, '2' ) ?: false;
	$destination = rgar( $entry, '11' ) ?: false;
	if ( !$origin || !$destination ) return $confirmation;
	$origin = urlencode( $origin );
	$destination = urlencode( $destination );
	$key = 'AIzaSyAt8B_YwNZbkQyIhoodSEGwfzrbWwVxn9o';
	$iframe_src = esc_url_raw( "https://www.google.com/maps/embed/v1/directions?key={$key}&origin={$origin}&destination={$destination}" );
	$iframe_class = 'uk-width-1-1 uk-height-1-1';
	$iframe_width = '100%';
	$iframe_height = '100%';
	$iframe_style = 'border:0 none;max-height:300px;overflow-x:none;overflow-y:scroll;';
	$pattern = '<iframe src="%s" class="%s" width="%s" height="%s" style="%s" allowtransparency="true" frameborder="0" scrolling="yes" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen></iframe>';
	return wp_sprintf( $pattern, $iframe_src, $iframe_class, $iframe_width, $iframe_height, $iframe_style );
}

function gform_enqueue_scripts_6( $form, $is_ajax ) {
	$css = '#input_6_8{display:table;display:flow-root}
	#input_6_8>span{display:block;width:100%;margin:5px 0}
	@media all and (min-width:480px){
		#input_6_8>span{display:inline-block;width:49%;margin:5px 0}
		#input_6_8>span:nth-child(odd){margin-right:1%;float:left}
		#input_6_8>span:nth-child(even){margin-left:1%;float:right}
	}
	#gform_fields_6{margin: 0 0 .5rem 0}
	#input_6_14{display:table;display:flow-root}
	#input_6_14>li{display:block;width:100%}
	@media all and (min-width:768px){
		#gform_fields_6{margin: 0 0 1rem 0}
		#input_6_14>li{display:inline-block;width:49%;margin:0}
		#input_6_14>li:nth-child(odd){margin-right:1%;float:left}
		#input_6_14>li:nth-child(even){margin-left:1%;float:right}
	}
	#gform_fields_6 .hidden_label.gfield_visibility_visible,#gform_fields_6 .field_admin_only{margin:0}';
	wp_enqueue_style( 'gform_chosen' );
	wp_add_inline_style( 'jctda', $css );
}
function gform_after_submission_20( $entry, $form ) {
	pods_v_set( true, 'jc_news_submit', 'cookie' );
}

function gf_button_ajax_get_form() {
	$form_id = isset( $_GET['form_id'] ) ? absint( $_GET['form_id'] ) : 0;
	gravity_form( $form_id,true, false, false, false, true );
	die();
}
function gf_button_shortcode( $shortcode_string, $attributes, $content ) {
	$a = shortcode_atts( array(
		'title' => false,
		'description' => false,
		'id' => 0,
		'field_values' => '',
		'tabindex' => -1,
		'space_name' => '',
		'button_text' => '',
		'button_class' => '',
	), $attributes );

	$form_id = absint( $a['id'] );
	if ( $form_id < 1 ) return 'Missing the ID attribute.';
	gravity_form_enqueue_scripts( $form_id, true );

	$ajax_url = admin_url( 'admin-ajax.php' );

	$html = sprintf( '<button id="gf_button_get_form_%d" class="%s">%s</button>', $form_id, $a['button_class'], $a['button_text'] );
	$html .= sprintf( '<div id="gf_button_form_container_%d" style="display:none;"></div>', $form_id );
	$html .= "<script>
			(function (JCTDA, $) {
			$('#gf_button_get_form_{$form_id}').click(function(){
				var button = $(this);
				$.get('{$ajax_url}?action=gf_button_get_form&form_id={$form_id}',function(response){
					$('#gf_button_form_container_{$form_id}').html(response).show();
					if(window['gformInitDatepicker']) {gformInitDatepicker();}
					button.remove();
				});
			});
		}(window.JCTDA = window.JCTDA || {}, jQuery));
		</script>";
	return $html;
}


