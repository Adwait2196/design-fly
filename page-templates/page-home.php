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
  <!-- Code for displaying home banner. -->
	<div class="intro-container" style="background-image: url( <?php esc_attr_e( get_theme_file_uri( '/assets/images/full-slider.png' ) ); ?> );">
		<div class="intro-content">
			<h1 class="intro-heading"><?php esc_html( the_title() ); ?></h1>
			<div class="intro-info"><?php esc_html( the_content() ); ?></div>
		</div>
	</div>

  <!-- Code for displaying custom posts from Portfolio post type. -->
  <?php
  $args = array(
    'post_type'     => 'df-portfolio',
    'post_per_page' => 6
  );

  $query = new WP_Query( $args );
  ?>
  <div class="portfolio-home">
    <div class="portfolio-hometop">
      <p class="portfolio-hometop__title"><?php esc_html_e( 'D\'SIGN IS THE SOUL' ); ?></p>
      <button class="portfolio-hometop__btn" type="button">View All</button>
    </div>
    <hr/>
  </div>
	<?php
	}
	?>
</main><!-- #main -->
<?php
get_footer();
