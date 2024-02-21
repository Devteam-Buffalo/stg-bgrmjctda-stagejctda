<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.3.0
 * @link            https://www.discoverjacksonnc.com
 * @author          Lee Peterson
 * @date            6/30/18
 * @file            primary.php
 */
defined('ABSPATH') or exit; ?>

<div class="uk-header-primary uk-visible-large">
	<div class="uk-container">
		<div class="uk-flex">
			<a href="<?= get_home_url() ?>" title="Visit the Front Page" class="uk-navbar-brand">
				<?php if ( has_custom_logo() ) : ?>
					<?= get_custom_logo() ?>
				<?php else : ?>
					<img src="<?= CDN_ASSET.'/img/logo.svg' ?>" alt="<?= get_bloginfo( 'name' ) ?> Logo">
				<?php endif ?>
			</a>
	
			<nav class="uk-navbar">
				<?php jc_primary_menu( 175 ) ?>
			</nav>
		</div>
	</div>
</div>