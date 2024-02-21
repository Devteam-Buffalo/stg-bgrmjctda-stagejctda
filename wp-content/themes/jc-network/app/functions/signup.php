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



	if ( !function_exists( 'jc_news_cookie' ) ) {
		function jc_news_cookie() {
			$cookie = pods_v( 'jc_news_submit', 'cookie', false );
			return $cookie;
		}
	}

	if ( !function_exists( 'jc_news_submit' ) ) {
		function jc_news_submit() {

			$html = '<style>
			#close-news-submit { cursor: pointer; }
			.news-submit { height: 200px; opacity: 1; overflow: hidden; transform: translateY(0); transition: 350ms ease; transition-property: transform,opacity,height; }
			input#news-submit:checked + .news-submit { transform: translateY(-200px); height: 0; z-index: -1; opacity: 0; }
			#gform_20 { display: flex; flex-flow: row wrap; justify-content: center; }
			#gform_20 .gform_heading { flex-basis: 100%; order: -1; }
			@media (max-width:479px) {
				#gform_20 .gform_body,
				#gform_20 .gform_footer { flex-basis: 100%; }
				#gform_fields_20 { display: flex; flex-flow: row wrap; }
				#field_20_1, #field_20_2 { flex-basis: 48%; }
				#field_20_2 { margin-left: auto; }
			}
			#gform_20 .gform_body,
			#gform_20 .gform_footer { flex-basis: auto; }
			#gform_20 .gform_title { margin-bottom: 1rem }
			#gform_20 .gform_title,
			#gform_20 .gform_description { color: var(--white); }
			#gform_submit_button_20 { margin: .5rem 0 .5rem .5rem; height: 43px; }
			#gform_ajax_spinner_20 { position: absolute; z-index: 1; top: 50%; left: 50%; transform: translate(-50%,-50%); margin: 0 .5rem; width: 100%; height: 43px; background-color: var(--opaque); }

			#gform_20 .gfield_error { position: relative; padding: .5rem 0 0; }
			#gform_20 .gfield_error .validation_message { position: absolute; }
			#gform_20 .uk-alert-danger { display: none !important; }
			#gform_20 .gfield_error .validation_message,
			#gform_20 .gfield_error > label { color: var(--opaque); }
			#gform_20 .gfield_error input[aria-invalid="true"] { background-color: var(--white); }

			#gform_confirmation_wrapper_20 .uk-alert-success { background: var(--opaque); border-color: var(--white); color: var(--black); }
			</style>';


			$html .= '<input type="checkbox" id="news-submit" class="uk-position-absolute uk-hidden" hidden>'.
			'<div class="uk-position-relative uk-position-z-index uk-padding uk-cover uk-cover-background uk-flex uk-flex-middle background-blue news-submit no-print" style="background-image:url(https://storage.googleapis.com/jctda-media/wp-content/uploads/cache/remote/storage-googleapis-com/1537419124.jpg);background-blend-mode: multiply">'.

				'<label id="close-news-submit" class="uk-position-top-right uk-padding-small" for="news-submit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--white)" stroke-width="2" stroke-linecap="square" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg><span class="sr-only">Close Newsletter Opt-In</span></label>'.

				'<div class="uk-width-1-1">'.
					'<div class="uk-container uk-container-center uk-width-xlarge-1-2 uk-width-large-5-6">'.
						'<div class="uk-text-center">';

						$html .= do_shortcode( "[gravityform id=20 ajax=true description=false]" );

					$html .= '</div>'.
					'</div>'.
				'</div>'.
			'</div>';


			$html .= '<script>
			jQuery(document).ready( function() {
				jQuery(document).on("click", "#close-news-submit", function( event ) {
					Cookies.set("jc_news_submit", true, { expires: 30, path: "/", domain: ".discoverjacksonnc.com" });
				});
			});
			jQuery(document).on( "gform_confirmation_loaded", function( event, formId ) {
				var jcNewsSubmit = function() {
					jQuery(".news-submit").remove();
					jQuery("input#news-submit").remove();
				};
				if ( formId == 20 ) {
					setTimeout( jcNewsSubmit, 5000 );
				}
			});
			</script>';

			return $html;
		}
	}

	add_action( 'before_header', function() {
		if ( !jc_news_cookie() )
			echo jc_news_submit();
	}, 1);

