<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Primary menu dropdown search
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190317
 * @author          lpeterson
 */
?>

<form class="sub-search no-print" method="get" action="<?= esc_html( get_permalink() ) ?>" role="search">
	<label title="Search" for="mobile-search">Begin typing a search phrase:</label>
	<input id="mobile-search" name="swpquery" data-swplive="true" data-swpengine="default" type="search" placeholder="Search Jackson County" autocomplete="off">
</form>
