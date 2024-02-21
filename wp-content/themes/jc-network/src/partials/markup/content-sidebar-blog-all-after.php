<?php
/*
**  @file    content-sidebar-after.php
**  
**  @desc    
**  
**  @path    /content-sidebar-after.php
**  @package jc-linode
**  @author  Lee Peterson
**  @date    6/18/17
*/
if ( ! defined( 'ABSPATH' ) ) exit; ?>
			</main>
			
			<aside id="secondary" class="uk-width-large-3-10 uk-width-1-1 widget-area" role="complementary"><?php do_action( 'be_sidebar_selector' ); ?></aside>
		</div>
	</div>
</section>
<?php get_footer();