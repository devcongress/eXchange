<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DevCongress eXchange
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
            <img src="<?php echo get_template_directory_uri(); ?>/images/exchange-collage.svg" alt="" />
        </div><!-- .site-info -->
        <div class="footer-attrib">
            <a href="http://devcongress.org"><img src="<?php echo get_template_directory_uri(); ?>/images/devcongress.svg" class="org-logo" alt="" /></a>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
