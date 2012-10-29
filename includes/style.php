<?php
	global $fontfamily;
	global $fontname;
	global $cssname;
	$fontnumber1 = of_get_option('googlefont','failed');
	$fontnumber2 = of_get_option('bgooglefont','failed');

?>
<link  href='http://fonts.googleapis.com/css?family=<?php echo $cssname[$fontnumber1] ?>' rel='stylesheet' type="text/css" />
<link  href='http://fonts.googleapis.com/css?family=<?php echo $cssname[$fontnumber2] ?>' rel='stylesheet' type="text/css" />

<?php
	
	global $googlefonts;
	// Breaks the HEX value of possibly transprent elements into RGBA
	$color = of_get_option('glass','#000000');
	$rgb = html2rgb($color);
	$opacityfix = "";
	$screenvalue = "transparent";
	$chromevalue = "none";
	if ( of_get_option('opacity','100') < "100" ) {$opacityfix = ".";}
	if (of_get_option('screen', false ) == true ){ $screenvalue =  get_template_directory_uri()."/images/defaultscreen.png"; }
	if (of_get_option('chrome', false ) == true ){ $chromevalue = "url(".get_template_directory_uri()."/images/chrome.png)"; }
?>
<!-- These styles are set via the backend -->
<style>

<?php
				echo "
				
				body {background:".of_get_option('backgroundcolor','#ffffff')."	url("
				.of_get_option('backgroundimage','').") " 
				.of_get_option('backgroundrepeat','no-repeat')." " 
				.of_get_option('backgroundattachment','fixed')." "
				.of_get_option('backgroundx','center')." "
				.of_get_option('backgroundy','center').";}
				
				nav ul li:hover ul {
					background:rgba("
						.$rgb[0].",".$rgb[1].",".$rgb[2].",".$opacityfix, of_get_option('opacity','75').
					");}
				
				.trim{background:".$color.";
				background:
				rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",".$opacityfix, of_get_option('opacity','75').");
				 border-color:".of_get_option('link_color_trim','#654456').";line-height:0;}
				
				
				.trim, .slate, #toplink, #subnav, #content {border-color:".of_get_option('glassborder','').";}
				.sub-menu {border-color:".of_get_option('glassborder','').";}
				
				.trim .trim {box-shadow:none;}
				.trim, .trim h1,header h2, .trim a, .trim a:link,.trim a:active,.trim a:visited,.trim a:hover{color:"
				.of_get_option('link_color_trim','#654456')."; text-decoration:none;}
				h1, h2, h3, h4, h5, h6, .heading {font-family:".$fontname[$fontnumber1].";}
				
				
				 #container a:link, #container a:visited {color:"
				.of_get_option('link_color','#0000ff').
				" ; text-decoration:none; }
				body p, .entry p {font-family:".$fontname[$fontnumber2].", sans-serif; }
				#subnav .trim, .subfooter {background-position:bottom; background-image:".$chromevalue."; background-repeat:repeat-x;}
				#artscreen 	{ background:url(".$screenvalue.");}";
				
				
					
				
				
			if (of_get_option('postcols',true) == false ){echo".post {width:100%;}";}
			if (of_get_option('shadow',true) == true ){echo"
			.trim, #content { box-shadow:0 0 15px #000;}";}
			echo "#topofscreen {min-height:".of_get_option('height','100')."".of_get_option('hhmeasure','badreturn').";}";
			
			
	?>
			
iframe body {opacity:1;}
</style>		
		