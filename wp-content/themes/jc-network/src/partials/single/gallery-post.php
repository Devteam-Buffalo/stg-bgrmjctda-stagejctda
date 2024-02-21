<?php
/*
**  @file               gallery-post.php
**  @description        
**  @package            jctda-public-prod
**  @since              1.0.0
**  @author             lpeterson
**  @date               2/6/18
*/

defined('ABSPATH') || exit; ?>

<article class="uk-clearfix">
	<header class="entry-header">
		<?php if( has_post_thumbnail($post->ID) ) : ?>
		<div class="featured-image">
			<?php the_post_thumbnail($post->ID); ?>
<!-- 			<span class="post-date"><?php //jc_network_blog_date(); ?> </span> -->
		</div>
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<footer class="uk-clearfix blog-post-footer entry-footer">
		<span class="uk-display-inline-block post-categories">Posted in <?php jc_network_blog_categories(); ?> </span>
		<span class="uk-display-inline-block uk-float-right post-share-container"><?php jc_network_share_post(); ?></span>
		<?php if( is_user_logged_in() ) : ?>
		<span class="uk-display-inline-block uk-float-right post-edit"><?php jc_network_edit_post_link(); ?></span>
		<?php endif; ?>
	</footer>
</article>