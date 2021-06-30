<?php
/*
Contents:		LOAD CUSTOM STYLESHEETS
				ADD CUSTOM WP_HEAD
				
				
*/


/*************************\
* LOAD CUSTOM STYLESHEETS *
\*************************/

	// ADMIN STYLES
	function instacalc_load_admin_styles() {
		
		wp_enqueue_style( 'instacalc-admin-styles', plugins_url( 'assets/css/admin.css', __FILE__ ) );
		
	}

	add_action( 'admin_enqueue_scripts', 'instacalc_load_admin_styles');

	// FRONTEND STYLES AND SCRIPTS
	function instacalc_load_frontend_styles() {
		
		wp_enqueue_style( 'instacalc-frontend-styles', plugins_url( 'assets/css/frontend.css', __FILE__ ) );
		
		// SCRIPT WITH VARIABLES
		wp_register_script( 'instacalc-frontend-script', plugins_url( 'assets/js/frontend.js', __FILE__ ), array('jquery') );
		
		$plugin_url		=	plugin_dir_url( __DIR__ );
		wp_localize_script( 'instacalc-frontend-script', 'plugin_url', $plugin_url );
		wp_enqueue_script('instacalc-frontend-script');
		
	}

	add_action( 'wp_enqueue_scripts', 'instacalc_load_frontend_styles');


/********************\
* ADD CUSTOM WP_HEAD *
\********************/

	function instacalc_wp_head() {

		echo "\n" . '<!-- Instarmac Calculator Styles -->';
		echo "\n" . '<style type="text/css" media="screen">';
		echo "\n" . get_field( 'instacalc_settings_css', 'option' );
		echo "\n" . ':root {';
		echo "\n\t" . '--calc-title_bg_color: ' . get_field( 'instacalc_settings_title_bg_color', 'option' ) . ';';
		echo "\n\t" . '--calc-title_txt_color: ' . get_field( 'instacalc_settings_title_txt_color', 'option' ) . ';';
		echo "\n\t" . '--calc-title_icon_color: ' . get_field( 'instacalc_settings_title_icon_color', 'option' ) . ';';
		echo "\n\t" . '--calc-footer_bg_color: ' . get_field( 'instacalc_settings_footer_bg_color', 'option' ) . ';';
		echo "\n\t" . '--calc-footer_txt_color: ' . get_field( 'instacalc_settings_footer_txt_color', 'option' ) . ';';
		echo "\n\t" . '--calc-footer_amount_color: ' . get_field( 'instacalc_settings_footer_amount_color', 'option' ) . ';';
		echo "\n\t" . '--calc-form_bg_color: ' . get_field( 'instacalc_settings_form_bg_color', 'option' ) . ';';
		echo "\n\t" . '--calc-field_bg_color: ' . get_field( 'instacalc_settings_field_bg_color', 'option' ) . ';';
		echo "\n\t" . '--calc-field_border_color: ' . get_field( 'instacalc_settings_field_border_color', 'option' ) . ';';
		echo "\n\t" . '--calc-field_text_color: ' . get_field( 'instacalc_settings_field_text_color', 'option' ) . ';';
		echo "\n" . '}';
		echo "\n" . '</style>';
		echo "\n" . '<!-- Instarmac Calculator Styles -->';
		echo "\n\n";

	}

	add_action ( 'wp_head', 'instacalc_wp_head' );
