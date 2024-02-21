<?php
/*
**  @file    mega-menu-outdoors.php
**  
**  @desc    
**  
**  @path    /mega-menu-outdoors.php
**  @package public
**  @author  Lee Peterson
**  @date    8/1/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

$ad_image_s = get_term_meta( 4, 'mega_image', true );
$ad_image = wp_get_attachment_image( $ad_image_s, 'full', false, array( 'class' => 'mega-menu-ad-image lazyload' ) );

$outdoors_tile = get_field( 'tile_image', 6517 )['url'];

$ad_link    = get_term_meta( 4, 'mega_link', true );
$ad_link_url = $ad_link['url'];
$ad_link_title = $ad_link['title'];
$ad_link_target = $ad_link['target']; ?>
<div id="outdoors-nav" class="mega-subnav">
	<div class="mega-subnav-columns-container">
		<a href="#" title="" class="uk-display-block mega-subnav-close"><i class="uk-icon-times"></i> Close</a>

		<div class="mega-subnav-columns">
			<div class="uk-grid uk-grid-small">
				<div class="uk-width-large-2-3 uk-width-1-1">
					<div class="mega-subnav-section-title-container">
						<h2 class="mega-subnav-section-title" style="font-family: 'Roboto Slab' !important;"><a href="<?php echo get_permalink( get_page_by_path( 'outdoors' ) ); ?>" title="View Outdoors" class="">Outdoors <i class="uk-icon-angle-right"></i></a></h2>
					</div>

					<?php wp_nav_menu ( array(
					'container'         => 'nav',
					'depth'             => 1,
					'echo'              => true,
					'fallback_cb'       => false,
					'item_spacing'      => 'discard',
					'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'menu_class'        => 'uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1 mega-parent',
					'menu'              => 'Outdoors Mega',
					'theme_location'    => 'outdoors-mega'
					) ); ?>
				</div>

				<div class="uk-width-large-1-3 uk-visible-large">
				<?php 
					if( ! empty( $ad_link_url ) ) {
						echo '<a href="' . $ad_link_url . '" title="' . $ad_link_title . '" target="' . $ad_link_target . '" class="uk-display-block">';
							
							if( ! empty( $ad_image ) ) {
								echo $ad_image;
							}
						echo '</a>';
					}
					elseif( ! empty( $ad_image ) ) {
						echo $ad_image;
					}
					else {
						'<img src="' . $outdoors_tile . '" class="mega-img-parent lazyload">';
					}
				?>
				</div>
			</div>
		</div>
	</div>
</div>