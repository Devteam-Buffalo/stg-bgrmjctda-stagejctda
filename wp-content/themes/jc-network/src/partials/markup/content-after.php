<?php
/*
**  @file    content-after.php
**  
**  @desc    
**  
**  @path    /content-after.php
**  @package jc-linode
**  @author  Lee Peterson
**  @date    6/18/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

		echo '</main>';
		
		do_action( 'be_sidebar_selector' );
		
		echo '</div>
	
	</div>

</section>';

get_footer('dev');