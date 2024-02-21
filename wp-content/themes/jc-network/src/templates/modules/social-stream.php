<?php
/*
**  @file               social-stream.php
**  @description        Description.
**  @package            jctda
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/8/17
*/
defined( 'ABSPATH' ) || exit;

get_header();
	while ( have_posts() ) : the_post();
	?>
	<article class="uk-container uk-container-center">
		<?php pods_view( 'src/partials/content/content-section-intro.php' ); ?>
	
		<div class="entry-content">
			<?php the_excerpt(); ?>
			
			<?php the_content(); ?>
			
			<?php the_field('jc_custom_code'); ?>
		</div>
	</article>
	<?php
	endwhile;
get_footer();