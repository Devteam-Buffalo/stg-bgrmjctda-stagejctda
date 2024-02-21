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
	$banner_message = get_option('banner_message', false);
	if ( !empty($banner_message) && function_exists( 'banner' ) ) {
		$banner_label = get_option('banner_label', '');
		$banner_link = get_option('banner_link', '');
		$banner_text = get_option('banner_text', '');
		$banner = [
			'message' => $banner_message,
			'label' => $banner_label,
			'link' => $banner_link,
			'text' => $banner_text,
		];
		echo banner( $banner );
	}
}, 5);
if ( !function_exists( 'banner' ) ) {
	function banner( $data = [] ) {
		if ( !empty( $data ) ) {
			$html = '<input type="checkbox" id="web-banner" hidden style="display:none!important">'.
				'<div class="web-banner no-print">'.
					'<label for="web-banner"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></label>'.
				'<p>';

			if ( isset( $data['label'] ) && !empty( $data['label'] ) )
				$html .= '<strong>'.esc_html($data['label']).'&nbsp;</strong>';

			if ( isset( $data['message'] ) && !empty( $data['message'] ) )
				$html .= esc_html($data['message']);

			if ( isset( $data['link'] ) && !empty( $data['link'] ) ) {
				$text = !empty($data['text']) ? esc_html($data['text']) : esc_attr($data['link']);
				$html .= '&nbsp;<a href="'.esc_url($data['link']).'">'.$text.'</a>';
			}

			$html .= '</p>'.
			'</div>';

			return $html;
		}
	}
}
