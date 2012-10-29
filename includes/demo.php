<?php 
function demo_styles(){ echo "
	<style>
	
		#demo {
			position:fixed;
			top:150px;
			right:115px;
			width:240px;
			background:			rgba(0, 0, 0, .75);
			color:#ddd;p
			text-align:center;
			line-height:1.5em;
			padding:6px;
			cursor:move;
			z-index:500;
			
			}
		.demopart { float: left; overflow: auto; width: 104px; background: black; margin-left: 6px;}
		.prepick  {
			margin:2px;
			width:11px;
			height:11px;
			border:1px #ddd solid;
			float:left;
			cursor: pointer;}
			
		#demo section {overflow:hidden; }
		#demo span {background:black;}
		#demo>div { background:black; padding:2px}
		#demo span {font-size:15px;background:black;}
		.togglefix {font-size:.8em; padding:2px; border:1px solid #555; margin-top:4px; cursor:pointer; height:27px; margin-bottom:17px; text-align:center;}
		.ie #chromeonly {display:none;}
		#demoenabler {background-image:url(".get_template_directory_uri()."/images/settings.png); border-radius:5px;}
	</style>";}

function demo_html(){echo "

	<form id='demoenabler' ></form>
	
	<div id='demo'>
	<div style='font-size:16px; text-align:center'>OPTIONS</div>
	<div style='overflow:auto;'><div class='demopart'>Body Links<br />
		<section id='demobackgrounds'>
			<div class='prepick' data-color='#191970' style='background-color:#191970;'>
			</div>
			<div class='prepick' data-color='#006400' style='background-color:#006400;'>
			</div>
			<div class='prepick' data-color='#B0171F' style='background-color:#B0171F;'>
			</div>
			<div class='prepick' data-color='#CDAD00' style='background-color:#CDAD00;'>
			</div>
			<div class='prepick' data-color='#8B5A00' style='background-color:#8B5A00;'>
			</div>
			<div class='prepick' data-color='purple' style='background-color:purple;'>
			</div>
			<div class='prepick' data-color='hotpink' style='background-color:hotpink;'>
			</div>
			<div class='prepick' data-color='black' style='background-color:black;'>
			</div>
			<div class='prepick' data-color='white' style='background-color:white;'>
			</div>
			<div class='prepick' data-color='#ddd' style='background-color:#ddd;'>
			</div>
			<div class='prepick' data-color='violet' style='background-color:violet;'>
			</div>
			<div class='prepick' data-color='indigo' style='background-color:indigo;'>
			</div>
		</section>
		Trim
		<section id='demotrim'>
			<div class='prepick' data-color='rgba(25, 25, 112, 0.8)' style='background-color:#191970;'>
			</div>
			<div class='prepick' data-color='rgba(00,64,00,.8)' style='background-color:#006400;'>
			</div>
			<div class='prepick' data-color='rgba(176, 23, 31, 0.8)' style='background-color:#B0171F;'>
			</div>
			<div class='prepick' data-color='rgba(205, 173, 0, 0.8)' style='background-color:#CDAD00;'>
			</div>
			<div class='prepick' data-color='rgba(139, 90, 0, 0.8)' style='background-color:#8B5A00;'>
			</div>
			<div class='prepick' data-color='rgba(128, 0, 128, 0.8)' style='background-color:#800080;'>
			</div>
			<div class='prepick' data-color='rgba(255, 105, 180, 0.8)' style='background-color:#FF69B4;'>
			</div>
			<div class='prepick' data-color='rgba(0,0,0,.8)' style='background-color:black;'>
			</div>
			<div class='prepick' data-color='rgba(255, 255, 255, 0.8)' style='background-color:white;'>
			</div>
			<div class='prepick' data-color='rgba(221, 221, 221, 0.8)' style='background-color:#ddd;'>
			</div>
			<div class='prepick' data-color='rgba(238, 130, 238, 0.8)' style='background-color:violet;'>
			</div>
			<div class='prepick' data-color='rgba(75, 0, 130, 0.8)' style='background-color:indigo;'>
			</div>
		</section>
		Trim Links
		<section id='demotext'>
			<div class='prepick' data-color='#191970' style='background-color:#191970;'>
			</div>
			<div class='prepick' data-color='#006400' style='background-color:#006400;'>
			</div>
			<div class='prepick' data-color='#B0171F' style='background-color:#B0171F;'>
			</div>
			<div class='prepick' data-color='#CDAD00' style='background-color:#CDAD00;'>
			</div>
			<div class='prepick' data-color='#8B5A00' style='background-color:#8B5A00;'>
			</div>
			<div class='prepick' data-color='purple' style='background-color:purple;'>
			</div>
			<div class='prepick' data-color='hotpink' style='background-color:hotpink;'>
			</div>
			<div class='prepick' data-color='black' style='background-color:black;'>
			</div>
			<div class='prepick' data-color='white' style='background-color:white;'>
			</div>
			<div class='prepick' data-color='#ddd' style='background-color:#ddd;'>
			</div>
			<div class='prepick' data-color='violet' style='background-color:violet;'>
			</div>
			<div class='prepick' data-color='indigo' style='background-color:indigo;'>
			</div>
		</section></div>
		<div class='demopart'>
		<p style='height:9px;'></p>
		<section >
			<p id='demofixedh' class='togglefix'>Fixed Header: On/Off </p>
		</section>
		<section>
			<p id='demofixedf' class='togglefix'>Fixed Footer: On/Off </p>
		</section>
		<section>
			<p id='demowide' class='togglefix'>Whitespace: On/Off </p>
		</section>
		<section>
			<p id='demologo' class='togglefix'>Psudeo Logo: On/Off </p>
		</section></div>



	</div></div>
	";}


function demo_jquery(){echo "
	<script type='text/javascript' src=' https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js'></script>
	<script>
	jQuery('#demo').draggable();
	jQuery('#demoenabler').draggable();
	jQuery('#demo').toggle();
	
	jQuery('#demobackgrounds .prepick').click(function(){
			var color = jQuery(this).data('color');
			jQuery('.heading a, #container a:link, #container a:visited').css('color',color);
	});
	jQuery('#demotrim .prepick').click(function(){
			var color = jQuery(this).data('color');
			jQuery('nav ul li:hover>ul, .trim, .sub-menu').css({'background-color':color,'border-color':color});
	});
	
	jQuery('#demotext .prepick').click(function(){
			var color = jQuery(this).data('color');
			jQuery('.trim, .trim a, .trim h1, header h2').css({'color':color});
	});

	jQuery('#demoenabler').on('click', function(){
		
		jQuery('#demo').toggle();
	});
 	jQuery('#demofixedf').on('click',function(){
 		jQuery('.subfooter').toggleClass('fixed');
 	});
 	jQuery('#demofixedh').on('click',function(){
 		jQuery('#subnav').toggleClass('unfix');
 	});
  	jQuery('#demowide').on('click',function(){
 		jQuery('.slate').toggleClass('contentwidthwide');
 	});
  	jQuery('#demologo').on('click',function(){
 		jQuery('header').toggle();
 	});
	</script>
	";}
add_action('wp_head', 'demo_styles');
add_action('wp_footer', 'demo_html');
add_action('wp_footer', 'demo_jquery');
?>