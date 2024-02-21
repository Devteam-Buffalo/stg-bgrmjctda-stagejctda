<?php
/*
**  @file               page-front.php
**  @description        Description.
**  @package            public
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/15/17
*/
defined( 'ABSPATH' ) || exit; ?>

<article class="home-page">
	<header class="entry-header">
		<div class="hero-container">
			<div class="hero">
				<?php if( is_mobile() ) : ?>

					<img class="full-width-image" src="<?php echo URI . 'src/assets/img/home-hero-736x414.jpg'; ?>" width="" height="" alt="" class="full-width-image lazyload">

				<?php elseif( is_tablet() ) : ?>

					<img class="full-width-image" src="<?php echo URI . 'src/assets/img/home-hero-video-fallback-image-tablet-tall.jpg'; ?>" width="" height="" alt="" class="full-width-image lazyload">

				<?php else : ?>
<?php if( is_user_logged_in() ) : ?>
<video id="front-video" autobuffer autoloop loop muted crossorigin="anonymous" controls="false" preload="auto" poster="<?php echo URI . 'src/assets/img/home-hero-video-fallback-image.jpg'; ?>">
	<source src="<?php echo URI . 'src/assets/video/home-hero/10_Second_medium.webm'; ?>" type='video/webm; codecs="vp8, vorbis"'/>
	<source src="<?php echo URI . 'src/assets/video/home-hero/10_Second_medium.m4v'; ?>" type="video/m4v"/>
	<source src="<?php echo URI . 'src/assets/video/home-hero/10_Second_medium.mp4'; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'/>
	<source src="<?php echo URI . 'src/assets/video/home-hero/10_Second_medium.ogv'; ?>" type='video/ogg; codecs="theora, vorbis"'/>
	<object type="video/ogg" data="<?php echo URI . 'src/assets/video/home-hero/10_Second_medium.ogv'; ?>" width="100%" height="520">
		<param name="src" value="<?php echo URI . 'src/assets/video/home-hero/10_Second_medium.ogv'; ?>">
		<param name="autoplay" value="false">
		<param name="autoStart" value="0">
		<p><a href="<?php echo URI . 'src/assets/video/home-hero/10_Second_medium.ogv'; ?>">Download this video file.</a></p>
	</object>
</video>
<?php else : ?>

					<video style="position: relative; top: -5px;" class="lazyload" width="100%" height="520" autoplay loop muted controls="false">
						<source src="<?php echo URI . 'src/assets/video/home-hero/10_Second_medium.webm'; ?>" type="video/webm">
						<source src="<?php echo URI . 'src/assets/video/home-hero/10_Second_medium.m4v'; ?>" type="video/m4v">
						<source src="<?php echo URI . 'src/assets/video/home-hero/10_Second_medium.ogv'; ?>" type="video/ogg">
						<source src="<?php echo URI . 'src/assets/video/home-hero/10_Second_medium.mp4'; ?>" type="video/mp4">
						
					</video>
<?php endif; ?>
					<div class="uk-position-cover uk-flex uk-flex-center uk-flex-middle uk-text-center">
						<div class="uk-container uk-container-center">
							<h1 class="entry-title hero-title text-shadow large-shadow">
								<span data-uk-scrollspy="{cls:'uk-animation-fade', delay:100}">W</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:200}">e</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:300}">l</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:400}">c</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:500}">o</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:600}">m</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:700}">e</span>
								<span></span>
								<span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1000}">t</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1100}">o</span>
								<span></span>
								<br />
								<span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1400}">J</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1500}">a</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1600}">c</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1700}">k</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1800}">s</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1900}">o</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2000}">n</span>
								<span></span>
								<span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2300}">C</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2400}">o</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2500}">u</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2600}">n</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2700}">t</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2800}">y</span>
							</h1>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="home-content-container">
			<div class="home-content">
				<?php
				pods_view( 'src/partials/content/content-section-intro.php' );

				$title   = 'Discover Jackson County';
				$type    = 'page';
				$include = array(6517,6748,6021,6019);
				$number  = 4;
				$parent  = false;
				$color   = 'green';
				$classes = 'jc-discover-tiles';
				$order   = 'date menu_order';
				include( locate_template( 'src/partials/carousel/carousel-global.php' ) );
				
				pods_view( 'src/partials/widget/signup-events.php' );

				$carousel_title = 'Outdoors';
				$carousel_type  = 'outdoor';
				$parent         = '0';
				$title_color    = 'green';
				include( locate_template('src/partials/carousel/carousel-default.php') );
				
				pods_view( 'src/partials/feature/feature-ugc.php' );
				
				$carousel_title = 'Attractions';
				$carousel_type  = 'attraction';
				$parent         = '0';
				$title_color    = 'yellow';
				include( locate_template('src/partials/carousel/carousel-default.php') );
				
				pods_view( 'src/partials/masonry/masonry-lodging-1-4.php' );
				
				pods_view( 'src/partials/feature/feature-half-image.php' );
				
				pods_view( 'src/partials/masonry/masonry-food-drink-1-4.php' );
				
				pods_view( 'src/partials/tile/tile-latest-blog.php' );
				?>
			</div>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
