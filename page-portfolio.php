<?php
/*
Template Name: portfolio_page_template
*/ 
?>
<?php get_header(); ?>
<div class="inner-wrap">
	<h1>Portfolios</h1>
	<?php 
		$portfolio_query = new WP_Query(array(
			'post_type' => 'portfolios',
			'post_per_page=-1'
		));

		while ($portfolio_query->have_posts()) : 
			$portfolio_query->the_post(); 


		?>
			
			<article class="portfolio-wrap"> 
				<a href="<?php the_permalink(); ?>">
					<h3><?php the_title(); ?></h3>
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); } ?>
				</a>
			</article>

	<?php endwhile; ?>
</div>
<?php get_footer(); ?>