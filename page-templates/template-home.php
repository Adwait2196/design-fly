<?php
/**
 * Template Name: Home Page
 *
 * Template part for displaying home page.
 *
 * @package DesignFly
 */
// Exit if accessed directly.
  defined( 'ABSPATH' ) || exit;

  get_header();

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
  get_footer();
?>
