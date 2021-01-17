<?php
/**
* Template Name: Blogs Page
*
* This template is used for displaying blogs on a page.
*
* @package DesignFly
*/

get_header();

?>

<div class="blogs-container">
  <main id="primary" class="site-main blogs-maincontent">
    <h2 class="blogs-maincontent__heading"><span class="blogs-heading__text"><?php esc_html_e( get_the_date( 'M Y' ) ); ?></span></h2>
    <div class="blogs-body">
      <?php
        if( have_posts() ) {
          while( have_posts() ) {
            the_post();
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
<?php
get_footer();
