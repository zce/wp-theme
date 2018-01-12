<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Reborn
 * @since 1.0
 * @version 1.0
 */

get_header();
?>
<header class="page-header">
	<?php if ( is_home() && ! is_front_page() ) : ?>
	<h1 class="page-title"><?php single_post_title(); ?></h1>
	<?php else : ?>
	<h2 class="page-title"><?php _e( 'Posts', 'reborn' ); ?></h2>
	<?php endif; ?>
</header><!-- /.page-header -->

<div class="row">
	<main id="primary" class="site-main col-lg-9" role="main">
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', get_post_format() );

			endwhile;

			// // 分页
			// the_posts_pagination( array(
			// 	'prev_text' => reborn_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'reborn' ) . '</span>',
			// 	'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'reborn' ) . '</span>' . reborn_get_svg( array( 'icon' => 'arrow-right' ) ),
			// 	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'reborn' ) . ' </span>',
			// ) );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif;
		?>
	</main><!-- /#primary -->

	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
