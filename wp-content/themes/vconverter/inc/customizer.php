<?php
/**
 * vconverter Theme Customizer
 *
 * @package vconverter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vconverter_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->add_setting( 'ad_footer_info', [
		'default' => ''
	]);
	$wp_customize->add_setting( 'ad_footer_address', [
		'default' => ''
	]);
	$wp_customize->add_setting( 'ad_top_header', [
		'default' => ''
	]);

	$wp_customize->add_setting( 'ad_top_header_link', [
		'default' => ''
	]);

	$wp_customize->add_setting( 'ad_facebook_link', [
		'default' => ''
	]);
	$wp_customize->add_setting( 'ad_linkedin_link', [
		'default' => ''
	]);
	$wp_customize->add_setting( 'ad_location_link', [
		'default' => ''
	]);


	$wp_customize->add_section( 'ad_footer_info_section', [
		'title'	=>	__( 'Vconverter Footer Settings', 'vconverter' ),
		'priority'	=> 30
	] );

	$wp_customize->add_section( 'ad_top_header_section', [
		'title'	=>	__( 'Top Header', 'vconverter' ),
		'priority'	=> 35
	] );

	$wp_customize->add_section( 'ad_social_link_section', [
		'title'	=>	__( 'Social Links', 'vconverter' ),
		'priority'	=> 40
	] );

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'ad_facebook_link_input',
		array(
			'label' => __( 'Facebook Link', 'vconverter' ),
			'section'	=>	'ad_social_link_section',
			'settings'	=>	'ad_facebook_link',
		)
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'ad_linkedin_link_input',
		array(
			'label' => __( 'Linkedin Link', 'vconverter' ),
			'section'	=>	'ad_social_link_section',
			'settings'	=>	'ad_linkedin_link',
		)
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'ad_location_link_input',
		array(
			'label' => __( 'Location Link', 'vconverter' ),
			'section'	=>	'ad_social_link_section',
			'settings'	=>	'ad_location_link',
		)
	));
	
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'ad_footer_info_input',
		array(
			'label' => __( 'Footer Info', 'vconverter' ),
			'section'	=>	'ad_footer_info_section',
			'settings'	=>	'ad_footer_info',
		)
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'ad_footer_address_input',
		array(
			'label' => __( 'Address', 'vconverter' ),
			'section'	=>	'ad_footer_info_section',
			'settings'	=>	'ad_footer_address',
			'type'	=> 'textarea'
		)
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize,
		'top_header_img_control',
		array(
		'label' => 'Add Top Header Logo',
		'settings'  => 'ad_top_header',
		'section'   => 'ad_top_header_section'
	) ));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'ad_top_header_link_input',
		array(
			'label' => __( 'Url', 'vconverter' ),
			'section'	=>	'ad_top_header_section',
			'settings'	=>	'ad_top_header_link',
		)
	));
	
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'vconverter_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'vconverter_customize_partial_blogdescription',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'vconverter_customize_partial_blogdescription',
			)
		);
		
	}
}
add_action( 'customize_register', 'vconverter_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function vconverter_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function vconverter_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vconverter_customize_preview_js() {
	wp_enqueue_script( 'vconverter-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), VCONVERTER_VERSION, true );
}
add_action( 'customize_preview_init', 'vconverter_customize_preview_js' );
