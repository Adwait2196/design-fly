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
$args = array(
  'post_type'     => 'df-portfolio',
  'posts_per_page' => 15,
  'paged'         => $paged
);

$portfolio_query = new WP_Query ( $args );
?>
  <div class="portfolio-container">
    <div class="portfolio-header">
      <h2 class="portfolio-header__heading"><span class="portfolio-heading__text">DESIGN IS THE SOUL</span></h2>
      <div class="portfolio-header__buttons">
        <button type="button" class="portfolio-header__button">Advertising</button>
        <button type="button" class="portfolio-header__button">Multimedia</button>
        <button type="button" class="portfolio-header__button">Photography</button>
      </div>
    </div>
    <hr class="horizontal-bar1"/>
    <div class="portfolio-body">
      <?php
        if( $portfolio_query -> have_posts() ) {
          while( $portfolio_query -> have_posts() ) {
            $portfolio_query -> the_post();
            echo '<a href="'.esc_attr( get_the_post_thumbnail_url() ).'" rel="lightbox">';
            echo '<img class="portfolio-images" src="'. get_the_post_thumbnail_url() .'"/>';
            echo '</a>';
          }
        }
        else {
          ?>
          <p>
            <?php esc_html_e( 'Sorry, no portfolio items found. Please add some portfolio items in admin dashboard.', 'design-fly' ); ?>
          </p>
          <?php
        }
      ?>
    </div>
    <?php design_fly_pagination_bar ( $portfolio_query ); ?>
  </div>
  <hr class="horizontal-bar2"/>
<?php
get_footer();
