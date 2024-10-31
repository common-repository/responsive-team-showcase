<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package responsive-team-showcase
 * @since 1.0
 */
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
class rts_Script {	
	function __construct() {		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'rts_front_style') );		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'rts_front_script') );	
		add_action( 'admin_enqueue_scripts', array($this, 'wp_rts_admin_script'));		
	}
	/**
	 * Function to add style at front side
	 * 
	 * @package responsive-team-showcase
	 * @since 1.0
	 */
	function rts_front_style() { 		
		// Registring and enqueing slick slider css
		if( !wp_style_is( 'wpos-slick-style', 'registered' ) ) {
			wp_register_style( 'wpos-slick-style', RTS_URL.'rts-assets/css/slick.css', array(), RTS_VERSION );
			wp_enqueue_style( 'wpos-slick-style' );
		}
		 // Registring and enqueing magnific css
		if( !wp_style_is( 'wpoh-magnific-css', 'registered' ) ) {
			wp_register_style( 'wpoh-magnific-css', RTS_URL.'rts-assets/css/magnific-popup.css', array(), RTS_VERSION );
			wp_enqueue_style( 'wpoh-magnific-css');
		}  		
		// Registring and enqueing public css
		wp_register_style( 'rts-public-style', RTS_URL.'rts-assets/css/rts-costum.css', array(), RTS_VERSION );
		wp_enqueue_style( 'rts-public-style' );
		// Registring and enqueing public css
	   wp_register_style( 'wpoh-font-awesome', RTS_URL.'rts-assets/css/font-awesome.min.css', array(), RTS_VERSION );
		wp_enqueue_style( 'wpoh-font-awesome' );		
	}	
	/**
	 * Function to add script at front side
	 * 
	 * @package responsive-team-showcase
	 * @since 1.0
	 */
	function rts_front_script() {		
		// Registring slick slider script
		if( !wp_script_is( 'wpoh-slick-js', 'registered' ) ) {
			wp_register_script( 'wpoh-slick-js', RTS_URL.'rts-assets/js/slick.min.js', array('jquery'), RTS_VERSION, true );
		}
		if( !wp_script_is( 'wpoh-magnific-js', 'registered' ) ) {   
	    wp_register_script( 'wpoh-magnific-js', RTS_URL.'rts-assets/js/magnific-popup.min.js', array('jquery'), RTS_VERSION, true );	   
	    }		
		// Registring and enqueing public script
		wp_register_script( 'rts-public-script', RTS_URL.'rts-assets/js/rts-public.js', array('jquery'), RTS_VERSION, true );
		wp_localize_script( 'rts-public-script', 'Wppsac', array(
																	'is_mobile' => (wp_is_mobile()) ? 1 : 0,
																	'is_rtl' 	=> (is_rtl()) 		? 1 : 0
																	));
	}
	function wp_rts_admin_script() { 
        // Registring and enqueing admin css
        wp_register_script( 'rts-admin-script', RTS_URL.'rts-assets/js/rts-admin.js', array('jquery'), RTS_VERSION, true);
        wp_enqueue_script( 'rts-admin-script' );
        wp_register_style( 'admin-css', RTS_URL.'rts-assets/css/rts-admin.css', array(), RTS_VERSION );
        		wp_enqueue_style( 'admin-css' ); 		
}
}
$rts_script = new rts_Script();