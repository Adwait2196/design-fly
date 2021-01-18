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
        <h2 class="blog-head__heading"><span class="blog-head__headingtxt"><?php esc_attr_e( the_title() ); ?></span></h2>
      </div>
    </a>
    <div class="blog-body">
      <?php
        if( has_post_thumbnail() ) {
          ?>
          <div class="blog-thumbnail">
            <?php the_post_thumbnail(); ?>
          </div>
          <div class="blog-content">
            <div class="blog-content__header">
                <p class="blog-content__author">
                  <?php design_fly_posted_by(); ?> on <?php echo get_the_date( 'd M Y' ); ?>
                </p>
                <p class="blog-content__comments"><span class="blog-content__cmnt"><?php echo get_comments_number(); ?>Comments(s)</span></p>
            </div>
            <div class="blog-content__info">
              <?php
                $excerpt_value = substr( get_the_excerpt(), 0, 225 ) . '...';
                esc_html_e( $excerpt_value );
                echo '<br/><a class="read-more" href="'. get_permalink( get_the_id() ) .'"><span class="read-more__txt">Read More</span></a>';
              ?>
            </div>
          </div>
          <?php
        }
        else {
          ?>
          <div class="blog-content">
            <div class="blog-content__header">
                <p class="blog-content__author">
                  <?php design_fly_posted_by(); ?> on <?php echo get_the_date( 'd M Y' ); ?>
                </p>
                <p class="blog-content__comments"><span class="blog-content__cmnt"><?php echo get_comments_number(); ?>Comments(s)</span></p>
            </div>
            <div class="blog-content__info">
              <?php
                $excerpt_value = substr( get_the_excerpt(), 0, 275 ) . '...';
                esc_html_e( $excerpt_value );
                echo '<br/><a class="read-more" href="'. get_permalink( get_the_id() ) .'"><span class="read-more__txt">Read More</span></a>';
              ?>
            </div>
          </div>
          <?php
        }
      ?>
    </div>
  </div>
</article>
</div>
