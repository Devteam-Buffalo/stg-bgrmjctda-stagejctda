<?php
/*
**  @file    page-next-stop-times.php
**  
**  Template Name: Next Stop Times
**  
**  @path    /page-next-stop-times.php
**  @package CARTA Dev
**  @author  Lee Peterson
**  @date    8/18/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;


if( current_user_can( 'super_admin' ) ) : ?>



<div id="next-times-response">
	<?php next_times_search(); next_times_results() ; ?>
</div>



<?php else :
	print('<div role="alert" class="uk-alert-danger" uk-alert><p>Our transit API has timed out. Please refresh your browser after 5 minutes.</p></div>');
endif;