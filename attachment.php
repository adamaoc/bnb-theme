<?php get_header(); ?>
<div class="inner-wrap">

	<?php if (have_posts()) : while (have_posts()) : the_post(); 

		$nexlink = '<img src="'.get_bloginfo('template_directory').'/_/img/arrow_RightLight.png">';
		$prevlink = '<img src="'.get_bloginfo('template_directory').'/_/img/arrow_LeftLight.png">';
	?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
			<div class="entry-content">
				<h2 style="text-align: center"><?php the_title(); ?></h2>	
				<div style="margin: 0px auto; text-align: center;">
					<img src="<?php echo $post->guid; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="attachment-img" />
				</div>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				<div class="img-navi">
					<div class="prev-img">
						<?php previous_image_link('thumbnail', $prevlink) ?>
					</div>
					<div class="next-img">
						<?php next_image_link('thumbnail', $nexlink); ?>
					</div>
				</div>
				<p class="tags"><?php the_tags( 'Tags: ', ', ', ''); ?></p>
			</div>
		
		</article>
			
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>

