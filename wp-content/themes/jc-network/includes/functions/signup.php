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

add_action( 'before_header', function() {
	if ( ! isset( $_COOKIE['jc_news_submit'] ) ) {
		ob_start();
		?>
<input type="checkbox" id="news-submit" class="uk-position-absolute uk-hidden" hidden>
<div class="news-submit uk-position-relative uk-position-z-index uk-cover uk-cover-background uk-flex uk-flex-middle background-blue no-print"
	style="background-image:url(https://www.discoverjacksonnc.com/wp-content/uploads/cache/remote/storage-googleapis-com/1537419124.jpg)">
	<label id="close-news-submit" class="uk-position-top-right uk-margin-top uk-margin-right" for="news-submit">
		<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--white)" stroke-width="2" stroke-linecap="square" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
	</label>
	<div class="uk-width-1-1">
		<div class="uk-container uk-container-center uk-width-xlarge-1-2 uk-width-large-5-6">
			<div class="uk-text-center">
				<?= do_shortcode( "[gravityform id=20 ajax=true description=false]" ) ?>
			</div>
		</div>
	</div>
</div>
<script>
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
</script>
		<?php
		echo ob_get_clean();
	}
}, 1);
