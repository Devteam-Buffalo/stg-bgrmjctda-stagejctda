<?php
/*
**  @file               helpers.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

$files = array(
	'parse/explode-data.php',
	'validators/images-exist.php',
	//'validators/image-exists.php',
	'acf/acf.php',
	//'blog/blog-meta.php',
	//'blog/categorized-blog.php',
	//'blog/category-transient-flusher.php',
	//'blog/excerpt-more.php',
	//'blog/post-meta.php',
	//'datetime/date.php',
	//'datetime/time.php',
	'get/endpoint.php',
	'media/resize-image.php',
	//'media/youtube-image.php',
	'pagination/blog-pagination.php',
	//'pagination/next-prev-page.php',
	//'pagination/page-navigation.php',
	'pagination/post-navigation.php',
	'pagination/posts-navigation.php',
	//'theme/body-classes.php',
	//'theme/docs.php',
	'theme/is-tree.php',
	'theme/markup-tags.php',
	'theme/nice-number.php',
	'theme/parent-page-title.php',
	'theme/phone-parser.php',
	//'theme/pin.php',
	'theme/post-depth.php',
	'theme/print-code.php',
	'theme/pull-sentences.php',
	'theme/shorten-content.php',
	//'theme/site-title.php',
	'theme/smart-trim.php',
	'theme/style.php',
	'theme/substr.php',
	'theme/the-spinner.php',
	'theme/url-parser.php',
	'theme/weather.php',
	'theme/weather-icons.php',
	
);

foreach( $files as $file ) :
	require_once trailingslashit( dirname(__FILE__) ) . $file;
endforeach;