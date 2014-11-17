<?php
/**
 * Play Therapy Theme Customizer support
 *
 * @package WordPress
 * @subpackage play
 * @since Play Therapy 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Play Therapy 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function play_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'play_logo', array(
    'default' => 'none',
    'sanitize_callback' => 'logo_img',
)
 ); // Add setting for logo uploader	 
	 $wp_customize->add_setting( 'play_favi', array(
    'default' => 'none',
    'sanitize_callback' => 'favi_img',
) ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'play_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'play' ),
        'section'  => 'title_tagline',
        'settings' => 'play_logo',
		'sanitize_callback' => 'logo_img',
    ) ) );	 

		  // Add control for favi icon (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'play_favi', array(
        'label'    => __( 'Upload favicon 16x16px - transparent png', 'play' ),
        'section'  => 'title_tagline',
        'settings' => 'play_favi',
		'sanitize_callback' => 'favi_img',
    ) ) );
	
}
add_action( 'customize_register', 'play_customize_register' );



	
	
	
	