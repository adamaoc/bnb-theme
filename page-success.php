<?php
/*
Template Name: success_page_template
*/ 

	get_header(); 

	$success = Session::flash('success');
?>

<div class="inner-wrap">
	<div class="post">
		<h1>Success</h1>
		<p>Thank you for contacting me. I'll get back with you as soon as possible!</p>
		<h4>Message Sent</h4>
		<ul>
			<li>Contact From: <strong><?php echo $success['name']; ?> (<?php if(isset($success['company'])) { echo $success['company']; } ?>)</strong></li>
			<li>Contact Email: <strong><?php echo $success['email']; ?></strong></li>
			<li>Contact Phone: <strong><?php if(isset($success['phone'])){ echo $success['phone']; } ?></strong></li>
			<li>Message: <br><?php echo $success['message']; ?></li>
		</ul>
	</div>
	<aside id="sidebar">
		<div class="img-wrap">
			<img src="http://dfwbelliesandbabies.com/wp-content/uploads/2013/03/61883_10102633223091690_695379267_n-800x532.jpg" alt="You Successfully contacted DFW Bellies and Babies Photography" />
		</div>
	</aside>
</div>

<?php get_footer(); ?>