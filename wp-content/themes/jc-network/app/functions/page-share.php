<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Output linked icons that share a page.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190209
 * @author          lpeterson
 */

if ( !function_exists( 'jc_page_share' ) ) {
	function jc_page_share( $args = null ) {
		if ( post_password_required() )
			return;

		$args = wp_parse_args( $args, [
			'share' => isset( $args['share'] ) ? $args['share'] : get_post( get_queried_object_id() ),
			'src' => 'VisitJacksonNC',
		]);
		$args = apply_filters( 'jc_page_share', $args );
		$shortlink = wp_get_shortlink( $args['share']->ID );
		$thumbnail = has_post_thumbnail( $args['share']->ID ) ? get_the_post_thumbnail( $args['share']->ID, 'masonry_small_size' ) : false;
		$excerpt = has_excerpt( $args['share']->ID ) ? get_the_excerpt( $args['share']->ID ) : get_metadata( 'post', $args['share']->ID, 'page_subheading', true );

		$links = [
			'facebook'  => 'https://www.facebook.com/sharer.php?u='.$shortlink.'&t='.$args['share']->post_title,
			'twitter'   => 'https://twitter.com/intent/tweet?url='.$shortlink.'&text=Visit '.$args['share']->post_title.'&via=VisitJacksonNC',
			'google'    => 'https://plus.google.com/share?url='.$shortlink.'&text='.$args['share']->post_title.'&hl=en',
			'linkedin'  => 'https://www.linkedin.com/shareArticle?mini=true&url='.$shortlink.'&title='.$args['share']->post_title.'&summary='.$excerpt.'&source=VisitJacksonNC',
			'addthis'   => 'http://www.addthis.com/bookmark.php?url='.$shortlink,
			'pinterest' => 'http://pinterest.com/pin/create/link/?url='.$shortlink.'&media='.$thumbnail.'&description='.$excerpt,
		];

		ob_start(); ?>

		<div class="uk-social-buttons share no-print">
			<?php foreach ( $links as $k => $v ) : ?>
			<a href="<?= esc_url( $v ) ?>" target="_blank" title="Share <?= $args['share']->post_title ?> on <?= ucfirst( $k ) ?>" class="uk-icon-<?= $k ?> background-<?= $k ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=600');return false;" rel="noopener"></a>
			<?php endforeach ?>
		</div>

		<?php ob_get_flush();
	}
}
