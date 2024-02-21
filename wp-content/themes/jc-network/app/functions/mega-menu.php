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

if ( !function_exists( 'jc_mega_menu' ) ) :

function jc_mega_menu( $menu = 'Search' ) {
	$page_title = $menu;

	if ( $menu == 'Search' ) {
		$page_slug  = strtolower($menu);
		$page_url   = '#!';
	}
	else {
		$menu_page = get_page_by_title( $menu, null, 'page' );
		$page_url  = get_permalink( $menu_page->ID );
		$page_slug = $menu_page->post_name;
		$page_key  = str_replace( '-', '_', $page_slug );
		$option_url = get_option( 'jc_mega_menu_ad_url_'.$page_key );
		$option_img = get_option( 'jc_mega_menu_ad_image_'.$page_key );
		$image_url = wp_get_attachment_image_url( get_post_meta( $menu_page->ID, 'tile_image', true ), 'full', false );

		if ( $option_img ) {
			$image_op = maybe_unserialize( $option_img );
			$image_id = absint( $image_op[0] );
			$image_url = wp_get_attachment_image_url( $image_id, 'full', false );
		}
	}
	ob_start(); ?>
		<input id="<?= $page_slug ?>-close" name="mega-trigger" class="mega-close" type="radio" autocomplete="off" hidden>
		<input id="<?= $page_slug ?>-menu" name="mega-trigger" class="mega-trigger" type="radio" autocomplete="off" hidden>
		<div id="<?= $page_slug ?>-nav" class="mega-subnav">
			<div class="uk-container uk-container-center uk-position-relative">
				<div class="uk-grid uk-grid-small">
					<div class="uk-width-xlarge-3-4 uk-width-large-2-3">
						<?php if ( $menu == 'Search' ) : ?>
							<?php get_template_part( 'partials/search-global' ) ?>
						<?php else : ?>
							<input id="<?= $page_slug ?>-toggle" name="mega-toggle" class="mega-toggle" type="checkbox" autocomplete="off" hidden>
							<nav>
								<div class="mega-header">
									<a class="mega-section" href="<?= $page_url ?>" title="View <?= $menu_page->post_title ?>">
										<h2><?= $page_title ?>&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="arcs"><path d="M9 18l6-6-6-6"/></svg></h2>
									</a>

									<label for="<?= $page_slug ?>-toggle" title="Toggle Menu" class="mega-toggle">
										<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#666666" stroke-width="2" stroke-linecap="butt" stroke-linejoin="bevel"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
									</label>

									<label for="<?= $page_slug ?>-close" title="Close Menu" class="mega-close" onclick="document.body.classList.remove('menu-open')">
										<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
									</label>
								</div>

								<?php wp_nav_menu(['menu' => $menu.' Mega Menu','container_class' => 'mega-menus','menu_class' => 'uk-grid uk-grid-width-medium-1-2 uk-grid-width-1-1','fallback_cb' => '__no_fallback','depth' => 1 ]) ?>
							</nav>
						<?php endif ?>
					</div>

					<?php if ( $menu != 'Search' ) : ?>
					<div class="uk-width-xlarge-1-4 uk-width-large-1-3 uk-visible-large">
						<a href="<?= $option_url ?>"><img data-src="<?= $image_url ?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="lazyload" style="max-width:100%"></a>
					</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	<?php echo ob_get_clean();
}

endif;
