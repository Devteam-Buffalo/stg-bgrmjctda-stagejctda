<?php
/*
**  @file    page-media-mentions.php
**  @desc    Markup for displaying medai room mentions list items
**  @info    
**  @path    template-parts/page/page-media-mentions.php
**  @package jc-network
**  @author  Lee Peterson
**  @date    4/24/17
*/
global $post;

$attachment = get_field('attachment', $mention);
$publication_title = get_field('publication_title', $mention);
$article_title = get_field('article_title', $mention);
$media_highlight_link = get_field('media_highlight_link', $mention); ?>

<li>
	<a href="<?php if($attachment) echo $attachment; if($media_highlight_link) echo $media_highlight_link; ?>">
		<span class="uk-text-uppercase"><?php if($article_title) echo $article_title; if($publication_title) echo $publication_title; ?></span>
		<?php if($article_title) echo $article_title; if($publication_title) echo $publication_title; ?>
		<br />
		<small><em><?php echo get_the_date('m.d.Y', $mention->ID); ?></em></small>
	</a>
</li>