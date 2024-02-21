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

if ( isset( $this->vars['share'] ) )
	$share = $this->vars['share'];
else
	return;

$src = 'VisitJacksonNC';
$links = [
	'facebook'  => 'https://www.facebook.com/sharer.php?u='.urlencode( $share['shortlink'] ).'&t='.$share['title'],
	'twitter'   => 'https://twitter.com/intent/tweet?url='.$share['shortlink'].'&text=Visit '.$share['title'].'&via='.$src,
	'linkedin'  => 'https://www.linkedin.com/shareArticle?mini=true&url='.$share['shortlink'].'&title='.$share['title'].'&summary='.$share['excerpt'].'&source='.$src,
	'pinterest' => 'http://pinterest.com/pin/create/link/?url='.$share['shortlink'].'&media='.$share['thumbnail'].'&description='.$share['excerpt'],
	'addthis'   => 'http://www.addthis.com/bookmark.php?url='.$share['shortlink'],
]; ?>

<div class="uk-button-group no-print">
	<?php foreach ( $links as $k => $v ) : ?>
		<a href="<?= $v ?>" target="_blank" title="Share <?= $share['title'] ?> on <?= ucfirst( $k ) ?>" class="uk-icon-<?= $k ?> social-button color-<?= $k ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=600');return false;window.opener=null;" rel="noopener noreferrer"><span class="sr-only">Share <?= $share['title'] ?> on <?= ucfirst( $k ) ?> (opens in a new window)</span></a>
	<?php endforeach ?>
</div>
