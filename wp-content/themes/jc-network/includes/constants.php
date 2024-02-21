<?php
/**
 * Project Name:    Discover Jackson NC
 * Project URI:     https://www.discoverjacksonnc.com
 * Description:     Theme-wide constants
 * Agency:          Rawle Murdy Associates
 * Agency URI:      https://www.rawlemurdy.com
 * Text Domain:     jctda
 *
 * @package         jctda
 * @since           20181102
 * @author          lpeterson
 */

/**
 * Absolute path to app directory
 *
 * @since 3.4.0
 */
define('APP_PATH', get_theme_file_path( 'app' ));

/**
 * Absolute path to app directory
 *
 * @since 3.4.0
 */
define('APP_URL', get_theme_file_uri( 'app' ));

/**
 * Absolute path to app views: layouts, partials, templates
 *
 * @since 3.4.0
 */
define('VIEWS_PATH', join( DIRECTORY_SEPARATOR, [ constant('APP_PATH'), 'views' ] ));
define('VIEWS_DIR', constant('VIEWS_PATH'));

/**
 * Web-accessible URI to app assets: js, css, images, videos
 *
 * @since 3.4.0
 */
define('ASSETS_URL', join( DIRECTORY_SEPARATOR, [ constant('APP_URL'), 'assets' ] ));

/**
 * Path to partials directory
 *
 * @since 3.6.0
 */
define('PARTIALS', join( DIRECTORY_SEPARATOR, [ constant('APP_PATH'), 'views', 'partials' ] ));

/**
 * Path to partials directory
 *
 * @since 3.6.0
 */
define('TYPES', join( DIRECTORY_SEPARATOR, [ constant('APP_PATH'), 'views', 'types' ] ));

/**
 * Base CDN URI
 *
 * @since 3.0.0
 */
define('CDN_URL', get_option( 'cdn_url' ));

/**
 * CDN directory for image, css, js and other static assets
 *
 * @since 3.0.0
 */
define('CDN_ASSETS', get_option( 'cdn_assets_bucket' ));

/**
 * CDN directory for uploaded WP media
 *
 * @since 3.0.0
 */
define('UPLOADS_URL', get_option( 'cdn_uploads_bucket' ));

/**
 * Static Asset and Media Management Settings
 */
// define('GOOGLE_KEY',       env('GOOGLE_KEY'));
// define('GEOCODE_KEY',      env('GEOCODE_KEY'));
// define('WEATHER_KEY',      env('WEATHER_KEY'));
// define('WPMDB_LICENCE',    env('WPMDB_KEY'));
// define('GF_LICENSE_KEY',   env('GF_KEY'));
// define('SEARCHWP_KEY',     env('SWP_KEY'));
// define('GCS_KEY',          env('GOOGLE_APPLICATION_CREDENTIALS'));

defined('MAPS_API') || define('MAPS_API', '//maps.googleapis.com/maps/api/js?key=AIzaSyAt8B_YwNZbkQyIhoodSEGwfzrbWwVxn9o');
defined('GEOCODE') || define('GEOCODE', '//maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAt8B_YwNZbkQyIhoodSEGwfzrbWwVxn9o');
defined('DIRECTIONS') || define('DIRECTIONS', '//www.google.com/maps/embed/v1/directions?key=AIzaSyAt8B_YwNZbkQyIhoodSEGwfzrbWwVxn9o');
defined('WEATHER') || define('WEATHER', '//api.darksky.net/forecast/b19ee334cf52a5d0854f2b85e34c4e9c');

/**
 * Stateless CDN Constants
 *
 * @since 2.1.0
 */
// define('WP_STATELESS_MEDIA_JSON_KEY',             GCS_KEY);
// define('WP_STATELESS_MEDIA_MODE',                 'stateless');
// define('WP_STATELESS_MEDIA_CUSTOM_DOMAIN',        'storage.googleapis.com');
// define('WP_STATELESS_MEDIA_BUCKET',               'jctda-cdn');
// define('WP_STATELESS_MEDIA_ROOT_DIR',             'uploads');
// define('WP_STATELESS_MEDIA_CACHE_CONTROL',        'public,max-age=31536000,immutable');
// define('WP_STATELESS_MEDIA_BODY_REWRITE_TYPES',   get_option( 'cdn_include' ));
// define('WP_STATELESS_MEDIA_HIDE_SETTINGS_PANEL',  true);
// define('WP_STATELESS_MEDIA_HIDE_SETUP_ASSISTANT', true);
// define('WP_STATELESS_COMPATIBILITY_GF',           true);
// define('WP_STATELESS_MEDIA_BODY_REWRITE',         true);
// define('WP_STATELESS_MEDIA_ON_FLY',               true);
// define('WP_STATELESS_MEDIA_DELETE_REMOTE',        false);
// define('WP_STATELESS_MEDIA_HASH_FILENAME',        false);

/**
 * @deprecated
 */
define('BASE', get_stylesheet_directory().DIRECTORY_SEPARATOR);

/**
 * @deprecated
 */
define('URI', get_stylesheet_directory_uri().DIRECTORY_SEPARATOR);

/**
 * @deprecated
 */
define('APP', get_theme_file_path('app'));

/**
 * @deprecated
 */
define('SRC', get_theme_file_path('resource'));

/**
 * @deprecated
 */
define('GCS', 'https://storage.googleapis.com');

/**
 * @deprecated
 */
define('ASSETS', constant('GCS').'/jctda-assets');

/**
 * @deprecated
 */
define('MEDIA', constant('GCS').'/jctda-media');

/**
 * @deprecated
 */
defined('MAPS_KEY') || define('MAPS_KEY', 'AIzaSyAt8B_YwNZbkQyIhoodSEGwfzrbWwVxn9o');
defined('GCP_KEY') || define('GCP_KEY', 'AIzaSyAt8B_YwNZbkQyIhoodSEGwfzrbWwVxn9o');

/**
 * @deprecated
 */
defined('WEATHER_API') || define('WEATHER_API', 'https://api.darksky.net/forecast');
defined('WEATHER_KEY') || define('WEATHER_KEY', 'b19ee334cf52a5d0854f2b85e34c4e9c');
