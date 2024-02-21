<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Build a customized "edit post" link
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

if ( !function_exists( 'jc_page_edit' ) ) {
	function jc_page_edit() {
		$text = 'Edit this Page';
		$icon = '<span class="uk-icon-pencil uk-icon-justify"></span>&nbsp;';
		$line = '<hr class="uk-article-divider no-print">';
		$the_id = get_the_id();
		$class = 'uk-button-link no-print';

		return edit_post_link( $icon.$text, $line, '', $the_id, $class );
	}
}
