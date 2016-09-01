<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kembara
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kembara' ); ?></a>

<header id='site-header'>
		
		<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		
		<nav class="navbar">
		  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#topnav" aria-controls="topnav" aria-expanded="false" aria-label="Toggle navigation">
			&#9776;
		  </button>

		  <div class="collapse navbar-toggleable-xs" id="topnav">
			<?php
			// Use the new walker
			 wp_nav_menu([
				'menu'            => 'primary',
				'theme_location'  => 'primary',
				'container'       => 'div',
				'container_id'    => 'topnav',
				'container_class' => 'collapse navbar-toggleable-sm',
				'menu_id'         => false,
				'menu_class'      => 'nav navbar-nav',
				'depth'           => 2,
				'fallback_cb'     => 'bs4navwalker::fallback',
				'walker'          => new bs4navwalker()
			]);
			?>
		  </div>
		</nav>

	</header>

	<div class="container" id="page-container">
		<div class="row">
			<div class="col-md-10 col-xs-12 offset-md-1" id="content">