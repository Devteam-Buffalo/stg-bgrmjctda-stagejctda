<?php
/* ---------------------------------------
*
* Add ACF Options
*
* @package jc-network
*
------------------------------------ */
if ( ! defined( 'ABSPATH' ) ) exit;

$files = array(
	//'acf-hooks.php',
	'post-category-ancestor.php',
	'acf-page-granparent-location-rule.php',
	//'acf-extended-admin-columns.php',
	'page-nth-level-location-rule.php',
	'page-ancestor.php',
	'page-type-no-children.php',
	'parent-page-template.php',
	//'get-acf.php',
);

foreach( $files as $file ) :
	require_once trailingslashit( dirname(__FILE__) ) . $file;
endforeach;