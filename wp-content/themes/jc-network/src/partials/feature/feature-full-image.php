<?php
/*
**  @file    feature-full-image.php
**  
**  @desc    
**  
**  @path    /feature-full-image.php
**  @package public
**  @author  Lee Peterson
**  @date    10/3/17
*/
defined( 'ABSPATH' ) || exit;

$pods = pods()->export();

$img  = wp_get_attachment_url( $pods['jc_front_feature']['ID'] );
$txt  = $pods['jc_front_feature']['post_title'];
$url  = $pods['jc_front_feature_link'];
$date = $pods['jc_front_feature_date'];
$btn  = $pods['jc_front_feature_button'] ?: pods()->fields( 'jc_front_feature_button', 'default_value' ); ?>

<section class="featured-container home-featured-container section-spacing">
	<div class="featured full-image-feature home-featured">
		<ul class="uk-slideshow uk-overlay-active" data-uk-slideshow>
			<li>
				<img src="<?php echo $img; ?>" alt="<?php echo $txt; ?>" class="full-width-image lazyload">

				<div class="uk-overlay-panel">
					<h3 class="featured-title script-title text-shadow large-shadow" style="word-break: break-word; white-space: -moz-pre-wrap; white-space: pre-wrap; width: calc(100% / 2 + 25%)"><?php echo $txt; ?></h3>

					<p class="featured-message">
						<span class="thin"></span>
						<span class="medium"><?php echo $date; ?></span>

						<a href="<?php echo $url; ?>" title="<?php echo $txt; ?>" class="button orange-button"><?php echo $btn; ?></a>
					</p>
				</div>
			</li>
		</ul>
	</div>
</section>
