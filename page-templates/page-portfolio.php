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
  'post_type'       => 'df-portfolio',
  'posts_per_page'  => 15,
  'paged'           => $paged
);

$portfolio_query = new WP_Query ( $args );
?>
<main id="primary" class="site-main">
  <div class="portfolio-container">
    <div class="portfolio-header">
      <h2 class="portfolio-header__heading"><span class="portfolio-heading__text">DESIGN IS THE SOUL</span></h2>
      <div class="portfolio-header__buttons">
        <?php
          $terms = get_terms( [ 'taxonomy' => 'post_tag', 'hide_empty' => true ]);
          foreach( $terms as $term ) {
            ?>
            <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="portfolio-header__button" role="button"><span class="portfolio-header__buttontxt"><?php esc_html_e( $term->name ); ?></span></a>
            <?php
          }
        ?>
      </div>
    </div>
    <div class="portfolio-body">
      <?php
        if( $portfolio_query -> have_posts() ) {
          while( $portfolio_query -> have_posts() ) {
            $portfolio_query -> the_post();
            echo '<a class="portfolio-links thickbox" href="'.esc_attr( get_the_post_thumbnail_url() ).'?TB_iframe=true&width=350&height=450" rel="lightbox">';
            echo '<img class="portfolio-images" src="'. get_the_post_thumbnail_url() .'"/>';
            echo '<div class="portfolio-image__viewbtn">
                    <img class="portfolio-favicon__image" src="'. get_theme_file_uri( '/assets/images/favicon.ico' ) .'" alt="">
                    <button class="portfolio-viewing__btn" type="button">View Image</button>
                  </div>';
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
</main>
<?php
get_footer();
