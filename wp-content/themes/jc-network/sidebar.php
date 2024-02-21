<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Main sidebar of theme.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20180930
 * @author          lpeterson
 */
// $sidebars = wp_get_sidebars_widgets();
// foreach ( $sidebars as $slug => $widgets )
// 	if ( is_active_sidebar( $slug ) )
// 		show( dynamic_sidebar($k) );

$sidebar = '';
if ( is_singular('post') )
	$sidebar = 'blogpagepostscategories';
elseif ( in_array( get_post_type(), ['tda_docs'], true ) )
	$sidebar = 'tdapagesdocscategories';
elseif ( in_array( get_post_type(), ['mentions','press_release','b2b_news'], true ) )
	$sidebar = 'mentionspressreleasesnews';
elseif ( in_array( get_post_type(), ['tribe_events','tribe_venue','tribe_organizer','tribe_event_series'], true ) )
	$sidebar = 'calendareventsvenuesorganizers';
else
	$sidebar = pods_field( get_post_type(), get_the_id(), 'sidebar', true );

if ( $sidebar && is_active_sidebar( $sidebar ) ) : ?>
<aside class="uk-width-large-1-3 post-aside widget-area no-print">
	<?php dynamic_sidebar( $sidebar ) ?>
</aside>
<?php endif ?>
