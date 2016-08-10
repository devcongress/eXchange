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
			$upcoming_permalink = apply_filters('the_permalink',$include[0]->guid);
			$upcoming_guest = esc_attr( get_post_meta( $include[0]->ID, 'guest', true ) );
			$upcoming_date = esc_attr( get_post_meta( $include[0]->ID, 'date', true ) );
			$upcoming_time = esc_attr( get_post_meta( $include[0]->ID, 'time', true ) );
			$upcoming_invite_link = esc_attr( get_post_meta( $include[0]->ID, 'invite_link', true ) );
		
			if (has_post_thumbnail( $include[0]->ID ) ):
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $include[0]->ID ), 'single-post-thumbnail' );
			endif;
		?>

			<img src="<?php echo $image[0]; ?>" class"upcoming--image" alt="">
			<h4 class="upcoming__title">eXchange with <?php echo $upcoming_guest; ?></h4>
			<p class="upcoming__blurb"><?php echo $about_content; ?></p>
			<h6 class="upcoming__date"><?php echo $upcoming_date; ?></h6>
			<h6 class="upcoming__time"><?php echo $upcoming_time; ?></h6>
			<a href="<?php echo $upcoming_invite_link; ?>" class="upcoming__cta upcoming--join">Join Live Stream</a>
			<a href="<?php echo $upcoming_permalink; ?>" class="upcoming__cta upcoming--readmore" >Read More...</a>
		
	</section>

	<section>
		apprenticeship quotes

		<?php
		global $post;
		$tmp_post = $post;
		$myposts = get_posts( 'post_type=quote&numberposts=1&orderby=rand' );
		foreach( $myposts as $post ) : setup_postdata($post);
		    the_title(); ?>
		    quote from <a href="<?php the_permalink(); ?>"><?php echo get_post_meta(get_the_ID(), 'author', true); ?></a>
		<?php endforeach;
		$post = $tmp_post; ?>

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
			    while ($queryObject->have_posts()) {
			        $queryObject->the_post();
			        ?>
			        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			    <?php
			    }
			}
		?>
	</section>

	<section>
		<h3>Other Previous eXchanges</h3>

		<?php
			$queryObject = new WP_Query( 'post_type=exchange&posts_per_page=5&offset=1' );

			// The Loop!
			if ($queryObject->have_posts()) {
			    while ($queryObject->have_posts()) {
			        $queryObject->the_post();
			        ?>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			    <?php
			    }
			    ?>
			    <a href="http://localhost:8888/eXchange/exchange">View All eXchange Episodes</a>
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

	</div><!-- .entry-content -->
</article><!-- #post-## -->
