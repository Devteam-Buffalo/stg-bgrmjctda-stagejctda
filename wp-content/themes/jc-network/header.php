<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Global header of the website
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190530
 * @author          lpeterson
 */
?><!doctype html>
<html <?php language_attributes() ?>>
	<head><?php wp_head() ?></head>
	<body <?php body_class() ?>>
		<?php wp_body_open() ?>
		<?php do_action('after_body') ?>
		<div class="site">
			<a class="sr-only no-print" href="#content">Skip to Content</a>
			<?php do_action( 'before_header' ) ?>
			<header class="site-header">
				<div class="header-content">
					<div class="uk-container uk-container-center">
						<div class="uk-flex uk-flex-middle header-main">
							<?php get_template_part( 'partials/logo' ) ?>
							<?php get_template_part( 'partials/menu-primary' ) ?>
						</div>
						<?php get_template_part( 'partials/menu-dropdown' ) ?>
					</div>
				</div>
				<div class="uk-visible-large header-extra">
					<?php get_template_part( 'partials/breadcrumbs' ) ?>
					<?php get_template_part( 'partials/signup-header' ) ?>
				</div>
			</header>
			<div id="content" class="site-content">
