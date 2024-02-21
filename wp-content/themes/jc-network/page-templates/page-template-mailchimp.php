<?php
/**
 * Template Name:      ✓ Mailchimp
 * Template Post Type: page
 * Project Name:       Discover Jackson NC
 * Project URI:        https://www.discoverjacksonnc.com
 * Description:        Template for Mailchimp landing page campaigns
 * Agency:             BGRM
 * Agency URI:         https://www.bgrmcreate.com
 * Text Domain:        jctda
 *
 * @package            jctda
 * @since              20230908
 * @author             lpeterson
 */

?>

<?php get_header() ?>

<style>
main {
	margin-top: 5vw;
}
@media(min-width:960px) {
	main {
		margin-top:90px;
	}
}
.jc-hero {
	display: flex;
	justify-content: center;
	align-items: center;
}
.jc-hero h1 {
	max-inline-size: 25ch;
	margin-left: auto;
	margin-right: auto;
	margin-top: -3vw;
	font-size: clamp(24px,5vw,90px);
	position: absolute;
	z-index: 1;
	color: var(--white);
	text-shadow: var(--wp--preset--shadow--natural);
	text-align: center;
}
.header-hero {
	width: 100%;
	height: 225px;
	object-fit: cover;
}
@media(min-width:960px) {
	.header-hero {
		height: 525px;
		position: relative;
		top: -90px;
	}
}
.header-video {
	position: relative;
	margin: 2.5vw 0;
	padding-bottom: 56.25%;
	overflow: hidden;
	max-width: 100%;
	height: auto;
}
.header-video iframe,
.header-video object,
.header-video embed {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
</style>

<header class="jc-hero no-print" style="max-height:var(--hero-height)">
	<h1><?php the_title() ?></h1>
	<?= wp_get_attachment_image( get_field( 'header_hero' )['ID'], 'large', false, ['class' => 'header-hero'] ) ?>
</header>
<?php
$banner_ad_link = get_field('body_banner_ad_link');
if( $banner_ad_link ) {
	$banner_ad_link_url = $banner_ad_link['url'];
	$banner_ad_link_title = $banner_ad_link['title'];
	$banner_ad_link_target = $banner_ad_link['target'] ? $banner_ad_link['target'] : '_self';
}
?>
<?php if( have_rows( 'banner_ad' ) ) {
	while( have_rows( 'banner_ad' ) ) {
		the_row();
		$banner_ad_image_desktop = get_sub_field('banner_ad_image_desktop');
		$banner_ad_image_mobile = get_sub_field('banner_ad_image_mobile');
		$banner_ad_link = get_sub_field('banner_ad_link');
		if( $banner_ad_link ) {
			$banner_ad_link_url = $banner_ad_link['url'];
			$banner_ad_link_title = $banner_ad_link['title'];
			$banner_ad_link_target = $banner_ad_link['target'] ? $banner_ad_link['target'] : '_self';

		} ?>
		<?php if( $banner_ad_image_desktop || $banner_ad_image_mobile ) { ?>
			<div class="uk-container uk-container-center">
				<?php if($banner_ad_link) { ?>
					<a class="banner-ad-section" href="<?php echo esc_url( $banner_ad_link_url ); ?>" target="<?php echo esc_attr( $banner_ad_link_target ); ?>">
				<?php } else { ?>
					<div class="banner-ad-section">
				<?php } ?>
					<div class="desktop">
						<?php if( $banner_ad_image_desktop ) { ?>
							<?php echo wp_get_attachment_image( $banner_ad_image_desktop, 'full' ); ?>
						<?php } ?>
					</div>
					<div class="mobile">
						<?php if( $banner_ad_image_mobile ) { ?>
							<?php echo wp_get_attachment_image( $banner_ad_image_mobile, 'full' ); ?>
						<?php } ?>
					</div>
				<?php if($banner_ad_link) { ?>
					</a>
				<?php } else { ?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
	<?php } ?>
<?php } ?>
<main>
	<div class="uk-container uk-container-center uk-text-center">
		<div class="intro centered">
			<h2 style="max-inline-size: 40ch;margin-left: auto;margin-right: auto;font-size: clamp(24px,3vw,48px);"><?= get_field( 'header_heading' ) ?></h2>
			<p style="max-inline-size: 80ch;margin: 2.5vw auto 5vw;font-size: clamp(14px,1.2vw,24px);"><?= get_field( 'header_intro' ) ?></p>
		</div>
	</div>
	<div class="uk-container uk-container-center">
		<div class="header-video">
			<?= get_field( 'header_video' ) ?>
		</div>
	</div>
	<div class="uk-container uk-container-center ">
		<hr style="border-top: 3px solid var(--orange);">
		<h2 style="max-inline-size: 50ch;margin: 5vw auto 2.5vw;font-size: clamp(18px,2vw,32px);text-align: center;"><?= get_field( 'body_heading' ) ?></h2>
		<?php if ( have_rows( 'body_features' ) ) : ?>
		<div class="uk-grid uk-grid-large image-with-content-row">
			<?php while ( have_rows( 'body_features' ) ) : the_row(); ?>
			<div class="uk-width-1-1 uk-width-large-1-2">
				<?= wp_get_attachment_image( get_sub_field( 'image' )['ID'], 'large', false, ['style' => 'display:block;margin-bottom:2.5vw'] ) ?>
			</div>
			<div class="uk-width-1-1 uk-width-large-1-2" style="display: flex;align-items: flex-start;justify-content: center;flex-flow: column wrap;font-size: clamp(14px,2vw,18px);">
				<?= get_sub_field( 'list_items' ) ?>
			</div>
			<?php endwhile ?>
		</div>
		<?php endif ?>
	</div>

</main>
<footer>
	<div class="uk-container uk-container-center">
		<hr style="border-top: 3px solid var(--orange);">
		<h2 style="max-inline-size: 50ch;margin: 5vw auto 2.5vw;font-size: clamp(18px,2vw,32px);text-align: center;"><?= get_field( 'footer_heading' ) ?></h2>
		<?php if ( have_rows( 'footer_card' ) ) : ?>
		<div class="uk-grid uk-grid-large">
			<?php while ( have_rows( 'footer_card' ) ) : the_row(); ?>
			<div class="uk-width-1-1 uk-width-large-1-3">
				<a style="display:block;" href="<?= get_sub_field( 'link' )['url'] ?>" title="<?= get_sub_field( 'link' )['title'] ?>">
					<figure class="uk-text-center">
						<?= wp_get_attachment_image( get_sub_field( 'image' )['ID'], 'large', false, ['class' => ''] ) ?>
						<figcaption style="margin:1vw auto;font-size: clamp(14px,2vw,18px);color:var(--orange);font-weight:500;">
							<span style="text-decoration:underline;"><?= get_sub_field( 'link' )['title'] ?></span>
						</figcaption>
					</figure>
				</a>
			</div>
			<?php endwhile ?>
		</div>
		<?php endif ?>
	</div>
	<div class="uk-container uk-container-center uk-text-center button-group">
		<a class="uk-button uk-button-large uk-button-secondary uk-margin-right uk-margin-left" href="<?= get_field( 'footer_cta' )['url'] ?>" title="<?= get_field( 'footer_cta' )['title'] ?>" style="margin: 5vw auto;padding: 0.5vw 2vw;font-size: clamp(14px,2vw,18px);font-weight: 500;border-radius: .2rem;">
			<?= get_field( 'footer_cta' )['title'] ?>
		</a>
		<?php $scondarybtn = get_field( 'footer_secondary_cta' );
		if( $scondarybtn ) { ?>
		<a class="uk-button uk-button-large uk-button-primary uk-margin-right uk-margin-left" href="<?= get_field( 'footer_secondary_cta' )['url'] ?>" title="<?= get_field( 'footer_secondary_cta' )['title'] ?>" style="margin: 5vw auto;padding: 0.5vw 2vw;font-size: clamp(14px,2vw,18px);font-weight: 500;border-radius: .2rem;">
			<?= get_field( 'footer_secondary_cta' )['title'] ?>
		</a>
	<?php } ?>
	</div>




	<?= jc_page_edit() ?>
</footer>

<?php get_footer() ?>
