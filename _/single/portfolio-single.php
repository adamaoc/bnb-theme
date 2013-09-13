<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-content">
			
			<?php the_content(); ?>
			<div class="paypal-from">
				<?php the_field('paypal'); ?>
			</div>
			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
			
			<?php the_tags( 'Tags: ', ', ', ''); ?>
		
			<?php include (TEMPLATEPATH . '/_/inc/meta.php' ); ?>

		
			<div class="admin-edit"><?php edit_post_link('Edit this entry'); ?></div>
		</div>
		
	</article>

<?php comments_template(); ?>

<?php endwhile; endif; ?>