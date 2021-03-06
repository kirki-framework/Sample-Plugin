<?php
/**
 * Plugin Name: Kirki Sample Plugin
 * Plugin URI:  https://kirki.org/
 * Description: A sample plugin that contains all Kirki & Kirki PRO controls
 * Version:     1.0
 * Author:      David Vongries
 * Author URI:  https://wp-pagebuilderframework.com
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

function kirki_sample_controls() {

	// Stop here if Kirki doesn't exist.
	if ( ! class_exists( 'Kirki' ) ) {
		return;
	}

	// Config.
	Kirki::add_config( 'theme_config_id', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	) );

	/* Panels */

	// Kirki panel.
	Kirki::add_panel( 'kirki_panel', array(
		'priority' => 0,
		'title'    => __( 'Kirki', 'kirki' ),
	) );

	/* Sections */

	// Kirki section.
	Kirki::add_section( 'kirki_options', array(
		'title'    => __( 'Kirki Controls', 'kirki' ),
		'panel'    => 'kirki_panel',
		'priority' => 800,
	) );

	/* Controls */

	// Background
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'background',
		'settings'    => 'background_setting',
		'label'       => esc_html__( 'Background', 'kirki' ),
		'description' => esc_html__( 'Background conrols are pretty complex - but extremely useful if used properly. Transport is set to auto for this control so postMessage scripts & frontend CSS is generated automatically and will apply to the body.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => [
			'background-color'      => '#fff',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => 'body',
			],
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'checkbox',
		'settings'    => 'checkbox_setting',
		'label'       => esc_html__( 'Checkbox', 'kirki' ),
		'description' => esc_html__( 'Description', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => true,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'code',
		'settings'    => 'code_setting',
		'label'       => esc_html__( 'Code', 'kirki' ),
		'description' => esc_html__( 'Description', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '',
		'choices'     => [
			'language' => 'css',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'color_setting_hex',
		'label'       => __( 'Color (hex only)', 'kirki' ),
		'description' => esc_html__( 'This is a color control - without alpha channel. Transport is set to auto for this control so postMessage scripts & frontend CSS is generated automatically and will apply to the body.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '#0088CC',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => 'body',
				'property' => 'color',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'color_setting_rgba',
		'label'       => __( 'Color (alpha)', 'kirki' ),
		'description' => esc_html__( 'This is a color control - with alpha channel.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '#0088CC',
		'choices'     => [
			'alpha' => true,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'color_setting_hue',
		'label'       => __( 'Color (hue only)', 'kirki' ),
		'description' => esc_html__( 'This is a color control - hue only.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '#0088CC',
		'mode'        => 'hue',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_1',
		'label'       => esc_html__( 'Color Palette 1', 'kirki' ),
		'description' => esc_html__( 'This is a color-palette control', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '#888888',
		'choices'     => [
			'colors' => ['#000000', '#222222', '#444444', '#666666', '#888888', '#aaaaaa', '#cccccc', '#eeeeee', '#ffffff'],
			'style'  => 'round',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_2',
		'label'       => esc_html__( 'Color Palette 2', 'kirki' ),
		'description' => esc_html__( 'Material Design Colors - all', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '#F44336',
		'choices'     => [
			'colors' => Kirki_Helper::get_material_design_colors( 'all' ),
			'size'   => 20,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_3',
		'label'       => esc_html__( 'Color Palette 3', 'kirki' ),
		'description' => esc_html__( 'Material Design Colors - primary', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '#000000',
		'choices'     => [
			'colors' => Kirki_Helper::get_material_design_colors( 'primary' ),
			'size'   => 25,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_4',
		'label'       => esc_html__( 'Color Palette 4', 'kirki' ),
		'description' => esc_html__( 'Material Design Colors - red', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '#FF1744',
		'choices'     => [
			'colors' => Kirki_Helper::get_material_design_colors( 'red' ),
			'size'   => 20,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_5',
		'label'       => esc_html__( 'Color Palette 5', 'kirki' ),
		'description' => esc_html__( 'Material Design Colors - A100', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '#FF80AB',
		'choices'     => [
			'colors' => Kirki_Helper::get_material_design_colors( 'A100' ),
			'size'   => 20,
			'style'  => 'round',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'custom',
		'settings' => 'custom_setting',
		// 'label'    => esc_html__( 'This is the label (optional)', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'Custom', 'kirki' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'dashicons_setting',
		'label'    => esc_html__( 'Dashicons', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => 'menu',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'date',
		'settings'    => 'date_setting',
		'label'       => esc_html__( 'Date', 'kirki' ),
		'description' => esc_html__( 'This is a date control.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'dimension',
		'settings'    => 'dimension_setting',
		'label'       => esc_html__( 'Dimension', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '10px',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'dimensions',
		'settings'    => 'dimensions_1',
		'label'       => esc_html__( 'Dimensions 1', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => [
			'width'  => '100px',
			'height' => '100px',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'dimensions',
		'settings'    => 'dimensions_2',
		'label'       => esc_html__( 'Dimensions 2', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => [
			'padding-top'    => '1em',
			'padding-bottom' => '10rem',
			'padding-left'   => '1vh',
			'padding-right'  => '10px',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'dimensions',
		'settings'    => 'dimensions_3',
		'label'       => esc_html__( 'Dimensions 3', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => [
			'min-width'  => '100px',
			'max-width'  => '500px',
			'min-height' => '50px',
			'max-height' => '10em',
		],
		'choices'     => [
			'labels' => [
				'min-width'  => esc_html__( 'Min Width', 'kirki' ),
				'max-width'  => esc_html__( 'Max Width', 'kirki' ),
				'min-height' => esc_html__( 'Min Height', 'kirki' ),
				'max-height' => esc_html__( 'Max Height', 'kirki' ),
			],
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dropdown-pages',
		'settings' => 'dropdown_pages_setting',
		'label'    => esc_html__( 'Dropdown Pages', 'kirki' ),
		'section'  => 'kirki_options',
		// 'default'     => 42,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'editor',
		'settings'    => 'editor_setting',
		'label'       => esc_html__( 'Editor', 'kirki' ),
		'description' => esc_html__( 'This is an editor control.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'generic',
		'settings'    => 'generic_setting',
		'label'       => esc_html__( 'Generic', 'kirki' ),
		'description' => esc_html__( 'The "generic" control allows you to add any input type you want. In this case we use type="password" and define custom styles.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '',
		'choices'     => [
			'element'  => 'input',
			'type'     => 'password',
			'style'    => 'background-color:black;color:red;',
			'data-foo' => 'bar',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'image',
		'settings'    => 'image_setting_url',
		'label'       => esc_html__( 'Image', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'link',
		'settings' => 'link_setting',
		'label'    => __( 'Link', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => 'https://wp-pagebuilderframework.com/',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'multicheck',
		'settings' => 'multicheck_setting',
		'label'    => esc_html__( 'Multicheck', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => array( 'option-1', 'option-3', 'option-4' ),
		'choices'  => [
			'option-1' => esc_html__( 'Option 1', 'kirki' ),
			'option-2' => esc_html__( 'Option 2', 'kirki' ),
			'option-3' => esc_html__( 'Option 3', 'kirki' ),
			'option-4' => esc_html__( 'Option 4', 'kirki' ),
			'option-5' => esc_html__( 'Option 5', 'kirki' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'multicolor',
		'settings' => 'multicolor_setting',
		'label'    => esc_html__( 'Multicolor', 'kirki' ),
		'section'  => 'kirki_options',
		'priority' => 10,
		'choices'  => [
			'link'   => esc_html__( 'Color', 'kirki' ),
			'hover'  => esc_html__( 'Hover', 'kirki' ),
			'active' => esc_html__( 'Active', 'kirki' ),
		],
		'default'  => [
			'link'   => '#0088cc',
			'hover'  => '#00aaff',
			'active' => '#00ffff',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'number',
		'settings' => 'number_setting',
		'label'    => esc_html__( 'Number', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => 42,
		'choices'  => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'palette',
		'settings' => 'palette_setting',
		'label'    => esc_html__( 'Palette', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => 'light',
		'priority' => 10,
		'choices'  => [
			'light' => [
				'#ECEFF1',
				'#333333',
				'#4DD0E1',
			],
			'dark'  => [
				'#37474F',
				'#FFFFFF',
				'#F9A825',
			],
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'radio',
		'settings' => 'radio_setting',
		'label'    => esc_html__( 'Radio 1', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => 'red',
		'choices'  => [
			'red'   => esc_html__( 'Red', 'kirki' ),
			'green' => esc_html__( 'Green', 'kirki' ),
			'blue'  => esc_html__( 'Blue', 'kirki' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'radio',
		'settings' => 'radio_setting_2',
		'label'    => esc_html__( 'Radio 2', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => 'red',
		'choices'  => [
			'red'   => [
				esc_html__( 'Red', 'kirki' ),
				esc_html__( 'These are some extra details about Red', 'kirki' ),
			],
			'green' => [
				esc_html__( 'Green', 'kirki' ),
				esc_html__( 'These are some extra details about Green', 'kirki' ),
			],
			'blue'  => [
				esc_html__( 'Blue', 'kirki' ),
				esc_html__( 'These are some extra details about Blue', 'kirki' ),
			],
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'radio-buttonset',
		'settings' => 'radio_buttonset_setting',
		'label'    => esc_html__( 'Radio Buttonset', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => 'red',
		'choices'  => [
			'red'   => esc_html__( 'Red', 'kirki' ),
			'green' => esc_html__( 'Green', 'kirki' ),
			'blue'  => esc_html__( 'Blue', 'kirki' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'toggle',
		'settings' => 'toggle_setting',
		'label'    => esc_html__( 'Toggle', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => '1',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'textarea',
		'settings' => 'textarea_setting',
		'label'    => esc_html__( 'Textarea', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => esc_html__( 'This is a default value', 'kirki' ),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'text_setting',
		'label'    => esc_html__( 'Text', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => esc_html__( 'This is a default value', 'kirki' ),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'         => 'repeater',
		'label'        => esc_html__( 'Repeater', 'kirki' ),
		'section'      => 'section_id',
		'priority'     => 10,
		'row_label'    => [
			'type'  => 'text',
			'value' => esc_html__( 'Your Custom Value', 'kirki' ),
		],
		'button_label' => esc_html__( '"Add new" button label (optional) ', 'kirki' ),
		'settings'     => 'my_repeater_setting',
		'default'      => [
			[
				'link_text' => esc_html__( 'Kirki Site', 'kirki' ),
				'link_url'  => 'https://kirki.org/',
			],
			[
				'link_text' => esc_html__( 'Kirki GitHub Repository', 'kirki' ),
				'link_url'  => 'https://github.com/kirki-framework/kirki',
			],
		],
		'fields'       => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Link Text', 'kirki' ),
				'description' => esc_html__( 'This will be the label for your link', 'kirki' ),
				'default'     => '',
			],
			'link_url'  => [
				'type'        => 'text',
				'label'       => esc_html__( 'Link URL', 'kirki' ),
				'description' => esc_html__( 'This will be the link URL', 'kirki' ),
				'default'     => '',
			],
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'select_setting',
		'label'       => esc_html__( 'Select', 'kirki' ),
		'section'     => 'kirki_options',
		'default'     => 'option-1',
		'placeholder' => esc_html__( 'Select an option...', 'kirki' ),
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'option-1' => esc_html__( 'Option 1', 'kirki' ),
			'option-2' => esc_html__( 'Option 2', 'kirki' ),
			'option-3' => esc_html__( 'Option 3', 'kirki' ),
			'option-4' => esc_html__( 'Option 4', 'kirki' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'slider',
		'settings' => 'slider_setting',
		'label'    => esc_html__( 'Slider', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => 42,
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'sortable',
		'settings' => 'sortable_setting',
		'label'    => esc_html__( 'Sortable', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => [
			'option3',
			'option1',
			'option4',
		],
		'choices'  => [
			'option1' => esc_html__( 'Option 1', 'kirki' ),
			'option2' => esc_html__( 'Option 2', 'kirki' ),
			'option3' => esc_html__( 'Option 3', 'kirki' ),
			'option4' => esc_html__( 'Option 4', 'kirki' ),
			'option5' => esc_html__( 'Option 5', 'kirki' ),
			'option6' => esc_html__( 'Option 6', 'kirki' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'switch',
		'settings' => 'switch_setting',
		'label'    => esc_html__( 'Switch', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => '1',
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'kirki' ),
			'off' => esc_html__( 'Disable', 'kirki' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'typography',
		'settings' => 'typography_setting',
		'label'    => esc_html__( 'Typography', 'kirki' ),
		'section'  => 'kirki_options',
		'default'  => [
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '14px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => '#333333',
			'text-transform' => 'none',
			'text-align'     => 'left',
		],
	] );

}
add_action( 'init', 'kirki_sample_controls', 100 );

// Kirki PRO controls.
function kirki_pro_sample_controls() {

	// Stop here if Kirki doesn't exist.
	if ( ! class_exists( 'Kirki_Pro' ) ) {
		return;
	}

	/* Kirki PRO */

	// Reuse Kirki config.
	Kirki_Pro::use_config( 'theme_config_id' );

	Kirki::add_section( 'kirki_section', array(
		'title'       => esc_html__( 'Kirki PRO Controls', 'kirki' ),
		'panel'       => 'kirki_panel',
		'priority'    => 160,
	) );

	Kirki_Pro::add_field( 'theme_config_id', array(
		'type'       => 'slider',
		'settings'   => 'default_slider',
		'label'      => esc_html__( 'Slider', 'kirki' ),
		'description' => esc_html__( 'Experiment where we turn a regular Kirki control into a responsive control (work in progress)', 'kirki' ),
		'section'    => 'kirki_section',
		'default'    => 50,
		'transport'  => 'postMessage',
		'responsive' => true,
		'choices'    => array(
			'min'    => 0,
			'max'    => 100,
			'step'   => 1,
			'suffix' => 'px',
		),
		'default'    => array(
			'desktop' => 60,
			'tablet'  => 40,
			'mobile'  => 20,
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'      => 'input-slider',
		'settings'  => 'input_slider',
		'label'     => esc_html__( 'Input Slider', 'kirki' ),
		'section'   => 'kirki_section',
		'default'   => 30,
		'transport' => 'postMessage',
		'choices'   => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
	) );

	Kirki_Pro::add_field( 'theme_config_id', array(
		'type'       => 'input-slider',
		'settings'   => 'responsive_input_slider',
		'label'      => esc_html__( 'Responsive Input Slider', 'kirki' ),
		'section'    => 'kirki_section',
		'default'    => 30,
		'transport'  => 'postMessage',
		'responsive' => true,
		'choices'    => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'default'    => array(
			'desktop' => '60px',
			'tablet'  => '40',
			'mobile'  => '25%',
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'margin',
		'settings'    => 'margin',
		'label'       => esc_html__( 'Margin', 'kirki' ),
		'description' => esc_html__( 'Setting up margin field using Kirki Margin', 'kirki' ),
		'section'     => 'kirki_section',
		'default'     => '25px 15px 0 5px',
		'transport'   => 'postMessage',
		'choices'     => array(
			'save_as' => 'array',
		),
	) );

	Kirki_Pro::add_field( 'theme_config_id', array(
		'type'       => 'padding',
		'settings'   => 'padding',
		'label'      => esc_html__( 'Padding', 'kirki' ),
		'section'    => 'kirki_section',
		'responsive' => true,
		'default'    => array(
			'desktop' => '60px 0',
			'tablet'  => '40px 0',
			'mobile'  => '25px 0',
		),
		'transport'  => 'postMessage',
	) );

}
add_action( 'init', 'kirki_pro_sample_controls', 50 );
