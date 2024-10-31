<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Function for Plugin create custom post type
 * 
 * @package responsive-team-showcase
 * @since 1.1
 */
function rts_post_types() {
	$rts_labels =  apply_filters( 'simple_rts_labels', array(
		'name'                => 'Teams',
		'singular_name'       => ' Team ',
		'add_new'             => __('Add New Member', 'responsive-team-showcase'),
		'add_new_item'        => __('Add New Member', 'responsive-team-showcase'),
		'edit_item'           => __('Edit Member', 'responsive-team-showcase'),
		'new_item'            => __('New Member', 'responsive-team-showcase'),
		'all_items'           => __('All Members', 'responsive-team-showcase'),
		'view_item'           => __('View Team Member', 'responsive-team-showcase'),
		'search_items'        => __('Search Team Member', 'responsive-team-showcase'),
		'not_found'           => __('No Team Member found', 'responsive-team-showcase'),
		'not_found_in_trash'  => __('No Team Member found in Trash', 'responsive-team-showcase'),
		'parent_item_colon'   => '',
		'menu_name'           => __('Team', 'responsive-team-showcase'),
		'exclude_from_search' => true
	) );
	$rts_args = array(
		'labels' 			=> $rts_labels,
		'public' 			=> false,
		'publicly_queryable'=> false,
		'show_ui' 			=> true,
		'show_in_menu' 		=> true,
		'query_var' 		=> false,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'menu_icon'   		=> 'dashicons-businessman',
		'hierarchical' 		=> false,
		'supports' => array('title','thumbnail','editor')
	);
	register_post_type( RTS_POST_TYPE, apply_filters( 'rts_post_type_args', $rts_args ) );
}
add_action('init', 'rts_post_types');
function rts_taxonomies() {
	$labels = array(
		'name'              => _x( 'Team Groups', 'responsive-team-showcase' ),
		'singular_name'     => _x( 'Category', 'responsive-team-showcase' ),
		'search_items'      => __( 'Search Member', 'responsive-team-showcase' ),
		'all_items'         => __( 'All Member', 'responsive-team-showcase' ),
		'parent_item'       => __( 'Parent Member', 'responsive-team-showcase' ),
		'parent_item_colon' => __( 'Parent Team:', 'responsive-team-showcase' ),
		'edit_item'         => __( 'Edit Member', 'responsive-team-showcase' ),
		'update_item'       => __( 'Update Member', 'responsive-team-showcase' ),
		'add_new_item'      => __( 'Add New Member', 'responsive-team-showcase' ),
		'new_item_name'     => __( 'New Member Name', 'responsive-team-showcase' ),
		'menu_name'         => __( 'Team Groups', 'responsive-team-showcase' ),
	);
	$args = array(
		'labels'            => $labels,
		'public'            => false,
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => false,
	);
	register_taxonomy( RTS_CAT, array( RTS_POST_TYPE ), $args );
}
/* Register Taxonomy */
add_action( 'init', 'rts_taxonomies');