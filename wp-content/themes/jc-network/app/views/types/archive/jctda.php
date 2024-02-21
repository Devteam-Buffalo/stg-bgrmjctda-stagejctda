<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     JCTDA Docs archives.
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

get_header(); ?>

<div class="uk-container uk-container-center">
	<header class="intro">
	<?php
	is_single() 
		? printf(
			'<h2>%s | <small>%s</small></h2>',
			esc_attr('TDA'),
			get_the_title() )

		: printf(
			'<h1>%s | <small>%s</small></h1>',
			esc_attr('TDA'),
			get_the_title() )
	?>
	</header>
	<hr class="uk-article-divider">

	<div class="uk-grid uk-grid-large" data-uk-grid-margin>
		<section class="uk-width-1-1 uk-width-large-2-3">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if ( post_password_required() ) return; ?>
			<article <?php post_class('uk-article loop-article') ?>>
				<header class="uk-margin-bottom">
					<?php the_title( '<h2>', '</h2>' ) ?>
				</header>
				
				<section>
					<?php the_content_cached() ?>
				</section>
				
				<footer class="uk-padding-vertical">
					<?php jc_page_edit() ?>
				</footer>
			</article>
		<?php
			endwhile;
		else :
			wp_kses_post( get_option( 'jc_general_settings_page_not_found' ) );
		endif;
		?>
		</section>

		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer();