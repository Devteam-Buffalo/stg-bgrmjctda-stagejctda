<?php
/*
**  @file               social-follow.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               3/31/18
*/
defined( 'ABSPATH' ) || exit; 

if ( isset( $follow ) && is_array( $follow ) ) : ?>

	<div class="uk-button-group">
		
		<?php foreach ( $follow['links'] as $k => $v ) : ?>
	
		<a href="<?= $v ?>" target="_blank" title="Visit <?= $follow['name'] ?> on <?= ucfirst( $k ) ?>" class="uk-icon-<?= $k ?> social-button color-<?= $k ?>"></a>
	
		<?php endforeach ?>
	
	</div>

<?php endif; unset( $follow ); ?>