<?php
/*
Template Name: featured_page_template
*/ 
?>
<?php get_header(); ?>
<div class="inner-wrap">
	<h1>Featured Photography</h1>
	<?php 
		$the_query = new WP_Query(array(
			'post_type' => 'feature_photos',
			'post_per_page=-1'
		));

		while ($the_query->have_posts()) : 
			$the_query->the_post(); 		

			$photo = get_field('photo'); ?>
			<article class="featured-wrap">
				<a href="<?php the_permalink(); ?>">
					<h3><?php the_title(); ?></h3>
					<img src="<?php echo $photo['sizes']['thumbnail']; ?>" alt="<?php the_title(); ?>" />
				</a>
			</article>
	<?php endwhile; 
		wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>