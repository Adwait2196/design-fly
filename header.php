<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DesignFly
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

<body <?php body_class(); ?> style="background-image: url( <?php esc_attr_e( get_theme_file_uri( '/assets/images/repeatable-bg.png' ) ); ?> );">
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'design-fly' ); ?></a>

	<header id="masthead" class="site-header" style="background-image: url( <?php esc_attr_e( get_theme_file_uri( '/assets/images/repeatable-bg.png') ); ?> );">
		<div class="site-branding">
			<?php
				if( has_custom_logo() ) {
					the_custom_logo();
				}
				else {
			?>
			<a href=" <?php get_site_url(); ?> " class="site-logo__link">
				<img class="site-logo__image" src=" <?php esc_attr_e( get_theme_file_uri( '/assets/images/logo.png' ) ); ?> " alt="Logo" style="min-width: 25%;" /> <!-- Setting the custom logo as default image selected.-->
			</a>
			<?php
				}
			?>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" data-toggle="collapse" data-target="#site-navmenu__list" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'design-fly' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location'	=> 'menu-1',
					'menu_id'					=> 'primary-menu',
					'menu_class'			=> 'site-navmenu__list',
					'container_class'	=> 'site-navmenu',
					'container_id'		=> 'site-navmenu__content'
				)
			);
			?>
			<form class="site-searchfield" action="<?php echo home_url( '/' ); ?>" method="get">
				<input type="text" class="site-searchbox" value="<?php the_search_query(); ?>" id="search" />
				<input type="image" id="site-searchbtn" alt="Search" src=" <?php bloginfo( 'template_url' ); ?>/assets/images/search-icon-normal.png ">
			</form>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
