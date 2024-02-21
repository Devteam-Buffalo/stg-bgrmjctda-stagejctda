<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Breadcrumbs by Yoast
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.3.0
 * @link            https://www.discoverjacksonnc.com
 * @author          Lee Peterson
 * @date            6/21/18
 * @file            breadcrumbs.php
 */
defined('ABSPATH') or exit;

if ( function_exists( 'yoast_breadcrumb' ) && !is_front_page() ) : ?>

<div class="uk-breadcrumb">
	<div class="uk-container uk-flex uk-flex-middle">
		<?php yoast_breadcrumb( '<nav class="uk-overflow-container crumbs">', '</nav>', true ) ?>
	</div>
</div>

<?php endif ?>