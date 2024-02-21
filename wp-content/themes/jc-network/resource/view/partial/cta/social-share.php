<?php
/*
**  @file               social-share.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               3/31/18
*/
defined( 'ABSPATH' ) || exit;

if ( isset( $share ) && is_array( $share ) ) : 

	$src = 'VisitJacksonNC';
	$links = [
		'facebook'  => 'https://www.facebook.com/sharer.php?u='.urlencode( $share['shortlink'] ).'&t='.$share['title'],
		'twitter'   => 'https://twitter.com/intent/tweet?url='.$share['shortlink'].'&text=Visit '.$share['title'].'&via='.$src,
		'google'    => 'https://plus.google.com/share?url='.$share['shortlink'].'&text='.$share['title'].'&hl=en',
		'linkedin'  => 'https://www.linkedin.com/shareArticle?mini=true&url='.$share['shortlink'].'&title='.$share['title'].'&summary='.$share['excerpt'].'&source='.$src,
		'addthis'   => 'http://www.addthis.com/bookmark.php?url='.$share['shortlink'],
		'pinterest' => 'http://pinterest.com/pin/create/link/?url='.$share['shortlink'].'&media='.$share['thumbnail'].'&description='.$share['excerpt'],
	]; ?>
	
	<div class="uk-button-group">
		
		<?php foreach ( $links as $k => $v ) : ?>
	
		<a href="<?= $v ?>" target="_blank" title="Share <?= $share['title'] ?> on <?= ucfirst( $k ) ?>" class="uk-icon-<?= $k ?> social-button color-<?= $k ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=600');return false;"></a>
	
		<?php endforeach; unset( $links ); ?>
	
	</div>

<?php endif; unset( $share ); ?>