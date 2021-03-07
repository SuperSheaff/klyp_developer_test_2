<?php
/**
 * Header file for the T10 Framework WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage t10-framework
 * @since T10 Framework 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<title><?php wp_title(''); ?></title>
		<?php wp_head(); ?>

	</head>

	<body  <?php body_class(); ?> >

		<?php
		wp_body_open();
		?>

        <header class="bg-dark">
            <div class="container">
                <div class="d-flex justify-content-between py-3">
                    <p class="text-light mb-0">Ben Fowler</p>
                    <a href="tel:0414794660" class="text-light">Call me</a>
                </div>
            </div>
        </header>

		