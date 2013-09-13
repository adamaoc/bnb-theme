<?php get_header(); ?>
	<div class="inner-wrap">
		<?php $type = get_post_type();
			// echo $type; ?>

		<?php if ($type === 'feature_photos') {
			@include "_/single/featured-single.php";
		} elseif ($type === 'portfolios') { 
			@include "_/single/portfolio-single.php";
		} else { ?>	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php 
					if ($type === 'post') { 
						echo "<figure class='post-thumb'>";
						if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); };
						echo "<figcaption class='caption'>".get_the_title()."</figcaption>";
						echo "</figure>";
					}; 
				?>
				<div class="entry-content">
					
					<?php the_content(); ?>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
					
					<?php the_tags( 'Tags: ', ', ', ''); ?>
				
					<?php include (TEMPLATEPATH . '/_/inc/meta.php' ); ?>

				
					<div class="admin-edit"><?php edit_post_link('Edit this entry'); ?></div>
				</div>
				
			</article>

		<?php comments_template(); ?>

		<?php endwhile; endif; ?>
		<?php }; // ends if else 
			?>
	</div>
<?php get_footer(); ?>