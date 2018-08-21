<?php
/**
 * The template part for displaying the post meta information
 *
 * @package Editor
 */
$format = get_post_format();
$formats = get_theme_support( 'post-formats' );
?>

<div class="entry-meta">
	<ul class="meta-list">
		<?php if ( 'post' == get_post_type() && $format && in_array( $format, $formats[0] ) ): ?>
			<li class="meta-format">
				<a href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'adaption' ), get_post_format_string( $format ) ) ); ?>">
					<?php echo get_post_format_string( $format ); ?>
				</a>
			</li>
		<?php endif; ?>
		<?php if ( has_category() ) { ?>
			<li class="meta-cat"><?php the_category( ', ' ); ?></li>
		<?php } ?>
		<?php $posttags = get_the_tags(); if ( $posttags ) { ?>
			<li class="meta-tag"><?php the_tags( '' ); ?></li>
		<?php } ?>
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<li class="meta-comment">
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'editor' ), __( '1 Comment', 'editor' ), __( '% Comments', 'editor' ) ); ?></span>
		</li>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'editor' ), '<li class="meta-edit">', '</li>' ); ?>
	</ul>
</div>