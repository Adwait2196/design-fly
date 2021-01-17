<?php
/**
 * The template for displaying category pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DesignFly
 */

get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1 ;
$category_id = get_query_var( 'cat' );
$args = array(
	'post_type'				=> array( 'post', 'df-portfolio' ),
	'posts_per_page'	=> 5,
	'paged'						=> $paged,
	'tax_query'				=> array(
		array(
			'taxonomy'		=> 'category',
			'terms'				=> $category_id
		),
	),
);
$categories_query = new WP_Query( $args );
?>
<div class="blogs-container">
	<main id="primary" class="site-main">

		<?php if ( $categories_query -> have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( $categories_query -> have_posts() ) :
				$categories_query -> the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'blog-template' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
	<div class="blogs-sidebar">
    <?php get_sidebar(); ?>
  </div>
</div>
<?php design_fly_pagination_bar ( $categories_query ); ?>
<?php
get_footer();
