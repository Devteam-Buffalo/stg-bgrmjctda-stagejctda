<?php
/*
**  @file    admin-columns.php
**  @desc    Adjust settings for Admin Columns Pro plugin
**  @info    Ensure no admin notices show
**  @path    /Volumes/Macintosh HD/Users/devnull/Library/Caches/Coda 2/25A74F23-FC6B-4ABA-A29D-E9FA09C17E88//apps/jctda-public-prod/public/wp-content/themes/jc-network/inc/theme-setup/admin-columns.php
**  @package jc-network
**  @author  Lee Peterson
**  @date    4/23/17
*/

add_filter( 'ac/suppress_site_wide_notices', '__return_true' );