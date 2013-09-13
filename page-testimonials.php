<?php
/*
Template Name: testimonial_page_template
*/ 
?>
<?php get_header(); ?>
<div class="inner-wrap testamonials-page">
	<h2>Testimonials</h2>
	<section class="testimonials">	
		<?php 
			$testimonials_query = new WP_Query(array(
				'post_type' => 'testimonials',
				'post_per_page=-1'
			));

			while ($testimonials_query->have_posts()) : 
				$testimonials_query->the_post(); 		
				$featured = get_field('featue');
				?>
				<blockquote>
					<h3><?php the_field('customer_name'); ?></h3>
					<time><?php the_field('date'); ?></time>
					<p><?php the_field('text'); ?></p>
				</blockquote>
				<?php
			endwhile; 
		wp_reset_postdata(); ?>
	</section>
</div>
<?php get_footer(); ?>