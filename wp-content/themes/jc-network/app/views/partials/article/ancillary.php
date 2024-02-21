<?php
/*
**  @file               ancillary.php
**  @description        Description.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               4/3/18
*/

defined( 'ABSPATH' ) || exit; 

$hero = [
	'wrap' => [
		'tag' => 'figure',
		'class' => 'hero ancillary-hero'
	],
];

?>
<article <?php post_class('uk-container jc-ancillary') ?>>
	<div class="uk-grid uk-grid-large">
		<header class="uk-width-1-1 uk-width-large-1-3">
			<?php jc_page_image( get_post_thumbnail_id(), $hero ) ?>
		</header>
		
		<section class="uk-width-1-1 uk-width-large-2-3">
			<?php jc_page_intro() ?>
			
			<?php jc_page_content() ?>
			
			<footer>
				<?php jc_page_edit() ?>
			</footer>
		</section>
	</div>
</article>