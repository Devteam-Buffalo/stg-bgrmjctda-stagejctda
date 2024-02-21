<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Newsletter signup modal.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.3.0
 * @link            https://www.discoverjacksonnc.com
 * @author          Lee Peterson
 * @date            6/21/18
 * @file            signup-header.php
 */
defined('ABSPATH') or exit;

if ( shortcode_exists( 'gravityform' ) ) : ?>

<div id="header-signup">
	<div class="uk-container">
		<div class="uk-flex uk-flex-right">
			<button class="uk-button uk-button-secondary" 
					data-uk-modal="{target:'#modal-signup',center:true,bgclose:false,keyboard:false,minScrollHeight:400}">
				
				<i class="uk-icon-envelope-o uk-icon-justify"></i>
				
				<span class="uk-text-uppercase white-text">Newsletter Signup</span>
			</button>
		</div>
	</div>

	<div id="modal-signup" class="uk-modal">
		<div class="uk-modal-dialog">
			<a class="uk-modal-close uk-icon-close uk-close uk-close-alt"></a>
			<div class="async-indicator"></div>
			<div class="async-contents mountain">
				<?= do_shortcode('[gravityform id="4" title="true" description="true" ajax="true" tabindex="-1"]') ?>
				<div class="uk-padding-top uk-text-small uk-text-center sans-regular">
					<?= apply_filters( 'the_content', get_option( 'jc_general_settings_signup_form_disclaimer' ) ) ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endif ?>