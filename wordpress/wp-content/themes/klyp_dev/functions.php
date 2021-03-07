<?php
/**
 * Ben functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage ben-framework
 * @since Ben 1.0
 */

define('DIRECTORY', get_template_directory_uri() );

/**
 * Register and Enqueue Styles.
 */
function import_styles() {

	// Theme stylesheet.
	// wp_enqueue_style( 'ben-style', get_stylesheet_uri(), false, '100');
	// wp_enqueue_style( 'example-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', '4.9.0' );
}

add_action( 'wp_enqueue_scripts', 'import_styles' );

/**
 * Register and Enqueue Scripts.
 */
function t10_import_scripts() {

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/webpack/bundle.js', array(), '1.0.0', true );
	wp_enqueue_script( 'script-js', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true );

}

add_action( 'wp_enqueue_scripts', 't10_import_scripts' );

?>