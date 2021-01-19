<?php
/**
* Widget class for Related Posts Widget.
*
* This is a custom widget for related posts type.
*
* @package DesignFly
*/

class Designfly_Related_Posts_Widget extends WP_Widget {
  public function __construct() {
    $widget_ops = array(
      'classname'   => 'design_fly_related_posts_widget',
      'description' => esc_html__( 'Custom DesignFly Related Posts Widget', 'design-fly' )
    );

    parent::__construct( 'design_fly_related_posts', 'Designfly Related Posts', $widget_ops );
  }

  public function form( $instance ) {
    if( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = 'Related Posts';
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?>:</label>
      <input class="widget_related_posts_title" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>"/>
    </p>
    <?php
  }

  public function widget( $args, $instance ) {
    echo $args[ 'before_widget' ];
    $query = new WP_Query( array(
      'post_type'       => 'df-portfolio',
      'posts_per_page'  => 5
    ) );

    if( $query -> have_posts() ) {
      ?>
      <h2 class="widget-title"><span class="widget-title__heading">
        <?php
          if( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
          }
          else {
            $title = 'Related Posts';
          }
          echo $title;
        ?>
      </span></h2>
      <div class="relatedposts-widget">
        <?php
        while( $query -> have_posts() ) {
          $query -> the_post();
          echo '<div class="relatedposts-widget__container">';
          echo '<img class="relatedposts-images" src="'.get_the_post_thumbnail_url().'" alt="">';
          echo '<div class="relatedposts-info">
                  <h5 class="relatedposts-info__title"><span>'.get_the_title().'</span></h5>
                  <p class="relatedposts-para">by <span class="relatedposts-para__author">'.get_the_author().'</span> on <span class="relatedposts-para__date">'.get_the_time( 'd M Y' ).'</span></p>
                </div>';
          echo '</div>';
        }
        ?>
      </div>
      <?php
    }
    else {
      ?>
        <p>
          <?php _e( 'Sorry, no related posts found.', 'design-fly' ); ?>
        </p>
      <?php
    }
    echo $args[ 'after_widget' ];
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
	  $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    return $instance;
  }
}

?>
