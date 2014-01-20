<?php
/*
Template Name: home_page_template
*/ 
?>
<?php get_header(); ?>

<section class="featured-content">
	<h2>Featured Photography</h2>
	 <div id="gallery-1" class="royalSlider rsDefault visibleNearby">
		<?php 
			$the_query = new WP_Query(array(
				'post_type' => 'feature_photos',
				'post_per_page=-1'
			));

			while ($the_query->have_posts()) : 
				$the_query->the_post(); 		
				$featured = get_field('show_on_home_page');
				$photo = get_field('photo');
				if ($featured[0] === 'featured') { 
				?>
					<a class="rsImg" href="<?php echo $photo['sizes']['medium']; ?>">
						<?php the_title(); ?>
					</a>
				<?php }; ?>
		<?php endwhile; 
			wp_reset_postdata(); ?>
	  </div>
</section>
<section class="what-we-do">
	<div class="inner">
		<h2>What We Do:</h2>
		<p>
			<?php 
				$about_query = new WP_Query(array( 'post_type' => 'page', 'pagename' => 'about'));
				while ( $about_query->have_posts() ) :
					$about_query->the_post();
					the_Content();
				endwhile; 
			wp_reset_postdata(); ?>
		</p>
	</div>
</section>

<section class="blog-spotlight">
	<div class="inner">
		<h2>Blog Spotlight</h2>
		<?php 
			$blog_query = new WP_Query('posts_per_page=2');
			$i = 0;
			while ( $blog_query->have_posts() ) :
				$blog_query->the_post(); 
				if ($i < 3) {?>
				<article class="homepost">
					<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="homepost-thumb">
						<?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); } ?>
					</a>
					<p>
						<?php echo limit_words(get_the_excerpt(), '225'); ?> 
						<a href="<?php the_permalink(); ?>">read more &raquo; </a>
					</p>
				</article>
			<?php 
				$i++;
			};
			endwhile; 
		wp_reset_postdata(); ?>
	</div>
</section>

<section class="quick-contact">
	<h2>Quick Contact</h2>
	<?php 
		require_once "_flex/templates/contact-form.php";
	?>
</section>

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

<?php get_footer(); ?>