<?php
/**
 * The template used for displaying page content in page-exchanges.php
 *
 * @package DevCongress eXchange
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="upcoming">
		<h3>Upcoming eXchange</h3>
		<?php
			$include = get_pages('include=17');
			$about_content = apply_filters('the_content',$include[0]->post_content);
		?>

			<img src="" class"upcoming--image" alt="">
			<h4 class="upcoming__title"></h4>
			<p class="upcoming__blurb"><?php echo $about_content; ?></p>
			<h6 class="upcoming__date"></h6>
			<h6 class="upcoming__time"></h6>
			<a href="#" class="upcoming__cta upcoming--join">Join Live Stream</a>
			<a href="#" class="upcoming__cta upcoming--readmore" >Read More...</a>
		
	</section>

	<section>
		apprenticeship quotes
	</section>

	<section>
		<h3>About eXchange</h3>
		<?php
			$include = get_pages('include=4');
			$about_content = apply_filters('the_content',$include[0]->post_content);
			echo $about_content;
		?>
	</section>

	<section>
		<h3>Most Recent eXchange</h3>
	</section>

	<section>
		<h3>Other Previous eXchanges</h3>
	</section>

	<section>
		<h3>Recommend</h3>
		add link to beautiful google form.
	</section>


	<div class="entry-content">

		<?php the_content(); ?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'dc_exchange' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
