<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}	
add_action( 'admin_menu', 'rts_meta_box_setup');
add_action( 'save_post','rts_meta_box_save');
	function rts_meta_box_setup () {
		add_meta_box( 'team-details', __( 'Members Details', 'responsive-team-showcase' ), 'rts_meta_box_content' , 'our-team', 'normal', 'high' );
	}
	function rts_meta_box_content () {
		global $post_id;
		$values = get_post_custom( $post_id );
		$rts_field_data = rts_get_custom_values_settings();
		$rts_html = '';
		$rts_html .= wp_nonce_field( 'rts_meta_box_save', 'wp_rts_noonce' );
		if ( 0 < count( $rts_field_data ) ) {
			$rts_html .= '<table class="form-table">' . "\n";
			$rts_html .= '<tbody>' . "\n";
			foreach ( $rts_field_data as $d => $v ) {
				$data = $v['default'];
				if ( isset( $values['_' . $d] ) && isset( $values['_' . $d][0] ) ) {
					$data = $values['_' . $d][0];
				}
				$rts_html .= '<tr valign="top"><th scope="row"><label for="' . rts_esc_attr( $d ) . '">' . $v['name'] . '</label></th><td><input name="' . rts_esc_attr( $d ) . '" type="text" id="' . rts_esc_attr( $d ) . '" class="regular-text" value="' . rts_esc_attr( $data ) . '" />' . "\n";
				$rts_html .= '<p class="description">' . $v['description'] . '</p>' . "\n";
				$rts_html .= '</td><tr/>' . "\n";
			}
			$rts_html .= '</tbody>' . "\n";
			$rts_html .= '</table>' . "\n";
		}
		echo $rts_html;
	}
	function rts_meta_box_save ( $post_id ) {
		global $post, $messages;
		// Verify
		if ( ( get_post_type( $post_id) != 'our-team' ) ) {
			return $post_id;
		}
		if ( ! isset( $_POST['wp_rts_noonce'] ) ) {
		return $post_id;
	}
		if ( ! wp_verify_nonce( $_POST['wp_rts_noonce'], 'rts_meta_box_save' ) ) {
			return $post_id;
		  }
			if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return $post_id;
				}
			} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return $post_id;
				}
			}
		$rts_field_data = rts_get_custom_values_settings();
		$values = array_keys( $rts_field_data );
		foreach ( $values as $v ) {
			${$v} = strip_tags(trim($_POST[$v]));			
			if ( 'url' == $rts_field_data[$v]['type'] ) {
				${$v} = esc_url( ${$v} );
			}
			if ( get_post_meta( $post_id, '_' . $v ) == '' ) {				

				add_post_meta( $post_id, '_' . $v, ${$v}, true );
			} elseif( ${$v} != get_post_meta( $post_id, '_' . $v, true ) ) {
				update_post_meta( $post_id, '_' . $v, ${$v} );
			} elseif ( ${$v} == '' ) {
				delete_post_meta( $post_id, '_' . $v, get_post_meta( $post_id, '_' . $v, true ) );
			}
		}
	}
	function rts_get_custom_values_settings () {
		$values = array();
		$values['member_position'] = array(
		    'name' => __( 'Member Position', 'responsive-team-showcase' ),
		    'description' => __( '' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);	
		return $values;
	}
	add_action( 'admin_menu', 'rts_meta_box_setup_social');
	add_action( 'save_post','rts_meta_box_social_save');
	function rts_meta_box_setup_social () {
		add_meta_box( 'team-details-social', __( 'Social Details', 'responsive-team-showcase' ), 'rts_meta_box_content_social' , 'our-team', 'normal', 'high' );
	}
	function rts_meta_box_content_social () {
		global $post_id;
		$values = get_post_custom( $post_id );
		$rts_field_data = rts_custom_values_settings_social();
		$rts_html = '';
		$rts_html .= wp_nonce_field( 'rts_meta_box_social_save', 'rts_social_noonce' );
		if ( 0 < count( $rts_field_data ) ) {
			$rts_html .= '<table class="form-table">' . "\n";
			$rts_html .= '<tbody>' . "\n";
			foreach ( $rts_field_data as $d => $v ) {
				$data = $v['default'];
				if ( isset( $values['_' . $d] ) && isset( $values['_' . $d][0] ) ) {
					$data = $values['_' . $d][0];
				}
				$rts_html .= '<tr valign="top"><th scope="row"><label for="' . rts_esc_attr( $d ) . '">' . $v['name'] . '</label></th><td><input name="' . rts_esc_attr( $d ) . '" type="URL" id="' . rts_esc_attr( $d ) . '" class="regular-text" value="' . rts_esc_attr( $data ) . '" />' . "\n";
				$rts_html .= '<p class="description">' . $v['description'] . '</p>' . "\n";
				$rts_html .= '</td><tr/>' . "\n";
			}
			$rts_html .= '</tbody>' . "\n";
			$rts_html .= '</table>' . "\n";
		}
		echo $rts_html;
	}
	function rts_meta_box_social_save ( $post_id ) {
		global $post, $messages;
		// Verify
		if ( ( get_post_type( $post_id) != 'our-team' ) ) {
			return $post_id;
		}
		if ( ! isset( $_POST['rts_social_noonce'] ) ) {
		return $post_id;
	}
		if ( ! wp_verify_nonce( $_POST['rts_social_noonce'], 'rts_meta_box_social_save' ) ) {
			return $post_id;
		  }
			if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return $post_id;
				}
			} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return $post_id;
				}
			}
		$rts_field_data = rts_custom_values_settings_social();
		$values = array_keys( $rts_field_data );
		foreach ( $values as $f ) {
			${$f} = strip_tags(trim($_POST[$f]));			
			if ( 'url' == $rts_field_data[$f]['type'] ) {
				${$f} = esc_url( ${$f} );
			}
			if ( get_post_meta( $post_id, '_' . $f ) == '' ) {
				add_post_meta( $post_id, '_' . $f, ${$f}, true );
			} elseif( ${$f} != get_post_meta( $post_id, '_' . $f, true ) ) {
				update_post_meta( $post_id, '_' . $f, ${$f} );
			} elseif ( ${$f} == '' ) {
				delete_post_meta( $post_id, '_' . $f, get_post_meta( $post_id, '_' . $f, true ) );
			}
		}
	}
	function rts_custom_values_settings_social () {
		$values = array();		
		$values['facebook_url'] = array(
		    'name' => __( 'Facebook URL', 'responsive-team-showcase' ),
		    'description' => __( 'https://www.facebook.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		$values['likdin_url'] = array(
		    'name' => __( 'Linkedin URL', 'responsive-team-showcase' ),
		    'description' => __( 'https://www.linkedin.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		$values['insta_url'] = array(
		    'name' => __( 'Instagram URL', 'responsive-team-showcase' ),
		    'description' => __( 'https://www.instagram.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		$values['twitter_url'] = array(
		    'name' => __( 'Twitter URL', 'responsive-team-showcase' ),
		    'description' => __( 'https://www.twitter.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		$values['google_url'] = array(
		    'name' => __( 'Google URL', 'responsive-team-showcase' ),
		    'description' => __( 'https://www.google.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		$values['youtube_url'] = array(
		    'name' => __( 'Youtube URL', 'responsive-team-showcase' ),
		    'description' => __( 'https://www.youtube.com' ),
		    'type' => 'text',
		    'default' => '',
		    'section' => 'info'
		);
		return $values;
	}