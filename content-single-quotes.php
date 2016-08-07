<?php
/**
 * @package DevCongress eXchange
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="enry-header">
		<h5 class="enry-title uppercase"><?php the_title(); ?></h5>
	</header><!-- .entry-header -->

	<div class="enry-content">
		<?php the_content(); ?>
		plenty quotes from us
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'dc_exchange' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
