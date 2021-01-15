<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DesignFly
 */

?>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="site-contactinfo">
					<div class="welcome-container">
						<h2>Welcome to D'SIGNfly</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="contactus-container">
						<h2>Contact Us</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						<div class="contactus-icons">
							<?php
								$icons_arr = [ 'facebook', 'gp', 'linkedin', 'pin', 'twitter' ];
								foreach ( $icons_arr as $icon ) {
									?>
									<a href="#" class="contactus-icons__links">
										<img src="<?php esc_attr_e( get_theme_file_uri( '/assets/images/' ) . $icon . '.png' ); ?>" alt="<?php esc_html_e( '$icon' ); ?>">
									</a>
									<?php
								}
							?>
						</div>
					</div>
			</div>
			<hr class="horizontal-bar4"/>
			<div class="site-copyright">
				<p class="footer-text"><span>&#169;</span> 2020 - D'SIGNfly<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( '%1$s by %2$s.', 'design-fly' ), 'Designed', '<a href="https://google.com/">Adwait</a>' );
					?>
				</p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
