<?php 
// Single page for featured photography
	$photo = get_field('photo'); 
?>
<h1><?php the_title(); ?></h1>
<section class="photo-wrapper" data-width="<?php echo $photo['sizes']['large-width']; ?>">
	<img src="<?php echo $photo['sizes']['large']; ?>" alt="<?php the_title(); ?>" />
</section>

<script>
var $width = jQuery('.photo-wrapper').data('width');
jQuery('.photo-wrapper').css('max-width', $width);
</script>