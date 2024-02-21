<?php
/*
**  @file               location-term.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/9/17
*/
defined( 'ABSPATH' ) || exit; 

echo jc_page_hero( ['image_url' => $image_url, 'title' => single_term_title( '', false )] ); ?>
