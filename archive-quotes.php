<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package DevCongress eXchange
 */

get_header(); ?>
	
	<div class="entry-content">
		<section class="content-area">
			<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'quote-archive-listing' ); ?>

					<?php endwhile; ?>

					<?php dc_exchange_paging_nav(); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->
	</div>

<?php get_footer(); ?>
