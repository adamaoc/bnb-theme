<?php
	$submitted = $_POST['submitted-form']; 
?>
<a name="contact-email"></a>
<?php 
	if ($submitted === 'true') { ?>
		<p class="submitted-message">
			Thanks for contacing me. I'll be getting back with you as soon as possible. In the mean time, feel free to check out the rest of our site or check me out on <a href="http://facebook.com" target="_blank">Facebook</a>.
		</p>
	<?php }else{ ?>
		<div class="errors">
			<p><?php if (isset($_POST['error-cust-name'])) { echo $_POST['error-cust-name']; } ?></p>
			<p><?php if (isset($_POST['error-email'])) { echo $_POST['error-email']; } ?></p>
			<p><?php if (isset($_POST['error-phone'])) { echo $_POST['error-phone']; } ?></p>
			<p><?php if (isset($_POST['error-auth'])) { echo $_POST['error-auth']; } ?></p>
		</div>
		<form name='contact-email' method='POST' action='#contact-email' accept-charset='UTF-8'>
			<label for="cust-name">Contact Name</label>
			<input name="cust-name" type="text" placeholder="<?php 
								if (isset($_POST['cust-name'])) {
									echo $_POST['cust-name'];
								}else{
									echo "Your Name";
								} ?> " onFocus="this.value=''" /><br />
			<label for="email">E-Mail</label>
			<input name="email" type="text" placeholder="<?php 
								if (isset($_POST['email'])) {
									echo $_POST['email'];
								}else{
									echo "your@email.com";
								} ?> " onFocus="this.value=''" /><br />
			<label for="phone">Phone Number</label>
			<input name="phone" type="text" placeholder="<?php 
								if (isset($_POST['phone'])) {
									echo $_POST['phone'];
								}else{
									echo "555-555-5555";
								} ?> " onFocus="this.value=''" /><br />
			<label for="message">Message</label>
			<textarea name="message"></textarea>
			<label for="auth">Are you human? Type <strong>YES</strong>:</label>
			<input name="auth" type="text" class="authen-form" value="" />
			<input type="submit" value="Send" name="Send" class="button submit" />
		</form>

	<?php }
?>


