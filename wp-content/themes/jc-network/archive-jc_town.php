<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Towns archive listing
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */

$parent_id = '3347';
$taxonomy  = false;
$type      = false;
$terms     = false; ?>

<?php get_header() ?>

<main id="content" class="site-content" role="main">
	<?php pods_view( 'src/partials/archive/location.php', compact( array_keys( get_defined_vars() ) ) ) ?>
</main>

<?php get_footer() ?>
