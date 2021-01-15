<?php
/**
* Widget class for Custom Widget.
*
* This is a custom widget for portfolio post type.
*
* @package DesignFly
*/

class Designfly_Portfolio_Widget extends WP_Widget {
  public function __construct() {
    $widget_ops = array(
      'classname'   => 'design_fly_portfolio_widget',
      'description' => esc_html__( 'Custom DesignFly Portfolio Widget', 'design-fly' )
    );

    parent::__construct( 'design_fly_portfolio', 'Designfly Portfolio', $widget_ops );
  }

  public function form( $instance ) {
    if( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = 'Portfolio';
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?>:</label>
      <input class="widget_portfolio_title" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>"/>
    </p>
    <?php
  }

  public function widget( $args, $instance ) {
    echo $args[ 'before_widget' ];
    $query = new WP_Query( array(
      'post_type'       => 'df-portfolio',
      'posts_per_page'  => 8
    ) );

    if( $query -> have_posts() ) {
      ?>
      <h2 class="widget-title">
        <?php
          if( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
          }
          else {
            $title = 'Portfolio';
          }
          echo $title;
        ?>
      </h2>
      <div class="portfolio-widgcontainer">
        <?php
        while( $query -> have_posts() ) {
          $query -> the_post();
          echo '<a class="portfolio-widget__links" href="'.esc_attr( get_permalink() ).'">';
          echo '<img class="portfolio-widget__images" src="'. get_the_post_thumbnail_url() .'">';
          echo '</a>';
        }
        ?>
      </div>
      <?php
    }
    else {
      ?>
        <p>
          <?php _e( 'Sorry, no portfolio items found', 'design-fly' ); ?>
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
