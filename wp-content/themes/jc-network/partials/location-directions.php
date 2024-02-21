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

$post = $this->vars['post'] ?? $wp_query->post;
$address = $this->vars['address'] ?: null;
$street = $this->vars['street'] ?? null;
$city = $this->vars['city'] ?? null;
$state = $this->vars['state'] ?? null;
$zip = $this->vars['zip'] ?? null;
$latitude = $this->vars['latitude'] ?? null;
$longitude = $this->vars['longitude'] ?? null; ?>

<div class="directions no-print">
	<label for="get-directions" class="uk-position-relative" title="Get Directions to <?= $post->post_title; ?>">
		<span>Get Directions</span>

		<?php if ( isset( $street, $city, $state, $zip ) ) : ?>
		<span><?= $street."\n".$city.',&nbsp;'.$state.'&nbsp;'.$zip ?></span>

		<?php elseif ( !is_null( $address ) ) : ?>
		<span><?= $address ?></span>

		<?php elseif ( isset( $latitude, $longitude ) ) : ?>
		<span><?= substr($latitude, 0, 7) . ', ' . substr($longitude, 0, 8) ?></span>

		<?php endif ?>
	</label>
	<input id="get-directions" type="checkbox" name="get-directions" autocomplete="off" hidden>
	<div class="uk-padding uk-position-relative --popper">
		<label class="uk-position-top-right" for="get-directions" title="Close this dialog window" aria-label="Close this dialog window">
			<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" stroke="#1f61a8" stroke-linecap="square" stroke-linejoin="arcs" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
		</label>
		<div class="uk-flex">
			<?php if ( has_post_thumbnail( $post->ID ) ) the_post_thumbnail( $post->ID, 'card', ['class' => 'cover'] ) ?>
			<div>
				<h3 class="mountain">Get Directions to <?= $post->post_title ?></h3>
				<?= do_shortcode("[gravityform id=4 title=false description=true ajax=true tabindex=-1 field_values=latitude={$latitude}&longitude={$longitude}]") ?>
			</div>
		</div>
	</div>
</div>
