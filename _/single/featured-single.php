<?php 
// Single page for featured photography
	$photo = get_field('photo'); 
	// print_r(get_field('photo'));
?>
<h1><?php the_title(); ?></h1>
<section class="photo-wrapper" data-width="<?php echo $photo['sizes']['large-width']; ?>">
	<img src="<?php echo $photo['sizes']['large']; ?>" alt="<?php the_title(); ?>" />
	<?php 

		$nexlink = '<img src="'.get_bloginfo('template_directory').'/_/img/arrow_RightLight.png">';
		$prevlink = '<img src="'.get_bloginfo('template_directory').'/_/img/arrow_LeftLight.png">';
		previous_post_link('%link', $prevlink);
		next_post_link('%link', $nexlink);
	?>
</section>

<script>
var $width = jQuery('.photo-wrapper').data('width');
jQuery('.photo-wrapper').css('max-width', $width);
</script>