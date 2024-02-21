<?php
/*
**  @file               breadcrumbs.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/9/18
*/
defined( 'ABSPATH' ) || exit;

if ( !is_front_page() && !is_home() && !is_category() && !is_tag() && !is_date() && !is_author() && !is_singular('post') ) : ?>

<div id="breadcrumbs">
	<div class="uk-container uk-container-center">
		<ul class="uk-flex uk-flex-middle">
		<?php if ( function_exists( 'bcn_display_list' ) ) bcn_display_list(); ?>
		</ul>
	</div>
</div>

<?php endif ?>
