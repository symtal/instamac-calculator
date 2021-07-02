<?php
/*
Contents:		OPTIONS PAGES
				- CALCULATORS
				CUSTOM FUNCTIONS
				- POST TYPE DROPDOWN OPTIONS
				CUSTOM FIELDS
				- SETTINGS
				- POST FIELDS
*/


/***************\
 * OPTIONS PAGES *
\***************/

function instarmac_add_options_pages()
{

	// CALCULATORS
	$args		=	array(

		'page_title'	=>	'Calculators',
		'menu_title'	=>	'Calculators',
		'menu_slug'		=>	'instacalc',
		'capability'	=>	'edit_posts',
		'position'		=>	77,
		'parent_slug'	=>	'',
		'icon_url'		=>	'dashicons-calculator',

	);

	acf_add_options_page($args);
}

// UNCOMMMENT THE NEXT LINE TO CREATE THE OPTIONS PAGES
add_action('init', 'instarmac_add_options_pages');


/******************\
 * CUSTOM FUNCTIONS *
\******************/

// POST TYPE DROPDOWN OPTIONS
function instarmac_posttype_dropdown_options($field)
{
	$post_types = get_post_types(array('public' => true), 'object');

	// reset choices
	$field['choices'] = array();

	foreach ($post_types as $type) :

		if (in_array($type->name, array('attachment'))) :
			continue;
		endif;
		$field['choices'][$type->name] = $type->label;
	endforeach;

	return $field;
}

add_filter('acf/load_field/name=instacalc_settings_posttype', 'instarmac_posttype_dropdown_options');

// FIELD LOCATION SETTINGS
function instarmac_field_location()
{

	// CALCULATOR LOCATIONS
	$locations		=	get_field('instacalc_settings_posttype', 'option');
	$location		=	array();

	if ($locations) {

		foreach ($locations as $loc) {

			$location[]		=	array(
				array(
					'param'			=>	'post_type',
					'operator'		=>	'==',
					'value'			=>	$loc,
				),
			);
		}
	}

	return $location;
}



// if (!function_exists('add_post_types_to_list')) {

// FIELD LOCATION SETTINGS
// function instarmac_field_location() {

// 	// CALCULATOR LOCATION
// 	$location		=	get_field( 'instacalc_settings_posttype', 'option' );

// 	return $location;

// }


/***************\
 * CUSTOM FIELDS *
\***************/

function instarmac_add_acf_fields()
{

	// SETTINGS
	acf_add_local_field_group(
		array(
			'key'					=>	'group_instacalc_settings',
			'title'					=>	'Instarmac Calculator Settings',
			'fields'				=>	array(

				// INTRO
				array(
					'key'				=>	'field_instacalc_settings_intro',
					'label'				=>	'',
					'name'				=>	'instacalc_settings_intro',
					'instructions'		=>	'instacalc_settings_intro',
					'type'				=>	'message',
					'message'			=>	'This is the intro',
				),

				// POST TYPES
				array(
					'key'				=>	'field_instacalc_settings_posttype',
					'label'				=>	'Post Types',
					'name'				=>	'instacalc_settings_posttype',
					'instructions'		=>	'Which post types to display calculators on',
					'type'				=>	'select',
					'ui'				=>	1,
					'allow_null'		=>	1,
					'multiple'			=>	1,
					'choices'			=>	array(),
					'wrapper'			=>	array(
						'width'		=>	'50',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// MAIN CALCULATOR TITLE
				array(
					'key'				=>	'field_instacalc_settings_title',
					'label'				=>	'Main Title',
					'name'				=>	'instacalc_settings_title',
					'instructions'		=>	'Main title for all calculators',
					'type'				=>	'text',
					'placeholder'		=>	'How much will you need?',
					'wrapper'			=>	array(
						'width'		=>	'50',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CUSTOM ICON SVG CODE
				array(
					'key'				=>	'field_instacalc_settings_svg_icon',
					'label'				=>	'Title Icon',
					'name'				=>	'instacalc_settings_svg_icon',
					'instructions'		=>	'Custom SVG code for title icon',
					'type'				=>	'text',
					'placeholder'		=>	'<svg .... </svg>',
					'wrapper'			=>	array(
						'width'		=>	'100',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CUSTOM CSS
				array(
					'key'				=>	'field_instacalc_settings_css',
					'label'				=>	'Custom CSS',
					'name'				=>	'instacalc_settings_css',
					'instructions'		=>	'Add custom css rules here',
					'type'				=>	'textarea',
					'wrapper'			=>	array(
						'width'		=>	'100',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CALCULATOR TITLE BACKGROUND COLOUR
				array(
					'key'				=>	'field_instacalc_settings_title_bg_color',
					'label'				=>	'Title Background',
					'name'				=>	'instacalc_settings_title_bg_color',
					'instructions'		=>	'Title Background Colour',
					'type'				=>	'color_picker',
					'default_value'		=>	'#828282',
					'wrapper'			=>	array(
						'width'		=>	'20',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CALCULATOR TITLE COLOUR
				array(
					'key'				=>	'field_instacalc_settings_title_txt_color',
					'label'				=>	'Title Text',
					'name'				=>	'instacalc_settings_title_txt_color',
					'instructions'		=>	'Title Text Colour',
					'type'				=>	'color_picker',
					'default_value'		=>	'#FFFFFF',
					'wrapper'			=>	array(
						'width'		=>	'20',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CALCULATOR TITLE ICON COLOR
				array(
					'key'				=>	'field_instacalc_settings_title_icon_color',
					'label'				=>	'Icon Colour',
					'name'				=>	'instacalc_settings_title_icon_color',
					'instructions'		=>	'Title Icon Colour',
					'type'				=>	'color_picker',
					'default_value'		=>	'#FFFFFF',
					'wrapper'			=>	array(
						'width'		=>	'20',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CALCULATOR FOOTER BACKGROUND COLOUR
				array(
					'key'				=>	'field_instacalc_settings_footer_bg_color',
					'label'				=>	'Footer Background',
					'name'				=>	'instacalc_settings_footer_bg_color',
					'instructions'		=>	'Footer Background Colour',
					'type'				=>	'color_picker',
					'default_value'		=>	'#EEEEEE',
					'wrapper'			=>	array(
						'width'		=>	'20',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CALCULATOR FOOTER COLOUR
				array(
					'key'				=>	'field_instacalc_settings_footer_txt_color',
					'label'				=>	'Footer Colour',
					'name'				=>	'instacalc_settings_footer_txt_color',
					'instructions'		=>	'Footer Text Colour',
					'type'				=>	'color_picker',
					'default_value'		=>	'#040404',
					'wrapper'			=>	array(
						'width'		=>	'20',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CALCULATOR FOOTER AMOUNT COLOUR
				array(
					'key'				=>	'field_instacalc_settings_footer_amount_color',
					'label'				=>	'Amount Colour',
					'name'				=>	'instacalc_settings_footer_amount_color',
					'instructions'		=>	'Footer Amount Colour',
					'type'				=>	'color_picker',
					'default_value'		=>	'#82B541',
					'wrapper'			=>	array(
						'width'		=>	'20',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CALCULATOR FORM BACKGROUND COLOUR
				array(
					'key'				=>	'field_instacalc_settings_form_bg_color',
					'label'				=>	'Form Background',
					'name'				=>	'instacalc_settings_form_bg_color',
					'instructions'		=>	'Main Form Background Colour',
					'type'				=>	'color_picker',
					'default_value'		=>	'#F6F6F6',
					'wrapper'			=>	array(
						'width'		=>	'20',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CALCULATOR FIELD BACKGROUND COLOUR
				array(
					'key'				=>	'field_instacalc_settings_field_bg_color',
					'label'				=>	'Field Background',
					'name'				=>	'instacalc_settings_field_bg_color',
					'instructions'		=>	'Field Background Colour',
					'type'				=>	'color_picker',
					'default_value'		=>	'#F2F2F2',
					'wrapper'			=>	array(
						'width'		=>	'20',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CALCULATOR FIELD BORDER COLOUR
				array(
					'key'				=>	'field_instacalc_settings_field_border_color',
					'label'				=>	'Field Border',
					'name'				=>	'instacalc_settings_field_border_color',
					'instructions'		=>	'Field Border Colour',
					'type'				=>	'color_picker',
					'default_value'		=>	'#D6D6D6',
					'wrapper'			=>	array(
						'width'		=>	'20',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

				// CALCULATOR FIELD LABEL/TEXT COLOUR
				array(
					'key'				=>	'field_instacalc_settings_field_text_color',
					'label'				=>	'Field Colour',
					'name'				=>	'instacalc_settings_field_text_color',
					'instructions'		=>	'Field Label/Text Colour',
					'type'				=>	'color_picker',
					'default_value'		=>	'#828282',
					'wrapper'			=>	array(
						'width'		=>	'20',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

			),
			'location'				=>	array(
				array(
					array(
						'param'			=>	'options_page',
						'operator'		=>	'==',
						'value'			=>	'instacalc',
					),
				),
			),
			'menu_order'			=>	1,
			'position'				=>	'normal',
			'style'					=>	'seamless',
			'label_placement'		=>	'top',
			'instruction_placement'	=>	'label',
			'active'				=>	1,
			'description'			=>	'',

		)
	);

	// POST FIELDS
	acf_add_local_field_group(
		array(
			'key'					=>	'group_instacalc_sidebar',
			'title'					=>	'Instarmac Product',
			'fields'				=>	array(

				// PRODUCT SELECT
				array(
					'key'				=>	'field_instacalc_sidebar_product',
					'label'				=>	'Product Calculator',
					'name'				=>	'instacalc_sidebar_product',
					'instructions'		=>	'Which product calculator',
					'type'				=>	'select',
					'ui'				=>	1,
					'allow_null'		=>	1,
					'multiple'			=>	0,
					'choices'			=>	instarmac_product_calc_dropdown_options(),
					'wrapper'			=>	array(
						'width'		=>	'100',
						'class'		=>	'',
						'id'		=>	'',
					),
				),

			),
			'location'				=>	array(),
			'menu_order'			=>	-1,
			'position'				=>	'side',
			'style'					=>	'default',
			'label_placement'		=>	'top',
			'instruction_placement'	=>	'label',
			'active'				=>	1,
			'description'			=>	'',

		)
	);
}

// UNCOMMMENT THE NEXT LINE TO CREATE THE CUSTOM FIELDS
add_action('acf/init', 'instarmac_add_acf_fields');


add_filter('acf/load_field_group', 'dynamic_location');
function dynamic_location($group)
{
	if ($group['key'] != 'group_instacalc_sidebar') {
		// not our field group
		return $group;
	}
	$group['location'] = instarmac_field_location();
	return $group;
}
