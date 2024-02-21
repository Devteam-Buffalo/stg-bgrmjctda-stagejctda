<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Default loop article.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           3.1.0
 * @link            https://www.discoverjacksonnc.com
 * @author          lpeterson
 * @date            6/5/18
 * @file            loop.php
 */
defined('ABSPATH') or exit; ?>

<article <?php post_class('uk-article loop-article') ?>>
	<header>
		<?php if ( is_single() ) : ?>
			<?php the_title( '<h1>', '</h1>' ) ?>

			<?php the_post_thumbnail( 'masonry_medium_size' ) ?>
		<?php else : ?>
			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
				<?php the_title( '<h2>', '</h2>' ) ?>

				<?php the_post_thumbnail( 'masonry_medium_size' ) ?>
			</a>
		<?php endif ?>
	</header>
	
	<section>
		<?php is_single() ? the_content_cached() : the_excerpt() ?>
	</section>
	
	<footer class="uk-padding-vertical">
		<hr class="uk-article-divider">
		
		<?php get_template_part( PARTIALS.'/footer/post', 'footer' ) ?>

		<?php jc_page_edit() ?>
	</footer>
</article>