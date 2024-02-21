<?php
/*
**  @file               signup.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/9/18
*/
defined( 'ABSPATH' ) || exit; ?>

<div id="header-signup">
<div class="uk-container uk-container-center">
	<div class="uk-flex uk-flex-right">
		<button class="uk-button uk-button-warning" data-uk-modal="{target:'#modal-signup',center:true,bgclose:false}">
			<i class="uk-icon-envelope-o uk-icon-justify"></i>
			<span class="uk-text-uppercase white-text">Newsletter Signup</span>
		</button>
	</div>
</div>
</div>
<div id="modal-signup" class="uk-modal">
	<div class="uk-modal-dialog">
		<a class="uk-modal-close uk-icon-close uk-close uk-close-alt"></a>
		<div class="async-indicator"></div>
		<div class="async-contents mountain">
			<?= shortcode_exists( 'gravityform' ) ? do_shortcode('[gravityform id="4" title="true" description="true" ajax="true" tabindex="-1"]') : false ?>
			<div class="uk-padding-top uk-text-small uk-text-center sans-regular">
				<?= apply_filters( 'the_content', get_option( 'jc_general_settings_signup_form_disclaimer' ) ) ?>
			</div>
		</div>
	</div>
</div>