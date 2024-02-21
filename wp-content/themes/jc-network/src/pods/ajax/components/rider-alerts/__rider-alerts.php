<?php
/*
**  @file    content-rider-alerts.php
**  
**  @desc    
**  
**  @path    /content-rider-alerts.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    9/16/17
*/
$screen_name = 'carta_alerts';
$count = '20';

carta_query_alerts( 'screen_name=' . $screen_name . '&count=' . $count );

if ( carta_have_alerts() ) : ?>

<ol class="alerts-list">
	<?php while ( carta_have_alerts() ) : carta_the_alert(); ?>
	<li class="alert alert-<?php echo carta_get_alert_id(); ?>">
		<img src="<?php echo carta_get_author_avatar_url(); ?>" alt="CARTA Alerts on Twitter" width="50" height="50" class="alert-avatar">
		<strong class="alert-author"><?php echo carta_get_author_name(); ?></strong>
		<span class="alert-screenname">@<?php echo carta_get_author_screen_name(); ?></span>
		<span class="alert-time"><?php echo carta_get_timestamp( 'age' ); ?></span>
		<p class="alert-message"><?php echo carta_get_text(); ?></p>
	</li>
	<?php endwhile; ?>
</ol>

<?php else : ?>

<p>There are currently no rider alerts.</p>

<?php endif; ?>