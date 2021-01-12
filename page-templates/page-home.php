<?php
  /**
  * Template Name: Home page
  *
  * The template for home page.
  *
  * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
  *
  * @package DesignFly
  */

  get_header();
?>
<main id="primary" class="site-main">
  <?php
	if( is_front_page() ) {
	?>
	<div class="intro-container" style="background-image: url( <?php esc_attr_e( get_theme_file_uri( '/assets/images/full-slider.png' ) ); ?> );">
		<div class="intro-content">
			<h1 class="intro-heading"><?php esc_html( the_title() ); ?></h1>
			<div class="intro-info"><?php esc_html( the_content() ); ?></div>
		</div>
	</div>
	<?php
	}
	?>
</main><!-- #main -->
<?php
get_footer();
