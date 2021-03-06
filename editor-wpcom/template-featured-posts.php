<?php
/**
 * The template containing the Featured Posts area.
 * The Featured Posts category is set up in Appearance -> Customize -> Theme Options.
 *
 * @package Editor
 */

// Get our Featured Content posts
$featured = editor_get_featured_posts();
// If we have no posts, our work is done here
if ( empty( $featured ) )
	return;
?>

				<div id="tab-2" class="widget-area tab-content animated fadeIn" role="tabpanel" aria-labelledby="panel-2" aria-hidden="true">
					<div class="widget featured-posts-widget">
						<h2 class="widget-title"><?php _e( 'Featured', 'editor' ); ?></h2>

						<div class="featured-posts">
							<?php // Let's loop through our posts ?>
								<?php foreach ( $featured as $post ) : setup_postdata( $post ); ?>
									<div class="featured-post">
										<?php if ( '' != get_the_post_thumbnail() ) { ?>
											<a class="featured-post-image" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'featured-post-image' ); ?></a>
										<?php } ?>
										<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
										<div class="featured-post-meta">
											<div class="featured-post-date">
												<i class="fa fa-clock-o"></i>
												<?php editor_posted_on(); ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
						</div><!-- .featured-posts -->

						<?php wp_reset_postdata(); ?>
					</div><!-- .featured-posts-widget -->
				</div><!-- #tab-2 .widget-area -->
