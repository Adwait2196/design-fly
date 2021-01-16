<?php
/**
* This template is used for author archive.
*
* @package DesignFly
*/

get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$posts_per_page = get_option( 'posts_per_page' );
$current_usr_id = get_current_user_id();
$args = array(
  'post_type'       => array( 'post', 'df-portfolio' ),
  'posts_per_page'  => 3,
  'paged'           => $paged,
  'post_status'     => 'publish',
  'author'          => $current_usr_id
);

$authors_query = new WP_Query( $args );
?>

<div class="blogs-container">
  <main id="primary" class="site-main blogs-maincontent">
    <h2 class="blogs-maincontent__heading"><span class="blogs-heading__text">LET'S BLOG</span></h2>
    <div class="blogs-body">
      <?php
        if( $authors_query -> have_posts() ) {
          while( $authors_query -> have_posts() ) {
            $authors_query -> the_post();
            get_template_part( 'template-parts/content', 'blog-template' );
          }
        }
        else {
          ?>
          <p>
            <?php esc_html_e( 'Sorry, no posts found.', 'design-fly' ); ?>
          </p>
          <?php
        }
      ?>
    </div>
  </main>
  <div class="blogs-sidebar">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php design_fly_pagination_bar ( $authors_query ); ?>
<?php
get_footer();