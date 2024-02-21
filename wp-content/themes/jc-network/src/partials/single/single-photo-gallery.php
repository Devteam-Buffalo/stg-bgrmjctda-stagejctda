<?php
/*
**  @file    single-photo-gallery.php
**  
**  @desc    
**  
**  @path    /single-photo-gallery.php
**  @package public
**  @author  Lee Peterson
**  @date    8/24/17
*/
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<article class="uk-margin-large-bottom">
	<header class="entry-header">
		<?php the_title( '<h1 class="uk-margin-large-bottom entry-title">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php $images = get_field('gallery'); if( $images ): ?>
			<ul class="uk-grid uk-grid-width-medium-1-3 uk-grid-width-1-2 lightbox" data-uk-grid-margin>
				<?php foreach( $images as $image ): ?>
				<li data-src="<?php echo $image['url']; ?>" data-exthumbimage="<?php echo $image['url']; ?>" style=" height: 150px;">
					<a href="" title="<?php echo $image['caption']; ?>">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['caption']; ?>">
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</article>