<?php 
$directory = $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/bnb-theme';
$init = $directory.'/_flex/core/init.php';
require_once $init;

require_once $flexConfig;
require_once $flexDB;
require_once $flexValidate;
require_once $flexInput;
require_once $flexToken;
require_once $flexSessions;
require_once $flexRedirect;


// contact message sent //
if(Input::exists()) {
	if(Token::check(Input::get('token'))) {
		$validate = new Validate();

		$validation = $validate->check($_POST, array(
			'name' => array(
				'required' => true,
				'min' => 4),
			'company' => array(
				'required' => false,
				'min' => 3),
			'email' => array(
				'required' => true,
				'email' => true),
			'phone' => array(
				'required' => false,
				'min' => 10,
				'max' => 13),
			'message' => array(
				'required' => true,
				'min' => 4)
		));

		if($validation->passed()) {
			$message = htmlspecialchars($_POST['message']);
			sendMessage($_POST['name'], $_POST['company'], $_POST['email'], $_POST['phone'], $message, $_POST['site']);

			Redirect::to("/success/");
			
		} else {
			
			$errors = array();
			foreach($validate->errors() as $error) {
				$errors[] .= $error;
			}

			Session::flash('errors', $errors);
			Redirect::to('#form');
		}
	}
}

if(is_page('success')) {
	if(!Session::exists('success')) {
		Redirect::to('/contact/');
	}
}
?>
<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head id="dallas-photography" data-template-set="photography-design-ampnetmedia" profile="http://ampnetmedia.com">

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<meta name="title" content="<?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	
	<meta name="google-site-verification" content="">
	<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
	
	<meta name="author" content="Your Name Here">
	<meta name="Copyright" content="Copyright Your Name Here 2011. All Rights Reserved.">

	<!-- Dublin Core Metadata : http://dublincore.org/ -->
	<meta name="DC.title" content="Project Name">
	<meta name="DC.subject" content="What you're about.">
	<meta name="DC.creator" content="Who made this site.">
	
	<meta name="viewport" content="width=device-width">
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico">
	<!-- This is the traditional favicon.
		 - size: 16x16 or 32x32
		 - transparency is OK
		 - see wikipedia for info on browser support: http://mky.be/favicon/ -->
		 
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/_/img/apple-touch-icon.png">
	<!-- The is the icon for iOS's Web Clip.
		 - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4's retina display (IMHO, just go ahead and use the biggest one)
		 - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
		 - Transparency is not recommended (iOS will put a black BG behind the icon) -->
	
	<!-- CSS: screen, mobile & print are all in the same file -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/_/css/css/screen.css">
	
	<!-- all our JS is at the bottom of the page, except for Modernizr. -->
	<script src="<?php bloginfo('template_directory'); ?>/_/js/modernizr-1.7.min.js"></script>
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="site-header">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a> <span><?php bloginfo('description'); ?></span></h1>
	</header>

	<div id="page-wrap">
	<nav id="pri-nav">
		<a id="main-menu-slider">Menu</a>
		<?php wp_nav_menu( array('menu' => 'main-nav' )); ?>
	</nav>
