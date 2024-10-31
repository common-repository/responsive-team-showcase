<?php
/**
 * Plugin Name: Responsive Team Showcase
 * Text Domain: responsive-team-showcase
 * Domain Path: /languages/
 * Description: Simple to use responsive Team Showcase with Widget plugin works with Slider, Grid also with widget using shortcode. 
 * Author: vaghasia3
 * Plugin URI: https://profiles.wordpress.org
 * Version: 1.0
 * Author URI: https://profiles.wordpress.org/vaghasia3
 *
 * @package WordPress
 * @author vaghasia3
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Basic plugin definitions
 * 
 * @package responsive-team-showcase
 * @since 1.0
 */
if( !defined( 'RTS_VERSION' ) ) {
	define( 'RTS_VERSION', '1.0' ); // Version of plugin
}
if( !defined( 'RTS_DIR' ) ) {
	define( 'RTS_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'RTS_URL' ) ) {
	define( 'RTS_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'RTS_POST_TYPE' ) ) {
	define( 'RTS_POST_TYPE', 'our-team' ); // Plugin post type 'post'
}
if( !defined( 'RTS_CAT' ) ) {
	define( 'RTS_CAT', 'our-team-cat' ); // Plugin category
}
add_action('plugins_loaded', 'rts_load_textdomain');
function rts_load_textdomain() {
	load_plugin_textdomain( 'responsive-team-showcase', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
} 

 /**
 * Function For Manage Post Category Shortcode Columns
 * 
 * @package responsive-team-showcase
 * @since 1.0
 */
add_filter("manage_our-team-cat_custom_column", 'rts_teams_columns', 10, 3);
add_filter("manage_edit-our-team-cat_columns", 'rts_category_manage_columns'); 
function rts_category_manage_columns($theme_columns) {
    $new_columns = array(
            'cb' => '<input type="checkbox" />',
            'name' => __('Name'),
            'post_shortcode' => __( 'Category Shortcode', 'responsive-team-showcase' ),
            'slug' => __('Slug'),
            'posts' => __('Posts')
			);
    return $new_columns;
}
function rts_teams_columns($out, $column_name, $theme_id) {
    $theme = get_term($theme_id, 'category');
    switch ($column_name) {      
        case 'title':
            echo get_the_title();
        break;
        case 'post_shortcode':
		echo '[rts-slider  cat="' . $theme_id. '"]<br />';
		echo '[rts-grid  cat="' . $theme_id. '"]';		
        break;
        default:
            break;
    }
    return $out; 
}	
// Function file
require_once( RTS_DIR . '/rts-includes/rts-function.php' );

// Function file
require_once( RTS_DIR . '/rts-includes/rts-post-types.php' );
// Script Fils
require_once( RTS_DIR . '/rts-includes/rts-script.php' );
// Shortcodes
require_once( RTS_DIR . '/rts-includes/rts-shortcodes/rts-slider.php' );
require_once( RTS_DIR . '/rts-includes/rts-shortcodes/rts-grid.php' );
// Widgets class
require_once( RTS_DIR . '/rts-widget/rts-widget.php' );
// How it work file, Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
	require_once( RTS_DIR . '/rts-includes/rts-admin/rts-how-it-work.php' );
	require_once( RTS_DIR . '/rts-includes/rts-admin/rts-team-meta-fields.php' );

}