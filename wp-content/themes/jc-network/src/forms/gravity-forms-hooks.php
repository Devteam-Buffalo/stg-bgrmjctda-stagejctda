<?php
/*
**  @file               gravity-forms-hooks.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

add_filter( 'gform_confirmation_anchor', '__return_false' );

add_filter( 'gform_init_scripts_footer', '__return_true' );

add_filter( 'gform_ajax_spinner_url', 'gf_spinner_url', 10, 2 );
function gf_spinner_url( $image_src, $form ) {
	$image_src = URI . 'src/assets/img/the-spinner-1.svg';

	return $image_src;
}

// add_filter( 'gform_disable_print_form_scripts', 'disable_print_form_scripts', 10, 2 );
function disable_print_form_scripts( $disable_print_form_script, $form) {
	if ( $form['id'] == 7 ) {
		return true;
	}
	
	return $gform_disable_print_form_scripts;
}


add_filter( 'gform_field_validation', 'gf_require_cc_name', 10, 4 );
function gf_require_cc_name( $result, $value, $form, $field ) {
	if ( $field->type == 'creditcard' && $result['is_valid'] && rgempty( $field->id . '.5', $value ) ) {
		$result['is_valid'] = false;
		$result['message']  = 'Please enter the cardholder\'s name.';
	}
	
	return $result;
}



add_filter( 'gform_field_css_class', 'update_field_css_classes', 10, 3 );
function update_field_css_classes( $classes, $field, $form ) {
	$field_types = array( 'text', 'email', 'tel', 'select', 'textarea', 'radio', 'checkbox', 'range' );

	if ( in_array($field->type, $field_types) ) :
		$classes .= ' uk-form-controls';
	endif;

	return $classes;
}




/*
* Remove Next Times Default Button
------------------------------------ */
//add_filter( 'gform_submit_button_9', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
	return false;
}




/*
* Delete entry submissions for form IDs: 4, 7, 9, 10, 12
------------------------------------ */
//add_action( 'gform_after_submission_10', 'remove_entries' );
//add_action( 'gform_after_submission_7', 'remove_entries' );
//add_action( 'gform_after_submission_4', 'remove_entries' );
function remove_entries( $entry ) {
	GFAPI::delete_entry( $entry['id'] );
}
//add_action( 'gform_after_submission_9', 'remove_entries' );






//add_action( 'wp_enqueue_scripts', 'next_times_scripts' );
//add_action( 'wp_enqueue_scripts', 'next_times_scripts', 10, 2 );

//add_action( 'gform_enqueue_scripts_9', 'next_times_scripts', 10, 2 );
/*
function next_times_scripts( $form, $is_ajax ) {
	wp_dequeue_style( 'gforms_formsmain_css' );
	wp_dequeue_style( 'gforms_reset_css' );
	wp_dequeue_style( 'gforms_datepicker_css' );
	wp_dequeue_style( 'gforms_ready_class_css' );
	wp_dequeue_style( 'gforms_browsers_css' );
	
	wp_enqueue_script( 'google-maps' );
	wp_enqueue_script( 'geocomplete' );
	wp_enqueue_script( 'validation-src' );
	wp_enqueue_style( 'typeahead-css' );
	wp_enqueue_script( 'typeahead-src' );

	$data = get_data_contents();

	$type_js = ";(function($) {
		'use strict';
	
		$(document).ready(function() {

			var typeahead = {
				input: $('#next-times-input'),
				template: '{{display}} <small>{{group}}</small>',
				source: {
					routes: {
						ajax: {
							url: '{$data}',
							path: 'data.routes'
						}
					},
					stops: {
						ajax: {
							url: '{$data}',
							path: 'data.routes.stops'
						}
					}
				},
				callback: {
					onNavigateAfter: function (node, lis, a, item, query, event) {
						if (~[38,40].indexOf(event.keyCode)) {
							var resultList = node.closest('form').find('.typeahead-list'),
								activeLi = lis.filter('li.active'),
								offsetTop = activeLi[0] && activeLi[0].offsetTop - (resultList.height() / 2) || 0;
			 
							resultList.scrollTop(offsetTop);
						}
			 
					},
					onClickAfter: function (node, a, item, event) {
			 
						event.preventDefault();
			 
						var r = confirm('You just clicked the item!');
						if (r == true) {
							console.log(item);
						}
			 
						$('.typeahead-result').text('');
			 
					},
					onResult: function (node, query, result, resultCount) {
						if (query === '') return;
			 
						var text = '';
						if (result.length > 0 && result.length < resultCount) {
							text = 'Showing <strong>' + result.length + '</strong> of <strong>' + resultCount + '</strong> elements matching ' + query + '.';
						} else if (result.length > 0) {
							text = 'Showing <strong>' + result.length + '</strong> elements matching ' + query + '.';
						} else {
							text = 'No results matching ' + query + '.';
						}
						$('.typeahead-result').html(text);
			 
					},
					onMouseEnter: function (node, a, item, event) {
			 
						if (item.group === 'routes') {
							$(a).append('<span>' + item.display + 'appended item</span>')
						}
			 
					},
					onMouseLeave: function (node, a, item, event) {
			 
						$(a).find('.flag-chart').remove();
			 
					}
				},
				selector: {
					container: 'typeahead-container',
					query: 'typeahead-query',
					button: 'typeahead-button',
					filter: 'typeahead-filter',
					filterButton: 'typeahead-filter-button',
					display: 'typeahead-display',
					label: 'typeahead-label',
					dropdown: 'typeahead-dropdown',
					dropdownItem: 'typeahead-dropdown-item list-item',
					cancelButton: 'typeahead-cancel-button',
					list: 'typeahead-list data-list',
					item: 'typeahead-item list-item',
					result: 'typeahead-result list-item',
					group: 'typeahead-group data-list',
					hint: 'typeahead-hint list-item',
					empty: 'typeahead-empty list-item'
				}
			};
			
			$('#next-times-input').typeahead( typeahead );
			
		});
	
	})( jQuery );";

	$val_js = ";(function($) {
		'use strict';
	
		$(document).ready(function() {

			var validation = {
				submit: {
					settings: {
						display: 'inline',
						insertion: 'append',
						allErrors: true,
						trigger: 'click',
						button: '#typeahead-submit',
						errorClass: 'uk-form-danger',
						errorListClass: 'typeahead-error-list uk-alert-danger',
						errorListContainer: null,
						inputContainer: '#next-times-input',
						clear: 'focusin',
						scrollToError: false
					}
				}
			};

			$('#gform_9').validate( validation );
			
		});
	
	})( jQuery );";

	wp_add_inline_script( 'typeahead-src', $type_js, 'after' );

	wp_add_inline_script( 'validation-src', $val_js, 'after' );
}
*/


//add_filter( 'gform_confirmation_9', 'next_times_confirmation', 10, 4 );
//add_filter( 'gform_confirmation_10', 'next_times_confirmation', 10, 4 );
/*
function next_times_confirmation( $confirmation, $form, $entry, $ajax ) {
	$entry_data = array(
		'route' => $_POST['input_5'],
		'stop'  => $_POST['input_3'],
		'preds' => $_POST['input_11'],
	);
	$response = get_next_time_response( $entry_data );
	$predictions = json_decode( $response, true );
	$times = process_next_time_predictions( $entry_data['stop'], $entry_data['route'], $predictions );
	
	ob_start(); ?>

	<div class="data-times list-data stop-list" role="gridcell">
		<ul class="list-container">
			<li role="tabpanel">
				<h6 class="list-item-heading">
					<span>Next Stop Times \ </span>
					<small>Bus Stop <?php echo $times[0]['stop_code']; ?> | <?php echo $times[0]['stop_name']; ?></small>
				</h6>
				<hr>
				
				<?php echo get_predicted_stop_times( $times[0]['stop_code'], $times[0]['route_code'], $times[0]['predictions'][0] ); ?>
			</li>
		</ul>
	</div>

	<?php return ob_get_clean();
}
*/









/*
* THIS IS GOOD
------------------------------------ */
function bind_after_submission( $entry, $form ) { ?>
	<script>
	;(function() {
		"use strict";
		
		jQuery(document).bind('gform_confirmation_loaded', function(event, form_id, current_page) {
			$(".async").addClass("data-loaded")
		})
	})
	</script>
<?php }
//add_action( 'gform_after_submission_9', 'bind_after_submission', 10, 2 );










/*
add_filter( 'gform_replace_merge_tags', 'next_times_merge_meta', 11, 7 );
function next_times_merge_meta( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
	$next_stop_times = '{next_stop_times}';
	
	if ( strpos( $text, $next_stop_times ) === false ) :
		return $text;
	endif;

	$next_times_meta = get_next_times_meta( $entry['id'] );

	$text = str_replace( $next_stop_times, $next_times_meta, $text );
	
	GFCommon::log_debug( '         merge_tags: gf mergetag text =>        ' . print_r( $text, true ) );
	GFCommon::log_debug( '         merge_tags: gf form =>        ' . print_r( $form, true ) );
	GFCommon::log_debug( '         merge_tags: gf entry =>        ' . print_r( $entry, true ) );
	GFCommon::log_debug( '         merge_tags: gf url encode =>        ' . print_r( $url_encode, true ) );
	GFCommon::log_debug( '         merge_tags: gf $nl2br =>        ' . print_r( $nl2br, true ) );
	GFCommon::log_debug( '         merge_tags: gf format =>        ' . print_r( $format, true ) );
	
	return $text;
}

function get_next_times_meta( $entry_id ) {
	$next_times_meta = gform_get_meta( $entry_id, 'next_stop_times' );
	
	return $next_times_meta;
}
*/




//add_filter('gform_custom_merge_tags', 'next_times_custom_merge_tag', 10, 4);
/*
function next_times_custom_merge_tag( $merge_tags, $form_id, $fields, $element_id ) {
	$merge_tags[] = array( 'label' => 'Next Stop Times', 'tag' => '{next_stop_times}' );

	return $merge_tags;
}
*/


// add_filter('gform_field_content', 'next_times_merge_meta', 10, 5);



/*
function get_next_times_meta( $entry_id ) {
	$next_times_meta = gform_get_meta( $entry_id, 'next_stop_times' );
	
	return $next_times_meta;
}
*/









/*
function get_next_times() {
	$fields = array( 
		'bus_stop_code'  => $entry_data['stop'], 
		'bus_route_code' => $entry_data['route'], 
		'api_response'   => $response, 
	);

	$next_times = pods( 'api_next_times' )->add( $fields ); 

	return $next_times;
}
*/



//add_filter( 'gform_replace_merge_tags', 'djb_gform_replace_merge_tags', 10, 7 );
/**
 * Replace custom merge tags.
 *
 * @link https://www.gravityhelp.com/documentation/article/gform_replace_merge_tags/
 *
 * @param string  $text Current text in which merge tags are being replaced.
 * @param object  $form Current Form object.
 * @param object  $entry Current Entry object.
 * @param boolean $url_encode Whether or not to encode any URLs found in the replaced value.
 * @param boolean $esc_html Whether or not to encode HTML found in the replaced value.
 * @param boolean $nl2br Whether or not to convert newlines to break tags.
 * @param string  $format Determines how the value should be formatted. Default is html.
 * @return string Modified data.
 */
/*
add_filter( 'gform_replace_merge_tags', 'djb_gform_replace_merge_tags', 10, 7 );
function djb_gform_replace_merge_tags( $text, $form, $entry, $url_encode, $esc_html, $nl2br, $format ) {
	if ( strpos( $text, '{current_am_pm}' ) !== false ) {
		$text = str_replace( '{current_am_pm}', current_time( 'A' ), $text );
	}
	return $text;
}
*/



//add_filter( 'gform_entry_post_save', 'post_save', 10, 2 );
/*
function post_save( $entry, $form ) {
	$entry['1'] = rgar( $entry, '1' ) . ' testing';
	return $entry;
}
*/















// Requires Auto-Complete Add-On

/**
 * If an address input has class 'shipping', add 'shipping' to the autocomplete attribute.
 *
 * @param string   $attribute The autocomplete attribute for this input.
 * @param GF_Field $field     The Gravity Forms field object.
 * @return string The possibly-modified $attribute string.
 */
function mytheme_inject_shipping_autocomplete_token( $attribute, $field ) {
	if ( in_array( 'shipping', explode( ' ', $field['cssClass'] ), true ) ) {
		$attribute = 'shipping ' . $attribute;
	}

	return $attribute;
}
//add_filter( 'gform_autocomplete_attribute', 'mytheme_inject_shipping_autocomplete_token', 10, 2 );