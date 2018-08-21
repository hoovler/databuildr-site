<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Editor
 */

if ( ! function_exists( 'editor_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function editor_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'editor' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"><i class="fa fa-arrow-circle-o-left"></i> Older posts</span>', 'editor' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">Newer posts <i class="fa fa-arrow-circle-o-right"></i></span>', 'editor' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'editor_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function editor_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'editor' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr; Previous Post</span> %title', 'Previous post link', 'editor' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '<span class="meta-nav">Next Post &rarr;</span> %title', 'Next post link',     'editor' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'editor_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function editor_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	if ( is_sticky() && is_home() ) :
		printf( __( '<span class="posted-on">%1$s</span><span class="byline"> <span class="by">by</span> %2$s</span>', 'editor' ),
			__( 'Featured', 'editor' ),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)
		);
	else :
		printf( __( '<span class="posted-on">%1$s</span><span class="byline"> <span class="by">by</span> %2$s</span>', 'editor' ),
			sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
				esc_url( get_permalink() ),
				$time_string
			),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)
		);
	endif;
}
endif;

if ( ! function_exists( 'editor_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function editor_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class( 'clear' ); ?> id="li-comment-<?php comment_ID() ?>">

	<article class="comment-block" id="comment-<?php comment_ID(); ?>">

		<?php echo get_avatar( $comment->comment_author_email, 51 ); ?>

		<div class="comment-wrap">
			<footer class="comment-info">
				<?php printf( __( '<cite class="comment-cite">%s</cite>', 'editor' ), get_comment_author_link() ) ?>
				<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( __( '%1$s at %2$s', 'editor' ), get_comment_date(), get_comment_time() ) ?></a><?php edit_comment_link( __( '(Edit)', 'editor' ), '  ', '' ) ?>
			</footer>

			<div class="comment-content">
				<?php comment_text() ?>
				<p class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
				</p>
			</div>

			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'editor' ) ?></em>
			<?php endif; ?>
		</div>
	</article>
<?php
}
endif; // ends check for editor_comment

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function editor_categorized_blog() {
	if ( false === ( $editor_count_cats = get_transient( 'editor_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$editor_count_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$editor_count_cats = count( $editor_count_cats );

		set_transient( 'editor_categories', $editor_count_cats );
	}

	if ( $editor_count_cats > 1 ) {
		// This blog has more than 1 category so editor_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so editor_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in editor_categorized_blog.
 */
function editor_category_transient_flusher() {
	delete_transient( 'editor_categories' );
}
add_action( 'edit_category', 'editor_category_transient_flusher' );
add_action( 'save_post',     'editor_category_transient_flusher' );
