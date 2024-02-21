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
 * @since           3.3.0
 * @link            https://www.discoverjacksonnc.com
 * @author          Lee Peterson
 * @date            6/22/18
 * @file            social-follow.php
 */
defined('ABSPATH') or exit;

$follow = [];
$follow_key = md5( 'social_cta_follow_jc' );
$follow = wp_cache_get( $follow_key, 'social_cta' );

if ( false === $follow ) {
	$links = [
		'name' => get_bloginfo( 'name' ),
		'links' => [
			'facebook'  => get_option( 'jc_contact_social_facebook_url', 'https://www.facebook.com' ),
			'twitter'   => get_option( 'jc_contact_social_twitter_url', 'https://www.twitter.com' ),
			'instagram' => get_option( 'jc_contact_social_instagram_url', 'https://www.instagram.com' ),
			'google'    => get_option( 'jc_contact_social_google_url', 'https://www.google.com' ),
			'youtube'   => get_option( 'jc_contact_social_youtube_url', 'https://www.youtube.com' ),
			'pinterest' => get_option( 'jc_contact_social_pinterest_url', 'https://www.pinterest.com' ),
		],
	];
	ob_start(); ?>
	
	<div class="uk-social-buttons follow">
		<?php foreach ( $links['links'] as $k => $v ) : ?>
		<a href="<?= $v ?>" target="_blank" title="Visit <?= $links['name'] ?> on <?= ucfirst( $k ) ?>" class="uk-icon-<?= $k ?> background-<?= $k ?>"></a>
		<?php endforeach ?>
	</div>
	
	<?php $follow = ob_get_clean();

	wp_cache_set( $follow_key, $follow, 'social_cta', HOUR_IN_SECONDS );
}

echo $follow;