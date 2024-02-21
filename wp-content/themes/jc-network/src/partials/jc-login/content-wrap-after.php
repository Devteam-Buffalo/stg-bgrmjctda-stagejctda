<?php
/*
**  @file    content-login-after.php
**  
**  @desc    
**  
**  @path    /content-login-after.php
**  @package jc-network
**  @author  Lee Peterson
**  @date    6/18/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

			echo '</main>';

		pods_view( 'src/partials/jc-login/content-sidebar.php' );

		echo '</div><!-- //uk-grid -->
		
		</div><!-- //uk-container -->

	</section><!-- //uk-section -->';

acf_enqueue_uploader(); get_footer('login');