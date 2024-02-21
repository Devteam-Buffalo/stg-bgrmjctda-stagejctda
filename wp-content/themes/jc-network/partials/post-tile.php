<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Renders provided post objects as linked tiles.
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20190329
 * @author          lpeterson
 */

if ( isset( $this->vars['tiles'] ) )
	$tiles = $this->vars['tiles'];
else
	return;
?>

<?php foreach ( $tiles as $tile ) : ?>
<div class="--tile no-print" data-post-type="<?= $tile->post_type ?>">
	<figure>
		<?= get_the_post_thumbnail( $tile->ID, 'card' ) ?>
		<figcaption>
			<div>
				<h6><?= $tile->post_title ?></h6>
			</div>
		</figcaption>
		<?= wp_sprintf('<a href="%s" title="%s"></a>', get_the_permalink( $tile->ID ), the_title_attribute([ 'echo' => false, 'post' => $tile->ID ]) ) ?>
	</figure>
</div>
<?php endforeach ?>
