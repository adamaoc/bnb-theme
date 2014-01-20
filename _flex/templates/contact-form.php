
<?php 
if(Session::exists('errors')) {
	$errors = Session::flash('errors');
}
if($errors) { ?>
	<div class="error-box">
		<ul>
			<?php foreach ($errors as $error) {
				?>
				<li><?php echo $error; ?></li>
				<?php
			} ?>
		</ul>
	</div>
<?php } ?>

<form role="form" action="" method="post" class="stacked-form">
	<div class="form-group">
		<label for="name">Full Name:</label>
		<input type="text" id="name" placeholder="Full Name" name="name" />
	</div>
	<div class="form-group">
		<label for="company">Company Name:</label>
		<input type="text" id="company" placeholder="Company Name (optional)" name="company" />
	</div>
	<div class="form-group">
		<label for="email">Contact Email:</label>
		<input type="text" id="email" placeholder="Contact@Email.com" name="email" />
	</div>
	<div class="form-group">
		<label for="phone">Contact Phone#:</label>
		<input type="text" id="phone" placeholder="Contact Phone# (optional)" name="phone" />
	</div>
	<div class="form-group">
		<label for="message">More details:</label>
		<textarea id="message" name="message" placeholder="Ender more details here."></textarea>
	</div>
	<input type="submit" value="Send!" class="button submit" />
	<input type="hidden" name="site" value="dfwbelliesandbabies">
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
</form>
