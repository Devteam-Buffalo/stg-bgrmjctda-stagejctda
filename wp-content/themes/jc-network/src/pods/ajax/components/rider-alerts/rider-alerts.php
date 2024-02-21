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

$name = 'CARTA_Alerts';
$count = '30';

carta_query_alerts( "screen_name={$name}&count={$count}" ); ?>

<header class="alerts-header">
	<h6>Charleston Rider Alerts</h6>
</header>

<?php if ( carta_have_alerts() ) : ?>

<div class="alerts-body">
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
</div>

<?php else : ?>

<p class="uk-alert uk-alert-primary uk-text-primary" uk-alert>There are currently no rider alerts.</p>

<?php endif; carta_rewind_alerts(); ?>

<footer class="alerts-footer">
	<button type="button" onclick="window.location.assign('//twitter.com/carta_alerts');" title="CARTA Alerts on Twitter" class="overlay-link twitter-link tooltip"></button>
	<button type="button" onclick="window" title="Subscribe to Rider Alerts" class="overlay-link alerts-link tooltip"></button>
	<button type="button" onclick="window.location.assign('//twitter.com/hashtag/chstrfc?src=hash');" title="Charleston Traffic on Twitter" class="overlay-link alert-hashtag tooltip"></button>
</footer>