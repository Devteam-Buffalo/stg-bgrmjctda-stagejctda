<?php
/*
**  @file    all-helpers.php
**  
**  @desc    
**  
**  @path    /all-helpers.php
**  @package public
**  @author  Lee Peterson
**  @date    6/28/17
*/
if ( ! defined( 'ABSPATH' ) ) exit;

// Enable Hidden Admin Feature displaying ALL Site Settings
function all_settings_link() {
	add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
}
add_action('admin_menu', 'all_settings_link');




// Modify the Login Logo & Image URL Link
add_filter( 'login_headerurl', 'namespace_login_headerurl' );
/**
 * Replaces the login header logo URL
 *
 * @param $url
 */
function namespace_login_headerurl( $url ) {
    $url = home_url( '/' );
    return $url;
}

add_filter( 'login_headertitle', 'namespace_login_headertitle' );
/**
 * Replaces the login header logo title
 *
 * @param $title
 */
function namespace_login_headertitle( $title ) {
    $title = get_bloginfo( 'name' );
    return $title;
}

add_action( 'login_head', 'namespace_login_style' );
/**
 * Replaces the login header logo
 */
function namespace_login_style() {
    echo '<style>.login h1 a { background-image: url( ' . get_template_directory_uri() . '/images/logo.png ) !important; }</style>';
}

function namespace_login_style() {
    if( function_exists('get_custom_header') ){
        $width = get_custom_header()->width;
        $height = get_custom_header()->height;
    } else {
        $width = HEADER_IMAGE_WIDTH;
        $height = HEADER_IMAGE_HEIGHT;
    }
    echo '<style>'.PHP_EOL;
    echo '.login h1 a {'.PHP_EOL; 
    echo '  background-image: url( '; header_image(); echo ' ) !important; '.PHP_EOL;
    echo '  width: '.$width.'px !important;'.PHP_EOL;
    echo '  height: '.$height.'px !important;'.PHP_EOL;
    echo '  background-size: '.$width.'px '.$height.'px !important;'.PHP_EOL;
    echo '}'.PHP_EOL;
    echo '</style>'.PHP_EOL;
}





// REMOVE THE WORDPRESS UPDATE NOTIFICATION FOR ALL USERS EXCEPT SYSADMIN
global $user_login;
get_currentuserinfo();
if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins 
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}




// Wordpress Profiling tools
if ( !defined('SAVEQUERIES') && isset($_GET['debug']) && $_GET['debug'] == 'sql' )
    define('SAVEQUERIES', true);

if ( !function_exists('dump') ) :
/**
 * dump()
 *
 * @param mixed $in
 * @return mixed $in
 **/
function dump($in = null) {
    echo '<pre style="margin-left: 0px; margin-right: 0px; padding: 10px; border: solid 1px black; background-color: ghostwhite; color: black; text-align: left;">';
    foreach ( func_get_args() as $var ) {
        echo "\n";
        if ( is_string($var) ) {
            echo "$var\n";
        } else {
            var_dump($var);
        }
    }
    echo '</pre>' . "\n";
    return $in;
} # dump()
endif;





/**
 * add_stop()
 *
 * @param mixed $in
 * @param string $where
 * @return mixed $in
 **/

function add_stop($in = null, $where = null) {
    global $sem_stops;
    global $wp_object_cache;
    $queries = get_num_queries();
    $milliseconds = timer_stop() * 1000;
    $out =  "$queries queries - {$milliseconds}ms";
    if ( function_exists('memory_get_usage') ) {
        $memory = number_format(memory_get_usage() / ( 1024 * 1024 ), 1);
        $out .= " - {$memory}MB";
    }
    $out .= " - $wp_object_cache->cache_hits cache hits / " . ( $wp_object_cache->cache_hits + $wp_object_cache->cache_misses );
    if ( $where ) {
        $sem_stops[$where] = $out;
    } else {
        dump($out);
    }
    return $in;
} # add_stop()






/**
 * dump_stops()
 *
 * @param mixed $in
 * @return mixed $in
 **/

function dump_stops($in = null) {
    if ( $_POST )
        return $in;
    global $sem_stops;
    global $wp_object_cache;
    $stops = '';
    foreach ( $sem_stops as $where => $stop )
        $stops .= "$where: $stop\n";
    dump("\n" . trim($stops) . "\n");
    if ( defined('SAVEQUERIES') && $_GET['debug'] == 'sql' ) {
        global $wpdb;
        foreach ( $wpdb->queries as $key => $data ) {
            $query = rtrim($data[0]);
            $duration = number_format($data[1] * 1000, 1) . 'ms';
            $loc = trim($data[2]);
            $loc = preg_replace("/(require|include)(_once)?,\s*/ix", '', $loc);
            $loc = "\n" . preg_replace("/,\s*/", ",\n", $loc) . "\n";
            dump($query, $duration, $loc);
        }
    }
    if ( $_GET['debug'] == 'cache' )
        dump($wp_object_cache->cache);
    if ( $_GET['debug'] == 'cron' ) {
        $crons = get_option('cron');
        foreach ( $crons as $time => $_crons ) {
            if ( !is_array($_crons) )
                continue;
            foreach ( $_crons as $event => $_cron ) {
                foreach ( $_cron as $details ) {
                    $date = date('Y-m-d H:m:i', $time);
                    $schedule = isset($details['schedule']) ? "({$details['schedule']})" : '';
                    if ( $details['args'] )
                        dump("$date: $event $schedule", $details['args']);
                    else
                        dump("$date: $event $schedule");
                }
            }
        }
    }
    return $in;
} # dump_stops()
add_action('init', create_function('$in', '
    return add_stop($in, "Load");
    '), 10000000);
add_action('template_redirect', create_function('$in', '
    return add_stop($in, "Query");
    '), -10000000);
add_action('wp_footer', create_function('$in', '
    return add_stop($in, "Display");
    '), 10000000);
add_action('admin_footer', create_function('$in', '
    return add_stop($in, "Display");
    '), 10000000);





/**
 * init_dump()
 *
 * @return void
 **/

function init_dump() {
    global $hook_suffix;
    if ( !is_admin() || empty($hook_suffix) ) {
        add_action('wp_footer', 'dump_stops', 10000000);
        add_action('admin_footer', 'dump_stops', 10000000);
    } else {
        add_action('wp_footer', 'dump_stops', 10000000);
        add_action("admin_footer-$hook_suffix", 'dump_stops', 10000000);
    }
} # init_dump()
add_action('wp_print_scripts', 'init_dump');





/**
 * dump_phpinfo()
 *
 * @return void
 **/

function dump_phpinfo() {
    if ( isset($_GET['debug']) && $_GET['debug'] == 'phpinfo' ) {
        phpinfo();
        die;
    }
} # dump_phpinfo()
add_action('init', 'dump_phpinfo');





/**
 * dump_http()
 *
 * @param array $args
 * @param string $url
 * @return array $args
 **/

function dump_http($args, $url) {
    dump(preg_replace("|/[0-9a-f]{32}/?$|", '', $url));
    return $args;
} # dump_http()





/**
 * dump_trace()
 *
 * @return void
 **/

function dump_trace() {
    $backtrace = debug_backtrace();
    foreach ( $backtrace as $trace )
        dump(
            'File/Line: ' . $trace['file'] . ', ' . $trace['line'],
            'Function / Class: ' . $trace['function'] . ', ' . $trace['class']
            );
} # dump_trace()
if ( $_GET['debug'] == 'http' )
    add_filter('http_request_args', 'dump_http', 0, 2);





function ajx_sharpen_resized_files( $resized_file ) {

    $image = wp_load_image( $resized_file );
    if ( !is_resource( $image ) )
        return new WP_Error( 'error_loading_image', $image, $file );

    $size = @getimagesize( $resized_file );
    if ( !$size )
        return new WP_Error('invalid_image', __('Could not read image size'), $file);
    list($orig_w, $orig_h, $orig_type) = $size;

    switch ( $orig_type ) {
        case IMAGETYPE_JPEG:
            $matrix = array(
                array(-1, -1, -1),
                array(-1, 16, -1),
                array(-1, -1, -1),
            );

            $divisor = array_sum(array_map('array_sum', $matrix));
            $offset = 0; 
            imageconvolution($image, $matrix, $divisor, $offset);
            imagejpeg($image, $resized_file,apply_filters( 'jpeg_quality', 90, 'edit_image' ));
            break;
        case IMAGETYPE_PNG:
            return $resized_file;
        case IMAGETYPE_GIF:
            return $resized_file;
    }

    return $resized_file;
}   

add_filter('image_make_intermediate_size', 'ajx_sharpen_resized_files',900);





// CUSTOM USER PROFILE FIELDS
   function my_custom_userfields( $contactmethods ) {

    // ADD CONTACT CUSTOM FIELDS
    $contactmethods['contact_phone_office']     = 'Office Phone';
    $contactmethods['contact_phone_mobile']     = 'Mobile Phone';
    $contactmethods['contact_office_fax']       = 'Office Fax';

    // ADD ADDRESS CUSTOM FIELDS
    $contactmethods['address_line_1']       = 'Address Line 1';
    $contactmethods['address_line_2']       = 'Address Line 2 (optional)';
    $contactmethods['address_city']         = 'City';
    $contactmethods['address_state']        = 'State';
    $contactmethods['address_zipcode']      = 'Zipcode';
    return $contactmethods;
   }
   add_filter('user_contactmethods','my_custom_userfields',10,1);
To display custom fields you can use one of the two methods listed below.

Option 1:

the_author_meta('facebook', $current_author->ID)
Option 2:

<?php $current_author = get_userdata(get_query_var('author')); 
echo '<p><a href="<?php echo esc_url($current_author->contact_phone_office);?>" title="office_phone"> Office Phone</a></p>';





// CUSTOMIZE ADMIN MENU ORDER
   function custom_menu_order($menu_ord) {
       if (!$menu_ord) return true;
       return array(
        'index.php', // this represents the dashboard link
        'edit.php?post_type=events', // this is a custom post type menu
        'edit.php?post_type=news', 
        'edit.php?post_type=articles', 
        'edit.php?post_type=faqs', 
        'edit.php?post_type=mentors',
        'edit.php?post_type=testimonials',
        'edit.php?post_type=services',
        'edit.php?post_type=page', // this is the default page menu
        'edit.php', // this is the default POST admin menu 
    );
   }
   add_filter('custom_menu_order', 'custom_menu_order');
   add_filter('menu_order', 'custom_menu_order');






Display DB Queries, Time Spent and Memory Consumption

Tested on: Wordpress 3.0.1

function performance( $visible = false ) {

    $stat = sprintf(  '%d queries in %.3f seconds, using %.2fMB memory',
        get_num_queries(),
        timer_stop( 0, 3 ),
        memory_get_peak_usage() / 1024 / 1024
        );

    echo $visible ? $stat : "<!-- {$stat} -->" ;
}
Then this code below the code above which will automatically insert the code above into the footer of your public website (make sure your theme is calling wp_footer):

add_action( 'wp_footer', 'performance', 20 );
Can be called multiple times.





// unregister all default WP Widgets
function unregister_default_wp_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);






/**
* Written by Jared Williams - http://new2wp.com
* @wp-config.php replace WP_DEBUG constant with this code
* Enable WP debugging for usage on a live site
* http://core.trac.wordpress.org/browser/trunk/wp-includes/load.php#L230
* Pass the '?debug=#' parameter at the end of any url on site
*
* http://example.com/?debug=1, /?debug=2, /?debug=3
*/
if ( isset($_GET['debug']) && $_GET['debug'] == '1' ) {
    // enable the reporting of notices during development - E_ALL
    define('WP_DEBUG', true);
} elseif ( isset($_GET['debug']) && $_GET['debug'] == '2' ) {
    // must be true for WP_DEBUG_DISPLAY to work
    define('WP_DEBUG', true);
    // force the display of errors
    define('WP_DEBUG_DISPLAY', true);
} elseif ( isset($_GET['debug']) && $_GET['debug'] == '3' ) {
    // must be true for WP_DEBUG_LOG to work
    define('WP_DEBUG', true);
    // log errors to debug.log in the wp-content directory
    define('WP_DEBUG_LOG', true);
}





/*-----------------------------------------------------------------------------------*/
/*  Custom logos
/*-----------------------------------------------------------------------------------*/
function custom_admin_logo() {
    echo '
        <style type="text/css">
            #header-logo { background-image: url('.get_bloginfo('template_directory').'/path/to/images/admin-logo.png) !important; }
        </style>
    ';
}
add_action('admin_head', 'custom_admin_logo');

function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/path/to/images/login-logo.png) !important; }
    </style>';
}

add_action('login_head', 'custom_login_logo');



// Automatically add a hidden custom field and associating value to a post when the post is published
add_action('publish_page', 'add_custom_field_automatically');
add_action('publish_post', 'add_custom_field_automatically');
function add_custom_field_automatically($post_ID) {
global $wpdb;
if(!wp_is_post_revision($post_ID)) {
    add_post_meta($post_ID, 'field-name', 'custom value', true);
}
}




List all constants for information and debugging

Tested on: Wordpress 3.0.1

Will only display the information if you are a logged in user

if ( is_user_logged_in() ) {
    print('<pre>');
    print_r( @get_defined_constants() );
    print('</pre>');
}
Here is version with optional filter that will partially match constant names and values:

function constants($filter = false) {

        $constants = get_defined_constants();

        if( $filter ) {

            $temp = array();

            foreach ( $constants as $key => $constant )
                if( false !== stripos( $key, $filter ) || false !== stripos( $constant, $filter ) )
                    $temp[$key] = $constant;

            $constants = $temp;
        }

        ksort( $constants );
        var_dump( $constants );
    }







function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;         // load details about this page

    $anc = get_post_ancestors( $post->ID );
    foreach($anc as $ancestor) {
        if(is_page() && $ancestor == $pid) {
            return true;
        }
    }
    if(is_page()&&(is_page($pid))) 
               return true;   // we're at the page or at a sub page
    else 
               return false;  // we're elsewhere
};

/* Adapted from csstricks with addition of
ancestors .... use = if(is_tree($id)) { // do stuff } ... Returns true if the
page is  = $id OR any of it's children OR descendants */

function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
  global $post;         // load details about this page
  $ancestors = get_post_ancestors($post);
  if(is_page()&&($post->post_parent==$pid||is_page($pid)||(in_array($pid,$ancestors))))
    return true;   // we're at the page or at a sub page
  else
    return false;  // we're elsewhere 
  };




// make TinyMCE allow iframes
add_filter('tiny_mce_before_init', create_function( '$a',
'$a["extended_valid_elements"] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]"; return $a;') );





/**resize on upload to the largest size in media setting */


function replace_uploaded_image($image_data) {
// if there is no large image : return
if (!isset($image_data['sizes']['large'])) return $image_data;

// path to the uploaded image and the large image
$upload_dir = wp_upload_dir();
$uploaded_image_location = $upload_dir['basedir'] . '/' .$image_data['file'];
$large_image_location = $upload_dir['path'] . '/'.$image_data['sizes']['large']['file'];

// delete the uploaded image
unlink($uploaded_image_location);

// rename the large image
rename($large_image_location,$uploaded_image_location);

// update image metadata and return them
$image_data['width'] = $image_data['sizes']['large']['width'];
$image_data['height'] = $image_data['sizes']['large']['height'];
unset($image_data['sizes']['large']);

return $image_data;
}
add_filter('wp_generate_attachment_metadata','replace_uploaded_image');






add_filter("manage_upload_columns", 'upload_columns');
add_action("manage_media_custom_column", 'media_custom_columns', 0, 2);

function upload_columns($columns) {
    unset($columns['parent']);
    $columns['better_parent'] = "Parent";
    return $columns;
}
function media_custom_columns($column_name, $id) {
    $post = get_post($id);
    if($column_name != 'better_parent')
        return;
        if ( $post->post_parent > 0 ) {
            if ( get_post($post->post_parent) ) {
                $title =_draft_or_post_title($post->post_parent);
            }
            ?>
            <strong><a href="<?php echo get_edit_post_link( $post->post_parent ); ?>"><?php echo $title ?></a></strong>, <?php echo get_the_time(__('Y/m/d')); ?>
            <br />
            <a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Re-Attach'); ?></a>
            <?php
        } else {
            ?>
            <?php _e('(Unattached)'); ?><br />
            <a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Attach'); ?></a>
            <?php
        }
}







function keep_me_logged_in_for_1_year( $expirein ) {
   return 31556926; // 1 year in seconds
}
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );








function admin_favicon() {
 echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_bloginfo('template_directory') . '/images/favicon.ico" />';
}
add_action( 'admin_head', 'admin_favicon' );







Grab all custom fields globally

function get_custom_field($key, $echo = FALSE) {
    global $post;
    $custom_field = get_post_meta( $post->ID, $key, true );
    if ( $echo == false ) 
        return $custom_field;
    echo $custom_field;
}
Then call the field with a single line

<?php get_custom_field('custom-field-name', TRUE); ?>