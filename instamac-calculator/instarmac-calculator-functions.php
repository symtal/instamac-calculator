<?php
/*
Contents:		PRODUCT CALC DROPDOWN OPTIONS		
				MAIN CALCULATOR FUNCTION
				
				
*/


/*******************************\
 * PRODUCT CALC DROPDOWN OPTIONS *
\*******************************/

function instarmac_product_calc_dropdown_options() {

	$return		=	get_transient('instarmac_product_calc_dropdown_options');

	if ( false === $return ) {

		$api_url		=	'http://instarmac-product-calculator-api.inspiredserver.co.uk/api/ProdCalcItems/Products';
		$return;
		$find_list;
		$list_response	=	wp_remote_get( $api_url, array('timeout' => 10) );

		try {

			$find_list	=	json_decode( $list_response['body'] );

		} catch ( Exception $ex ) {

			$find_list	=	null;

		}

		if ( $find_list ) {

			foreach ( $find_list as $list_item ) {

				$return[ $list_item->Product ]	=	$list_item->Product;
			}
		}

		// UPDATE TRANSIENT - CACHE FOR 1 HOUR
		set_transient( 'instarmac_product_calc_dropdown_options', $return, 3600 );

	}

	return $return;

}


/**************************\
 * MAIN CALCULATOR FUNCTION *
\**************************/

function instarmac_calculator( $post_id ) {

	$product		=	get_field( 'instacalc_sidebar_product', $post_id );

	if ( $product ) {

		$api_url		=	'http://instarmac-product-calculator-api.inspiredserver1.co.uk/api/';

		// GET ITEM DETAILS
		$item_url		=	$api_url . 'ProdCalcItems/FindProduct/?productName=' . $product;
		$find_item;
		$item_response	=	wp_remote_get( $item_url, array('timeout' => 10) );

		try {

			$find_item	=	json_decode( $item_response['body'] );

		} catch ( Exception $ex ) {

			$find_item	=	null;

		}

		// GET UNIT DETAILS
		$unit_url		=	$api_url . 'ProdCalcUnits/FindUnits/?product=' . $product;
		$find_unit;
		$unit_response	=	wp_remote_get( $unit_url, array('timeout' => 10) );

		try {

			$find_unit	=	json_decode( $unit_response['body'] );

		} catch ( Exception $ex ) {

			$find_unit	=	null;
			
		}

		$title			=	( get_field('instacalc_settings_title', 'option') ?: 'How much will you need?' );
		$icon_color		=	( get_field('instacalc_settings_title_icon_color', 'option') ?: '#FFF' );
		$icon_svg		=	( get_field('instacalc_settings_svg_icon', 'option') ?: false );

		include("partials/calc-header.php");

		include("calculators/calc-type-" . $find_item->CalcType . ".php");

		include("partials/calc-footer.php");

	}

}


function woocommerce_product_calculator() {

	instarmac_calculator( get_the_ID() );

}

// UNCOMMMENT THE NEXT LINE TO AUTO ADD TO WC SUMMARY
add_action( 'woocommerce_single_product_summary', 'woocommerce_product_calculator', 50 );
