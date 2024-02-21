<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     A horizontally-scrolling, colored meter bar indicating reading progress to readers .
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.3.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/15/18
 * @file            progress.php
 */
defined('ABSPATH') or exit;

if ( is_singular( 'post' ) ) : ?>

	<progress class="progress" value="" max="">
		<div class="progress-container">
			<span class="progress-bar"></span>
		</div>
	</progress>

<?php endif ?>