<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Reborn
 * @since 1.0
 */

if ( ! function_exists( 'reborn_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the current post's date/time, author and category.
 */
function reborn_entry_meta() {

	// left

	echo '<div class="list">';

	// 作者
	if ( 'post' === get_post_type() ) {
		reborn_entry_author();
	}

	// 日期
	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		reborn_entry_date();
	}

	// 分类
	if ( 'post' === get_post_type() ) {
		reborn_entry_categories();
	}

	echo '</div>';

	// right

	echo '<div class="list">';

	// 评论
	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><span class="sr-only">' . _x( 'Comments', 'Used before post comments.', 'reborn' ) . '</span>';
		comments_popup_link('0', '1', '%s', 'icon-bubble');
		echo '</span>';
	}

	// 喜欢 / 不喜欢
	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		reborn_entry_like();
	}

	// 分享
	reborn_entry_share();

	echo '</div>';
}
endif;

if ( ! function_exists( 'reborn_entry_date' ) ) :
/**
 * Gets a nicely formatted string for the published date.
 */
function reborn_entry_date() {
	$time_string = get_the_time( 'U' ) !== get_the_modified_time( 'U' )
		? '<time class="published updated" datetime="%1$s" pubdate>%2$s</time>'
		: '<time class="published" datetime="%1$s" pubdate>%2$s</time><time class="updated sr-only" datetime="%3$s">%4$s</time>';

	$time_string = sprintf(
		$time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);

	// Wrap the time string in a link, and preface it with 'Posted on'.
	printf(
		'<span class="posted-on"><i class="icon-calender"></i><span class="sr-only">%1$s</span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before post date.', 'reborn' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'reborn_entry_categories' ) ) :
/**
 * Get HTML with meta information for the current post categories.
 */
function reborn_entry_categories() {
	$categories = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'reborn' ) );
	if ( $categories && reborn_categorized_blog() ) {
		printf( '<span class="cat-links"><i class="icon-paper-clip"></i><span class="sr-only">%1$s</span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'reborn' ),
			$categories
		);
	}
}
endif;

if ( ! function_exists( 'reborn_entry_tags' ) ) :
/**
 * Get HTML with meta information for the current post tags.
 */
function reborn_entry_tags() {
	$tags = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'reborn' ) );
	if ( $tags ) {
		printf( '<span class="tags-links"><i class="icon-tag"></i><span class="sr-only">%1$s</span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'reborn' ),
			$tags
		);
	}
}
endif;

if ( ! function_exists( 'reborn_entry_like' ) ) :
/**
 * Get HTML with meta information for the current post likes.
 * TODO: link title
 */
function reborn_entry_like() {
	$permalink = get_permalink();

	$likes = get_post_meta( get_the_ID(), 'like', true );
	if( $likes ){
		printf(
			'<span class="like-link"><span class="sr-only">%1$s</span><a class="icon-like" href="%2$s">%3$s</a></span>',
			_x( 'Likes', 'Used before post likes.', 'reborn' ),
			$permalink,
			$likes
		);
	}

	$dislikes = get_post_meta( get_the_ID(), 'dislikes', true );
	if( $dislikes ){
		printf(
			'<span class="dislike-link"><span class="sr-only">%1$s</span><a class="icon-dislike" href="%2$s">%3$s</a></span>',
			_x( 'Dislikes', 'Used before post dislikes.', 'reborn' ),
			$permalink,
			$dislikes
		);
	}
}
endif;

if ( ! function_exists( 'reborn_entry_share' ) ) :
/**
 * Get HTML with meta information for the current post share.
 * TODO: link title
 */
function reborn_entry_share() {
	printf(
		'<span class="share-link"><span class="sr-only">%1$s</span><a class="icon-share-alt" href="%2$s"></a></span>',
		_x( 'Share', 'Used before post share.', 'reborn' ),
		get_permalink()
	);
}
endif;

if ( ! function_exists( 'reborn_edit_link' ) ) :
/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
function reborn_edit_link() {
	edit_post_link(
		sprintf(
			'%1$s<span class="sr-only"> "%2$s"</span>',
			__( 'Edit', 'reborn' ),
			get_the_title()
		),
		'<span class="edit-link"><i class="icon-pencil"></i>',
		'</span>'
	);
}
endif;







// if ( ! function_exists( 'reborn_entry_footer' ) ) :
// /**
//  * Prints HTML with meta information for the categories, tags and comments.
//  */
// function reborn_entry_footer() {

// 	/* translators: used between list items, there is a space after the comma */
// 	$separate_meta = __( ', ', 'reborn' );

// 	// Get Categories for posts.
// 	$categories_list = get_the_category_list( $separate_meta );

// 	// Get Tags for posts.
// 	$tags_list = get_the_tag_list( '', $separate_meta );

// 	// We don't want to output .entry-footer if it will be empty, so make sure its not.
// 	if ( ( ( reborn_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

// 		echo '<footer class="card-footer">';

// 			if ( 'post' === get_post_type() ) {
// 				if ( ( $categories_list && reborn_categorized_blog() ) || $tags_list ) {
// 					echo '<span class="cat-tags-links">';

// 						// Make sure there's more than one category before displaying.
// 						if ( $categories_list && reborn_categorized_blog() ) {
// 							echo '<span class="cat-links">' . reborn_get_svg( array( 'icon' => 'folder-open' ) ) . '<span class="sr-only">' . __( 'Categories', 'reborn' ) . '</span>' . $categories_list . '</span>';
// 						}

// 						if ( $tags_list ) {
// 							echo '<span class="tags-links">' . reborn_get_svg( array( 'icon' => 'hashtag' ) ) . '<span class="sr-only">' . __( 'Tags', 'reborn' ) . '</span>' . $tags_list . '</span>';
// 						}

// 					echo '</span>';
// 				}
// 			}

// 			reborn_edit_link();

// 		echo '</footer> <!-- .entry-footer -->';
// 	}
// }
// endif;

/**
 * Display a front page section.
 *
 * @param WP_Customize_Partial $partial Partial associated with a selective refresh request.
 * @param integer              $id Front page section to display.
 */
function reborn_front_page_section( $partial = null, $id = 0 ) {
	if ( is_a( $partial, 'WP_Customize_Partial' ) ) {
		// Find out the id and set it up during a selective refresh.
		global $reborncounter;
		$id = str_replace( 'panel_', '', $partial->id );
		$reborncounter = $id;
	}

	global $post; // Modify the global post object before setting up post data.
	if ( get_theme_mod( 'panel_' . $id ) ) {
		$post = get_post( get_theme_mod( 'panel_' . $id ) );
		setup_postdata( $post );
		set_query_var( 'panel', $id );

		get_template_part( 'template-parts/page/content', 'front-page-panels' );

		wp_reset_postdata();
	} elseif ( is_customize_preview() ) {
		// The output placeholder anchor.
		echo '<article class="panel-placeholder panel reborn-panel reborn-panel' . $id . '" id="panel' . $id . '"><span class="reborn-panel-title">' . sprintf( __( 'Front Page Section %1$s Placeholder', 'reborn' ), $id ) . '</span></article>';
	}
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function reborn_categorized_blog() {
	$category_count = get_transient( 'reborn_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'reborn_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}


/**
 * Flush out the transients used in reborn_categorized_blog.
 */
function reborn_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'reborn_categories' );
}
add_action( 'edit_category', 'reborn_category_transient_flusher' );
add_action( 'save_post',     'reborn_category_transient_flusher' );
