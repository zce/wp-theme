<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Reborn
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card card-entry'); ?>>
	<header class="card-header">
		<?php if ( get_the_post_thumbnail() && ! is_single() ) : ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'reborn-featured-image', ['class' => 'card-img-top'] ); ?>
		</a>
		<?php endif; ?>

		<?php if ( is_sticky() && is_home() ) : ?>
		<div class="card-sticky"><i></i><i></i><i></i></div>
		<?php endif; ?>

		<div class="card-img-overlay">
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="card-meta">
				<div class="list">
					<?php if ( 'post' === get_post_type() ) : ?>
					<span class="byline"><span class="sr-only"><?php _ex( 'Posted by', 'Used before post author name.', 'reborn' ); ?></span><a href="<?php echo esc_url( get_author_posts_url( get_the_ID() ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 32 ) . get_the_author(); ?></a></span>
					<?php endif; ?>

					<?php if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) : ?>
					<?php reborn_entry_date(); ?>
					<?php endif; ?>

					<?php if ( 'post' === get_post_type() ) : ?>
					<?php reborn_entry_categories(); ?>
					<?php endif; ?>
				</div>
				<div class="list">
					<?php if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
					<span class="comments-link"><span class="sr-only"><?php _ex( 'Comments', 'Used before post comments.', 'reborn' ); ?></span>
					<?php comments_popup_link('0', '1', '%s', 'icon-bubble'); ?>
					</span>
					<?php endif; ?>

					<?php if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) : ?>
						<?php reborn_entry_like(); ?>
					<?php endif; ?>

					<?php if ( is_single() ) : ?>
						<?php reborn_entry_share(); ?>
					<?php endif; ?>
				</div>
			</div>
			<?php endif;?>
		</div>
	</header><!-- /.card-header -->

	<content class="card-body">
		<?php
		if ( is_single() ) {
			the_title( '<h1 class="card-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
		<div class="card-text">
		<?php the_content( sprintf( '%1$s<span class="sr-only"> "%2$s"</span>', __( 'Continue reading', 'reborn' ), get_the_title() ) );?>
		</div>
		<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'reborn' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</content><!-- /.card-body -->

	<footer class="card-footer">
		<?php reborn_entry_tags(); ?>
		<?php reborn_edit_link(); ?>
		<span class="more-link"><a href="single.html">继续阅读 →</a></span>
	</footer><!-- /.card-footer -->
</article><!-- /#post-<?php the_ID(); ?> -->
