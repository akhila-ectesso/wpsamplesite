<?php
/**
 * Sitetheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Site_Theme
 * @since Sitetheme 1.0
 */


if ( ! function_exists( 'sitetheme_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Sitetheme 1.0
	 *
	 * @return void
	 */
	function sitetheme_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'sitetheme_support' );

if ( ! function_exists( 'sitetheme_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Sitetheme 1.0
	 *
	 * @return void
	 */
	function sitetheme_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'sitetheme-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'sitetheme-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'sitetheme_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
