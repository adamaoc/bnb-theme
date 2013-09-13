		<footer id="footer" class="source-org vcard copyright">
			<div class="footer-inner">
				<ul class="recent-posts">
					<h3>Recent Posts</h3>
					<?php
					global $post;
					$args = array( 'numberposts' => 8, 'offset'=> 0  );
					$myposts = get_posts( $args );
					foreach( $myposts as $post ) :	setup_postdata($post); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endforeach; ?>
					<li><a href="http://txgarage.com/feature/random-photos-from-txgarage/" title="txGarge car photography and random pictures">Random Automotive Photography by txGarage</a></li>
				</ul>
				
				<div class="footer-contact">
					<a name="contact"></a>
					<h3>Contact txGarage</h3>
					<form action="" method="post">
						
						<?php 
							if (isset($_GET['submitted'])) {
								echo "<h4>thanks for contacting us!</h4>";
							}else{ ?>
								<p>
							<label for="email">Your Email</label>
							<input type="email" class="email <?php if(isset($_GET['email'])) { echo 'error'; } ?>" name="email" placeholder="<?php 
								if (isset($_POST['email'])) {
									echo $_POST['email'];
								}else{
									echo "your@email.com";
								} ?> " onFocus="this.value=''" value="<?php 
								if (isset($_POST['email'])) {
									echo $_POST['email'];
								}else{
									echo "your@email.com";
								} ?> " onFocus="this.value=''" />
						</p>
						<p>
							<label for="subject">Why are you contacting us?</label>
							<input type="text" class="subject <?php if(isset($_GET['subject'])) { echo 'error'; } ?>" name="subject" placeholder="<?php 
								if (isset($_POST['subject'])) {
									echo $_POST['subject'];
								}else{
									echo "subject";
								} ?> " onFocus="this.value=''" value="<?php 
								if (isset($_POST['subject'])) {
									echo $_POST['subject'];
								}else{
									echo "subject";
								} ?> " onFocus="this.value=''" />
						</p>
						<p>
							<label for="message">Your message</label>
							<textarea rows="3" cols="21" name="message" class="message <?php if(isset($_GET['message'])) { echo 'error'; } ?>" onFocus="this.value=''"><?php 
								if (isset($_POST['message'])) {
									echo $_POST['message'];
								}else{
									echo "Your message here...";
								} ?> </textarea>
						</p>
						<p>
							<label for="auth">Are you a human?</label>
							<p>Are you a human?<br />Type <strong style="font-size: 16px; font-weight: bolder; font-style: italic;">yes</strong> below.</p>
							<input type="text" class="auth <?php if(isset($_GET['subject'])) { echo 'error'; } ?>" name="auth" placeholder="<?php 
								if (isset($_POST['auth'])) {
									echo $_POST['auth'];
								}else{
									echo "authenticate";
								} ?> " onFocus="this.value=''" value="<?php 
								if (isset($_POST['auth'])) {
									echo $_POST['auth'];
								}else{
									echo "authenticate";
								} ?> " onFocus="this.value=''" />
						</p>
						<p>
							<input type="submit" class="submit" value="Submit" />
						</p> <?php
								if (isset($_GET['subject']) || isset($_GET['message'])) {
									echo "<p class='error-text'>&#42;There seems to have been some errors</p>";
								}
							}
						?>
					</form>
				</div>
				
				<div class="footerNav">
					<h3>Footer Navigation</h3>
					<?php wp_nav_menu( array('menu' => 'main-nav' )); ?>
					<?php wp_nav_menu( array('menu' => 'secondary-nav' )); ?>
				</div>
				<div class="footerSocial">
					<h3>txGarage social sites</h3>
					<?php wp_nav_menu( array('menu' => 'social-nav' )); ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="copy">&copy <?php echo date("Y"); echo " "; bloginfo('name'); ?> - established 2007 - <?php bloginfo('description'); ?> - site design and multimedia by <a href="http://ampnetmedia.com" target="_blank">ampnet(media)</a> - all rights reserved</div>
		</footer>

	</div>

	<?php wp_footer(); ?>

<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>

<script>
(function() {
// special quote
	var co = $('article').find('span.quote').each(function() {
		var $this = $(this);

		$('<blockquote></blockquote>', {
			class: 'quote',
			text: $this.text()
		}).prependTo( $this.closest('p') );
		
	});
// remove width and height from img	
	$('img.alignnone').each(function(){ 
        $(this).removeAttr('width')
        $(this).removeAttr('height');
    });
    
// remove all height's from imgs 
	$('.inner-content img').each(function(){
			$(this).removeAttr('height');
	});    
	
// every 3rd image add class
 	if($(".entry-content").length){
 		$("img.alignnone").each(function(i){
 			var remainder = (i + 1) % 3;	 
 			if(remainder === 0){
 				$(this).parent().after('<div class="clear"></div>');
 			}
 		});
 	}
	
	$('div.wp-caption').eq(0).addClass('first');
	
// sociable fix 
	$('.sociable').first().addClass('socialble1');

// tweetify function
	$.fn.tweetify = function() {
		this.each(function() {
			$(this).html(
				$(this).html()
					.replace(/((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi,'<a href="$1" target="_blank">$1</a>')
					.replace(/(^|\s)#(\w+)/g,'$1<a href="http://search.twitter.com/search?q=%23$2">#$2</a>')
					.replace(/(^|\s)@(\w+)/g,'$1<a href="http://twitter.com/$2">@$2</a>')
			);
		});
		return $(this);
	} // end tweetify

	// get twitter feed
//	$.getJSON("http://twitter.com/statuses/user_timeline/txgarage.json?callback=?", function(data) {
//	     $("#twitter").html(data[0].text);
//	     $("#twitter").tweetify();
//	});
	// off get twitter feed
})();
</script>
<!-- Don't forget analytics -->
	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-9674179-1");
		pageTracker._trackPageview();
		} catch(err) {}
		var pageTracker = _gat._getTracker('UA-XXXXX-X');
		pageTracker._trackPageview();
	</script>
	
</body>

</html>
