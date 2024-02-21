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
 * @since           20190209
 * @author          lpeterson
 */

if ( is_front_page() || is_page_template( 'page-templates/ale-trail.php' ) ) return; ?>

<div id="breadcrumb" class="uk-hidden-small no-print">
	<div class="uk-container uk-container-center">
		<?php Hybrid\Breadcrumbs\Trail::display([ 'title_class'=>'sr-only','list_class'=>'uk-breadcrumb','item_class'=>'uk-breadcrumb-item' ]) ?>
	</div>
</div>
