<?php
/**
* Template Name: Blogs Page
*
* This template is used for displaying blogs on a page.
*
* @package DesignFly
*/

get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$posts_per_page = get_option( 'posts_per_page' );
$args = array(
  'post_type'       => array( 'post', 'df-portfolio' ),
  'posts_per_page'  => $posts_per_page,
  'paged'           => $paged,
  'post_status'     => 'publish'
);

$blogs_query = new WP_Query( $args );
?>

<div class="blogs-container">
  <main id="primary" class="site-main blogs-maincontent">
    <h2 class="blogs-maincontent__heading"><span class="blogs-heading__text">LET'S BLOG</span></h2>
    <hr/>
    <div class="blogs-body">
      <?php
        if( $blogs_query -> have_posts() ) {
          while( $blogs_query -> have_posts() ) {
            $blogs_query -> the_post();
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
    <?php design_fly_pagination_bar ( $blogs_query ); ?>
  </main>
  <div class="blogs-sidebar">
    <?php get_sidebar(); ?>
  </div>
</div>

<?php
get_footer();