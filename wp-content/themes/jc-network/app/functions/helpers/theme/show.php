<?php
/*
**  @file               show.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/18/18
*/
defined( 'ABSPATH' ) || exit;

/*
* Preformatted variable print function.
*
* @param $data (Object or array you want to test)
* @returns string
*
* Example:
* $array = array( [0] => 'item1', [1] => 'item2' );
* 
* show( $array );
------------------------------------ */
if( ! function_exists( 'show' ) ) {
	function show( $data = null ) {
		echo '<div class="uk-scrollable-text">';
			echo '<pre class="uk-code"><code>';
				esc_attr( print_r( $data ) );
			echo '</code></pre>';
		echo '</div>';
	}
}