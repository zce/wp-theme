<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Reborn
 * @since 1.0
 * @version 1.0
 */

$tag = is_front_page() ? 'h1' : 'span';
$description = get_bloginfo( 'description', 'display' );

?>
<<?php echo $tag; ?> class="site-title">
	<a class="navbar-brand icon-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<span class="sr-only"><?php bloginfo( 'name' ); ?></span>
	</a>
</<?php echo $tag; ?>><!-- /.site-title -->
<?php if ( $description || is_customize_preview() ) : ?>
<p class="site-description sr-only"><?php echo $description; ?></p><!-- /.site-description -->
<?php endif; ?>
