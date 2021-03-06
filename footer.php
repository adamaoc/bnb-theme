		<footer id="footer" class="source-org vcard copyright">
			<div class="inner-wrap">
				<?php wp_nav_menu( array('theme_location' => 'social-links', 'menu_class' => 'footer-social-menu') ); ?>	
				<?php wp_nav_menu( array('theme_location' => 'footer-menu', 'menu_class' => 'footer-menu') ); ?>
				<small>
					&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?> -
					site designed and developed by <a href="http://ampnetmedia.com" target="_blank" title="ampnet(media) - DFW Web Design, Development, and SEO">ampnet(media)</a>
				</small>
			</div>
		</footer>

	</div>
	
	<div class="social-icons">
		<?php wp_nav_menu( array('theme_location' => 'social-links', 'menu_class' => 'social-menu') ); ?>
	</div>
	
	<?php wp_footer(); ?>


<!-- here comes the javascript -->

<!-- jQuery is called via the Wordpress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->
<script class="rs-file" src="<?php bloginfo('template_directory'); ?>/_/js/rs.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>
<?php if (is_page('homepage')) { ?>
	<script>
	// royal slider js
		var si = jQuery('#gallery-1').royalSlider({
	    addActiveClass: true,
	    arrowsNav: false,
	    controlNavigation: 'none',
	    autoScaleSlider: true, 
	    autoScaleSliderWidth: 960,     
	    autoScaleSliderHeight: 340,
	    loop: true,
	    fadeinLoadedSlide: false,
	    globalCaption: false,
	    keyboardNavEnabled: true,
	    globalCaptionInside: true,

	    visibleNearby: {
	      enabled: true,
	      centerArea: 0.4,
	      center: true,
	      breakpoint: 480,
	      breakpointCenterArea: 0.44,
	      navigateByCenterClick: true
	    }
	  }).data('royalSlider');

	  // link to fifth slide from slider description.
	  jQuery('.slide4link').click(function(e) {
	    si.goTo(4);
	    return false;
	  });
	</script>
<?php }; ?>
<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.-->
	 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-9674179-10']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

	
</body>

</html>
