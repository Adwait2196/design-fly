<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DesignFly
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php
		if( have_comments() ) {
			the_comments_navigation();
			?>
			<ol class="comments-list">
				<?php
					wp_list_comments( array(
						'type'			=> 'comment',
						'callback'	=>	'design_fly_custom_comments'
					) );
				?>
			</ol>
			<hr class="horizontal-bar1"/>
			<p class="post-comment"><?php esc_html_e( 'Post your comment', 'design-fly' ); ?></p>
			<?php
			the_comments_navigation();
			if( ! comments_open() ) {
				?>
					<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'design-fly' ); ?></p>
				<?php
			}
		}
		comment_form();
	?>
</div><!-- #comments -->
