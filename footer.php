<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Full-width Underscores
 */
?>

		</div><!-- #content -->
	</div><!-- .main -->
</div><!-- #content-row -->

<div id="footer-row" class="full">
	<div class="main">
		<footer id="colophon" class="site-footer inner" role="contentinfo">
			<div class="site-info">
				<?php do_action( 'fwu_credits' ); ?>
				<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'fwu' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'fwu' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'fwu' ), 'Full-width Underscores', '<a href="http://seandavis.co" rel="designer">Sean Davis</a>' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- .main -->
</div><!-- #footer-row -->


<?php wp_footer(); ?>

</body>
</html>