<?php get_header(); ?>
<div class="inner-wrap">
	<?php 
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

			<?php include (TEMPLATEPATH . '/_/inc/meta.php' ); ?>

			<div class="entry">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="homepost-thumb">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); } ?>
				</a>
				<p>
					<?php echo limit_words(get_the_excerpt(), '225'); ?> 
					<a href="<?php the_permalink(); ?>">read more &raquo; </a>
				</p>
			</div>

		</article>
	<?php endwhile; ?>

	<?php include (TEMPLATEPATH . '/_/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
