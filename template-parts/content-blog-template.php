<?php
/**
* Template part for displaying blog items
*
* @package DesignFly
*/
?>
<div>
<article id="post-<?php the_ID(); ?>">
  <div class="blog-wrapper">
    <a href="<?php esc_attr_e( get_post_permalink() ); ?>" class="blog-permalink">
      <div class="blog-head">
        <div class="blog-date">
          <span class="blog-date__day"><?php echo get_the_date( 'd' ); ?></span>
          <span class="blog-date__month"><?php echo get_the_date( 'M' ); ?></span>
        </div>
        <h2 class="blog-head__heading"><?php esc_attr_e( the_title() ); ?></h2>
      </div>
    </a>
    <div class="blog-body">
      <?php
        if( has_post_thumbnail() ) {
          ?>
          <div class="blog-thumbnail">
            <?php the_post_thumbnail( 'medium' ); ?>
          </div>
          <div class="blog-content">
            <div class="blog-content__header">
                <p class="blog-content__author"> by <a class="blog-author__permalink" href="<?php get_the_author_link(); ?>"><span class="blog-author__name"><?php echo get_author_name(); ?></span></a> on <?php echo get_the_date( 'd M Y' ); ?></p>
                <p class="blog-content__comments"><?php echo get_comments_number(); ?>Comments(s)</p>
            </div>
            <hr class="horizontal-bar1"/>
            <div class="blog-content__info">
              <?php the_excerpt(); ?>
            </div>
          </div>
          <?php
        }
        else {
          ?>
          <div class="blog-content">
            <div class="blog-content__header">
                <p class="blog-content__author"> by <a class="blog-author__permalink" href="<?php get_the_author_link(); ?>"><span class="blog-author__name"><?php echo get_author_name(); ?></span></a> on <?php echo get_the_date( 'd M Y' ); ?></p>
                <p class="blog-content__comments"><?php echo get_comments_number(); ?>Comments(s)</p>
            </div>
            <hr class="horizontal-bar1"/>
            <div class="blog-content__info">
              <?php the_excerpt(); ?>
            </div>
          </div>
          <?php
        }
      ?>
    </div>
  </div>
</article>
</div>
