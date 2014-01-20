<div id="sidebar">

    <section class="quick-contact">
        <h2>Quick Contact</h2>
        <?php require_once "_flex/templates/contact-form.php"; ?>
    </section>
<?php if(!is_page('about', 'contact')) { ?>
    <section class="testimonials">
		<h2>Testimonials</h2>
		
		<?php 
			$i = 0;
			$testimonials_query = new WP_Query(array(
				'post_type' => 'testimonials'
			));
			
			while ($testimonials_query->have_posts()) : 
				$testimonials_query->the_post(); 		
				$featured = get_field('featue');
				
				if (isset($featured)) { 
					if ($featured[0] === 'featured') {
					// only return top 4 featured
						if ($i < 4) {
							?>
							<blockquote>
								<h3><?php the_field('customer_name'); ?></h3>
								<time><?php the_field('date'); ?></time>
								<p><?php the_field('text'); ?></p>
							</blockquote>
							<?php
							$i++; 										
						}; 
					};
				};
			endwhile; 
		wp_reset_postdata(); ?>
	</section>
<?php } ?>
</div>