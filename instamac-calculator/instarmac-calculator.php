<?php
/*
Plugin Name:	Instarmac Calculator
Plugin URI:		https://www.instarmac.co.uk/
Description:	Custom tool for generating Instarmac calculators
Author:			Jon Wilson
Version:		1.0.0
Text Domain:	instacalc

Contents:		INCLUDES
*/


/**********\
* INCLUDES *
\**********/

	// ADVANCED CUSTOM FIELDS
	if( ! class_exists('ACF') ) {

		define( 'MY_ACF_PATH', plugin_dir_path( __FILE__ ) . '/includes/acf/' );
		define( 'MY_ACF_URL', plugin_dir_url( __FILE__ ) . '/includes/acf/' );

		include_once( MY_ACF_PATH . 'acf.php' );

		add_filter('acf/settings/url', 'my_acf_settings_url');
		function my_acf_settings_url( $url ) {
			return MY_ACF_URL;
		}

		// HIDE ACF IN MENU
		add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
		function my_acf_settings_show_admin( $show_admin ) {
			return false;
		}

	}

	// HOOKS
	require_once( 'instarmac-calculator-hooks.php' );

	// ACF FIELDS
	require_once( 'instarmac-calculator-acf.php' );

	// FUNCTION
	require_once( 'instarmac-calculator-functions.php' );




