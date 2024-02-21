<?php
if( ! function_exists( 'show' ) ) {
	/* ---------------------------------------
	*
	* Preformatted variable print function.
	*
	* @param $data (Object or array you want to test)
	* @returns string
	*
	* Example:
	* $array = array( [0] => 'item1', [1] => 'item2' );
	* 
	* show( $array );
	*
	------------------------------------ */
	function show( $data ) {
		//$jc_user = wp_get_current_user();
		
		//if( in_array( 'administrator', (array) $jc_user->roles ) ) {
			echo '<pre class="uk-code"><code>';
				esc_attr( print_r( $data ) );
			echo '</code></pre>';
		//}
	}
}