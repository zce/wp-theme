<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Reborn
 * @since 1.0
 * @version 1.0
 */

?>
<aside id="secondary" class="site-sidebar col-lg-3" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- /#secondary -->

<?php
/*
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
	?>

	<aside id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
 */
