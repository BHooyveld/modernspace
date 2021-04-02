<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Modernspace
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">

        <header>
            <div class="container-fluid">
                <nav class="navbar navbar--header navbar-expand-lg navbar-light">
                    <a aria-current="page" class="navbar-brand" aria-label="Home" href="/"><img class="brand__logo"
                            src="<?php echo get_template_directory_uri();?>/assets/images/logo/modernspace.svg"
                            alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    </button>
                    <?php

					wp_nav_menu([
						'theme_location'  => 'menu-primary',
						'container'       => 'div',
						'container_id'    => 'navbarSupportedContent',
						'container_class' => 'collapse navbar-collapse',
						'menu_id'         => false,
						'menu_class'      => 'navbar-nav flex-grow-1 d-flex d-lg-flex',
						'depth'           => 2,
						'walker'          => new bs4navwalker()

					]);
					?>
                </nav>
            </div>
        </header>
