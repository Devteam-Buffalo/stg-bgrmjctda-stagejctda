<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     TDA Docs main landing page.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.1.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/7/18
 * @file            jctda.php
 */
defined('ABSPATH') or exit;

$parent = get_page_by_path( pods_v_sanitized( 'last', 'url' ) );

get_header();

if ( has_post_thumbnail( $parent->ID ) ) 
	jc_page_hero( [ 'ID' => $parent->ID ] );  ?>
<?php show(get_queried_object()) ?>
<div class="uk-container uk-container-center">
	<?php jc_page_intro( [ 'ID' => $parent->ID, 'html' => 'div' ] ) ?>
	<hr class="uk-article-divider">

	<div class="uk-grid uk-grid-large" data-uk-grid-margin>
		<section class="uk-width-1-1 uk-width-large-2-3">
			<article <?php post_class('uk-article loop-article') ?>>
				<section>
					<?php jc_page_content( [ 'ID' => $parent->ID ] ) ?>
				</section>
				
				<footer class="uk-padding-vertical">
					<?php jc_page_edit( [ 'ID' => $parent->ID ] ) ?>
				</footer>
			</article>
		</section>

		<aside class="uk-width-1-1 uk-width-large-1-3">
			<?php dynamic_sidebar( 'jc-tda-sidebar' ) ?>
		</aside>
	</div>
</div>

<?php get_footer();