<?php
/*
**  @file    docs.php
**  
**  @desc    
**  
**  @path    /docs.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/24/17
*/
defined( 'ABSPATH' ) || exit;

if( defined( 'RESTSPLAIN_DIR' ) ) {
	add_filter( 'restsplain_docs_base', function() {
		return '/api/docs';
	} );
}