<?php
/*
**  @file               basic-layout.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

get_header();
	do_action( 'jc_network_before_full_width_content_area' );
		while ( have_posts() ) : the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('basic-layout'); ?>>
			<?php pods_view( 'src/partials/content/content-basic-heading.php' ); ?>
		
			<div class="uk-container uk-container-center entry-content">
				<?php the_field( 'page_content' ); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
		<?php
		endwhile;
	do_action( 'jc_network_after_full_width_content_area' );
get_footer();
