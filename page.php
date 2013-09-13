<?php get_header(); ?>
	<div class="inner-wrap">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $type = get_post_type();
			 // echo $type; ?>
			<article class="post" id="post-<?php the_ID(); ?>">

				<h2><?php the_title(); ?></h2>

				<div class="entry">

					<p><?php the_content(); ?></p>

					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

				</div>

				<div class="admin-edit"><?php edit_post_link('Edit this entry'); ?></div>

			</article>

			<?php endwhile; endif; ?>

		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
