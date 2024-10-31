<?php
/**
 * Plugin All functions file
 *
 * @package responsive-team-showcase
 * @since 1.0.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Function to get constant number
 * 
 * @package responsive-team-showcase
 * @since 1.2.2
 */
function rts_get_fix() {
  static $fix = 0;
  $fix++;
  return $fix;
}
/**
 * Function to get shortcode designs
 * 
 * @package responsive-team-showcase
 * @since 1.2.5
 */
function rts_templates() {
    $design_arr = array(
        'template-1'    => __('template-1', 'responsive-team-showcase'),
        'template-2'    => __('template-2', 'responsive-team-showcase'),
        'template-3'    => __('template-3', 'responsive-team-showcase'),
        'template-4'    => __('template-4', 'responsive-team-showcase'),
        'template-5'    => __('template-5', 'responsive-team-showcase'),
                     
    );
    return apply_filters('mpsw_slider_designs', $design_arr );
}
/**
 * Function to get shortcode designs
 * 
 * @package responsive-team-showcase
 * @since 1.2.5
 */
function rts_grid() {
    $rts_grid = array(
        '1'    => __('1', 'responsive-team-showcase'),
        '2'    => __('2', 'responsive-team-showcase'),
        '3'    => __('3', 'responsive-team-showcase'),
        '4'    => __('4', 'responsive-team-showcase'),
        );  
    return apply_filters('sg_true_false', $rts_grid );
}
/**
 * Function to get shortcode designs
 * 
 * @package responsive-team-showcase
 * @since 1.2.5
 */
function rts_true_false() {
    $truefalse_arr = array(
        'true'    => __('true', 'responsive-team-showcase'),
        'false'    => __('false', 'responsive-team-showcase'),
       
        );  
    return apply_filters('sg_true_false', $truefalse_arr );
}
function rts_asc_desc() {
    $disp_title_arr = array(
        __('ASC', 'responsive-team-showcase'),
        __('DESC', 'responsive-team-showcase')
    );
    return apply_filters('lswr_designs', $disp_title_arr);
}
function rts_orderby() {
    $disp_title_arr = array(
        __('ID', 'responsive-team-showcase'),
        __('author', 'responsive-team-showcase'),
        __('title', 'responsive-team-showcase'),
        __('name', 'responsive-team-showcase'),
        __('rand', 'responsive-team-showcase'),
        __('date', 'responsive-team-showcase'),

    );
    return apply_filters('lswr_designs', $disp_title_arr);
}
/**
 * Function to add array after specific key
 * 
 * @package responsive-team-showcase
 * @since 1.2.5
 */
function rts_add_array(&$array, $value, $index, $from_last = false) {    
    if( is_array($array) && is_array($value) ) {
        if( $from_last ) {
            $total_count    = count($array);
            $index          = (!empty($total_count) && ($total_count > $index)) ? ($total_count-$index): $index;
        }        
        $split_arr  = array_splice($array, max(0, $index));
        $array      = array_merge( $array, $value, $split_arr);
    }    
    return $array;
}
// Manage conetnt limit
function rts_limit_words($string, $word_limit)
{
    if( !empty($string) ) {
        $content = strip_shortcodes( $string ); // Strip shortcodes
        $content = wp_trim_words( $string, $word_limit, '...' );
        return $content;
    }   
}
/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 *  @package responsive-team-showcase
 * @since 1.0
 */
function rts_esc_attr($data) {
    return esc_attr( $data );
}
/**
 * create Sanitize URL.
 * 
 * @package responsive-team-showcase
 * @since 1.0
 */
function rts_clean_url( $url ) {
    return esc_url_raw( trim($url) );
}
/**
 * Clean variables using sanitize text field. Arrays are cleaned recursively.
 * Non-scalar values are ignored.
 * 
 * @package responsive-team-showcase
 * @since 1.0
 */
function rts_sanitize_clean( $var ) {
    if ( is_array( $var ) ) {
        return array_map( 'rts_sanitize_clean', $var );
    } else {
        $data = is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
        return wp_unslash($data);
    }
}