<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<html  <?php language_attributes(); ?>>
		<?php
		wp_deregister_script('irajax');
		wp_register_script('irajax', get_template_directory_uri() .'/js/404.js', array('jquery'),'1',true);
		wp_enqueue_script('irajax');		
		// checks if the index has been modified by a template file. 
		$layout ='';
		global $elementtemplate;
		if (isset($elementtemplate)) {$layout = $elementtemplate;}
		// checks for demo mode
		if (of_get_option('demo',false ) == true){include "includes/demo.php";}
		// retrieves the header <head> tag.
		get_header();
		
		// Top halve of the page.?>
		
		
<?php
		
			   
		// Navigation
			   ?>
		
		
		<?php include "includes/navigation.php"; ?>
		<div class='slate'>
				
				
				<div class='container' style='position:relative;'> <div id='ajaxloader'>
				<!-- Ajax loader image--></div></div>
				
				<section id='container' >
				<div id='content'  class='container subcontainer massiveerror'>
			<div class='error'>ERROR!</div>
			<h2>404</h2>
			<div>Page not found; Sorry. Please try the search, or main navigation.</div>
				</section>
		</div>
<?php
		// loads scripts set to load in the footer.
		get_footer();
		wp_footer();
		?>
		 <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6. chromium.org/developers/how-tos/chrome-frame-getting-started -->
		 <!--[if lt IE 7 ]>
				<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
				<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
		<![endif]-->
		</body>
</html>


<?php
