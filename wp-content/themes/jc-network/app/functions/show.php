<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     A dev helper tool to pretty-print (via print_r) any provided string, integer, array, object, etc.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190407
 * @author          lpeterson
 */

if ( !function_exists( 'show' ) ) {
	function show( $code = null ) {
		if ( !isset( $code ) || is_null( $code ) )
			return;

		echo '<style>
		.show { margin: 10px auto; padding: 10px; max-width: 75% }
		.show pre { max-height: 250px;border: 1px solid mediumgrey;background: white;font: normal 13px/20px monospace;color: #333;-moz-tab-size: 4;tab-size: 4;overflow: hidden;overflow-x: auto;overflow-y: scroll;white-space: pre-wrap }
		</style>';

		echo '<div class="show">'.
			'<div>Type: <strong>'.ucfirst( gettype( $code ) ).'</strong></div>'.
			'<details>'.
				'<summary>var_dump</summary>'.
				'<div>'.
					'<pre>';
					var_dump( $code );
					echo '</pre>'.
				'</div>'.
			'</details>'."\n".
			'<details>'.
				'<summary>print_r</summary>'.
				'<div>'.
					'<pre>';
					print_r( $code );
					echo '</pre>'.
				'</div>'.
			'</details>'.
		'</div>'."\n";
	}
}
