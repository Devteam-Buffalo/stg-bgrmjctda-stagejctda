<?php
/*
**  @file               front.php
**  @description        Description.
**  @package            public
**  @since              1.0.0
**  @author             Lee Peterson
**  @date               11/15/17
*/
defined( 'ABSPATH' ) || exit; ?>


	<div class="hero-container">
		<div class="hero">
			<?php if( is_mobile() ) : ?>

				<img class="full-width-image" src="<?= ASSETS . '/img/home-hero-736x414.jpg'; ?>" width="" height="" alt="" class="full-width-image lazyload">

			<?php elseif( is_tablet() ) : ?>

				<img class="full-width-image" src="<?= ASSETS . '/img/home-hero-video-fallback-image-tablet-tall.jpg'; ?>" width="" height="" alt="" class="full-width-image lazyload">

			<?php else : ?>

				<div class="uk-cover uk-position-relative">
					<canvas class="uk-invisible" width="1600" height="520"></canvas>
					<video id="front-video" class="uk-cover-object uk-position-absolute" autoplay autobuffer autoloop loop muted controls="false" poster="<?= ASSETS . '/img/jctda-front-page-hero.jpg'; ?>" width="100%" height="520">
						<source src="<?= ASSETS . '/video/home-hero/10_Second_medium.webm'; ?>" type='video/webm; codecs="vp8, vorbis"'/>
						<source src="<?= ASSETS . '/video/home-hero/10_Second_medium.m4v'; ?>" type="video/m4v"/>
						<source src="<?= ASSETS . '/video/home-hero/10_Second_medium.mp4'; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'/>
						<source src="<?= ASSETS . '/video/home-hero/10_Second_medium.ogv'; ?>" type='video/ogg; codecs="theora, vorbis"'/>
						<object type="video/ogg" data="<?= ASSETS . '/video/home-hero/10_Second_medium.ogv'; ?>" width="100%" height="520">
							<param name="src" value="<?= ASSETS . '/video/home-hero/10_Second_medium.ogv'; ?>">
							<param name="autoplay" value="false">
							<param name="autoStart" value="0">
						</object>
					</video>
				</div>

				<div class="uk-position-cover uk-flex uk-flex-center uk-flex-middle uk-text-center">
					<div class="uk-container uk-container-center">
						<h1 class="entry-title hero-title text-shadow large-shadow">
							<span data-uk-scrollspy="{cls:'uk-animation-fade', delay:100}">W</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:200}">e</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:300}">l</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:400}">c</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:500}">o</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:600}">m</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:700}">e</span>
							<span></span>
							<span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1000}">t</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1100}">o</span>
							<span></span>
							<br>
							<span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1400}">J</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1500}">a</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1600}">c</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1700}">k</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1800}">s</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:1900}">o</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2000}">n</span>
							<span></span>
							<span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2300}">C</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2400}">o</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2500}">u</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2600}">n</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2700}">t</span><span data-uk-scrollspy="{cls:'uk-animation-fade', delay:2800}">y</span>
						</h1>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
