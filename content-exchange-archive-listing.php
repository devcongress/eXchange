<?php
/**
 * @package DevCongress eXchange
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="enry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'dc_exchange' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
