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
			$include_content = apply_filters('the_meta',$include[0]->post_title);
			$date = esc_attr( get_post_meta( $include[0]->ID, 'time', true ) );

		?>
			<a href="<?php the_permalink(); ?>"><?php echo get_post_meta(get_the_ID(), 'guest', true); ?></a>
		    <?php echo $date; ?>
		    <?php echo get_post_meta(get_the_ID(), 'date', true); ?>
		    <?php echo get_post_meta(get_the_ID(), 'time', true); ?>
		    <?php echo get_post_meta(get_the_ID(), 'invite_link', true); ?>



		<?php if (has_post_thumbnail( $include->ID ) ):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<img class="page-featured-image" src="<?php echo $image[0]; ?>"></div>
		<?php endif; ?>

			<img src="<?php echo $image[0]; ?>" class"upcoming--image" alt="">
			<h4 class="upcoming__title"></h4>
			<p class="upcoming__blurb"><?php echo $about_content; ?></p>
			<p class="upcoming__blurb"><?php echo $include_content; ?></p>
			<p class="upcoming__blurb"><?php echo print_r($include); ?></p>
			<h6 class="upcoming__date"><?php echo $date; ?></h6>
			<h6 class="upcoming__time"></h6>
			<a href="#" class="upcoming__cta upcoming--join">Join Live Stream</a>
			<a href="#" class="upcoming__cta upcoming--readmore" >Read More...</a>
		
	</section>

	<section>
		apprenticeship quotes

		<?php
		global $post;
		$tmp_post = $post;
		$myposts = get_posts( 'post_type=quote&numberposts=1&orderby=rand' );
		foreach( $myposts as $post ) : setup_postdata($post); ?>
		    <?php the_title(); ?>
		    quote from <a href="<?php the_permalink(); ?>"><?php echo get_post_meta(get_the_ID(), 'author', true); ?></a>
		<?php endforeach; ?>
		<?php $post = $tmp_post; ?>

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


				<?php
		$queryObject = new WP_Query( 'post_type=exchange&posts_per_page=1' );
		// The Loop!
		if ($queryObject->have_posts()) {
		    ?>
		    <ul>
		    <?php
		    while ($queryObject->have_posts()) {
		        $queryObject->the_post();
		        ?>

		        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		    <?php
		    }
		    ?>
		    </ul>
		    <div><a href="#">View More</a></div>
		    <?php
		}
		?>
	</section>

	<section>
		<h3>Other Previous eXchanges</h3>

				<?php
		$queryObject = new WP_Query( 'post_type=exchange&posts_per_page=5&offset=1' );
		// The Loop!
		if ($queryObject->have_posts()) {
		    ?>
		    <ul>
		    <?php
		    while ($queryObject->have_posts()) {
		        $queryObject->the_post();
		        ?>

		        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		    <?php
		    }
		    ?>
		    </ul>
		    <div><a href="http://localhost:8888/eXchange/exchange">View All eXchange Episodes</a></div>
		    <?php
		}
		?>
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
