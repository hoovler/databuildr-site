<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Editor
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a class="powered-by" href="<?php echo esc_url( __( 'https://github.com/hoovler/databuildr-site', 'dbrSource' ) ); ?>"><?php printf( __( 'Copyright 2018 by %s', 'dbrSource' ), 'Data BuildR, LLC' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s', 'editor' ), 'editor', '<a href="https://array.is/">Array</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
