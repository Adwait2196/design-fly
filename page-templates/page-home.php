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
  <!-- Code for displaying custom posts from Portfolio post type. -->
  <?php
  $args = array(
    'post_type'     => 'df-portfolio',
    'posts_per_page' => 6
  );

  $home_query = new WP_Query( $args );
  ?>
  <div class="portfolio-home">
    <div class="portfolio-hometop">
      <p class="portfolio-hometop__title"><?php esc_html_e( 'D\'SIGN IS THE SOUL' ); ?></p>
      <a class="portfolio-hometop__btn" href="<?php esc_attr_e( get_permalink( get_page_by_title( 'Portfolio' ) ) ); ?>">
        <span class="portfolio-hometop__btntxt"><?php esc_html_e( 'View All', 'design-fly' ); ?></span>
      </a>
    </div>
    <div class="portfolio-images__container">
    <?php
      if( $home_query -> have_posts() ) {
        while( $home_query -> have_posts() ) {
          $home_query -> the_post();
          echo '<a href="'.esc_attr( get_permalink() ).'">';
          echo '<img class="portfolio-home__images" src="'. get_the_post_thumbnail_url() .'"/>';
          echo '</a>';
        }
    ?>
    </div>
  </div>
  <?php
      }
      else {
        ?>
        <div class="container">
          <p>
            <?php esc_html_e( 'Sorry, no portfolio items found. Please add some portfolio items in admin dashboard.', 'design-fly' ); ?>
          </p>
        </div>
        <?php
      }
    ?>
	<?php
	}
	?>
</main><!-- #main -->
<?php
get_footer();
