<?php
/**
* Template Name: Portfolio Page
*
* The template for displaying portfolio.
*
* @package DesignFly
*
*/

get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$query = new WP_Query( array(
  'post_type'       => 'df-portfolio',
  'posts_per_page'  => 15,
  'paged'           => $paged
) );

if( $query -> have_posts() ) {
  ?>
    <div class="view-image-container">
      <div class="content-wrapper">
        <img src="" />
        <span class="close"><span class="dashicons dashicons-no-alt"></span></span>
      </div>
    </div>

    <div class="portfolio-wrapper">
      <div class="portfolio-wrapper-top">
        <p class="title">
          <?php esc_html( 'Sign is the soul' ); ?>
          <hr/>
        </p>
      </div>
      <?php
      while ($query -> have_posts() ) {
        $query -> the_post();
        get_template_part( 'template-parts/content', 'df-portfolio' );
      }
      ?>
    </div>
    <?php
      //design_fly_pagination_bar( $query );
    ?>
  <?php
}
else {
  ?>
    <p>
      <?php _e( 'Sorry, no portfolio items found', 'design-fly' ); ?>
    </p>
  <?php
}

get_footer();
