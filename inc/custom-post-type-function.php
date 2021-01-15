<?php
  function designfly_custom_post_type() {
    $labels = array(
      'name'                => esc_html__( 'Portfolio', 'design-fly' ),
      'singular_name'       => esc_html__( 'Portfolio', 'design-fly' ),
      'add_new'             => esc_html__( 'Add Portfolio Item', 'design-fly' ),
      'all_items'           => esc_html__( 'All Portfolio Items', 'design-fly' ),
      'add_new_item'        => esc_html__( 'Add Portfolio Item', 'design-fly' ),
      'edit_item'           => esc_html__( 'Edit Portfolio Item', 'design-fly' ),
      'new_item'            => esc_html__( 'New Portfolio Item', 'design-fly' ),
      'view_item'           => esc_html__( 'View Portfolio Item', 'design-fly' ),
      'search_item'         => esc_html__( 'Search Portfolio', 'design-fly' ),
      'not_found'           => esc_html__( 'No portfolio items found', 'design-fly' ),
      'not_found_in_trash'  => esc_html__( 'No portfolio items found in trash', 'design-fly' )
    );

    $args = array(
      'labels'              => $labels,
      'public'              => true,
      'has_archive'         => true,
      'publicly_queryable'  => true,
      'query_var'           => true,
      'rewrite'             => true,
      'capability_type'     => 'post',
      'hierarchical'        => false,
      'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revision' ),
      'taxonomies'          => array( 'category', 'post_tag' ),
      'menu_position'       => 5,
      'exclude_from_search' => false,
      'rewrite'             => array( 'slug' => 'df-portfolio' )
    );
    register_post_type( 'df-portfolio', $args );
  }
?>
