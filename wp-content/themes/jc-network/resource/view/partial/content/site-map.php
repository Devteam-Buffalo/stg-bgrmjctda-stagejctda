<?php
/*
**  @file               site-map.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/12/18
*/
defined( 'ABSPATH' ) || exit; ?>

<?= '<div><h4 class="uk-h4">' . get_the_title( get_page_by_title( 'Outdoors', null, 'page' ) ) . '<hr></h4>' . wp_nav_menu(['theme_location' => 'outdoors-mega','menu_class' => 'uk-list uk-list-line','echo' => false]) . '</div>' ?>

<?= '<div><h4 class="uk-h4">' . get_the_title( get_page_by_title( 'Attractions', null, 'page' ) ) . '<hr></h4>' . wp_nav_menu(['theme_location' => 'attractions-mega','menu_class' => 'uk-list uk-list-line','echo' => false]) . '</div>' ?>

<?= '<div><h4 class="uk-h4">' . get_the_title( get_page_by_title( 'Food &amp; Drink', null, 'page' ) ) . '<hr></h4>' . wp_nav_menu(['theme_location' => 'food-drink-mega','menu_class' => 'uk-list uk-list-line','echo' => false]) . '</div>' ?>

<?= '<div><h4 class="uk-h4">' . get_the_title( get_page_by_title( 'Lodging', null, 'page' ) ) . '<hr></h4>' . wp_nav_menu(['theme_location' => 'lodging-mega','menu_class' => 'uk-list uk-list-line','echo' => false]) . '</div>' ?>
