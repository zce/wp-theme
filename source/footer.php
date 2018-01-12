<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Reborn
 * @since 1.0
 * @version 1.2
 */

?>
	</div><!-- /#content -->

	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="wrap">
			<?php
			get_template_part( 'template-parts/footer/footer', 'widgets' );

			if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'reborn' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>' . reborn_get_svg( array( 'icon' => 'chain' ) ),
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif;

			get_template_part( 'template-parts/footer/site', 'info' );
			?>
		</div><!-- .wrap -->
	</footer><!-- /#footer -->

	<?php wp_footer(); ?>
</body>
</html>
