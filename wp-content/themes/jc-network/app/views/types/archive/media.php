<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Blog, cateogry, tag, author and date archive template.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.1.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/5/18
 * @file            blog.php
 */
defined('ABSPATH') or exit;

get_header(); ?>

<div class="uk-container">
	<header class="intro">
	<?php
	is_single() 
		? printf(
			'<h2>%s | <small>%s</small></h2>',
			esc_attr('Media Room'),
			get_post_type_object( get_post_type() )->labels->name )

		: printf(
			'<h1>%s | <small>%s</small></h1>',
			esc_attr('Media Room'),
			post_type_archive_title( '', false ) );
	?>
	</header>
	<hr class="uk-article-divider">

	<div class="uk-grid uk-grid-large" data-uk-grid-margin>
		<section class="uk-width-1-1 uk-width-large-2-3">
			<?php if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					
					if ( post_password_required() ) return;
				
					get_template_part( VIEWS_DIR.'/partial/loop' );
				endwhile;
				
				is_single() ? jc_post_nav() : jc_archive_nav();
			else :
				wp_kses_post( get_option( 'jc_general_settings_page_not_found' ) );
			endif;
			?>
		</section>
		
		<?php get_sidebar() ?>
	</div>
</div>

<?php get_footer();