<?php
/*
**  @file               before-builder.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

get_header();

echo pods_view( 'src/partials/content/page-builder-h1.php', compact( array_keys( get_defined_vars() ) ), DAY_IN_SECONDS, 'cache', true ) . 

'<div class="uk-container uk-container-center">' . '<main class="jc-page-builder site-main main-content" role="main">';