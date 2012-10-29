<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */
if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
    $optionsframework_settings = get_option('optionsframework');
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
    if ( get_option($option_name) ) {
        $options = get_option($option_name);
    }
    if ( isset($options[$name]) ) {
        return $options[$name];
    } else {
        return $default;
    }
}
}
  
 
function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

include "includes/googlefonts.php";
function optionsframework_options() {
	$able = array(1=>"Enabled", 2=>"Disabled");
	$imagepath =  get_template_directory_uri() ."/images/";
	global $fontname; 
	
	$options[] = array( "name" => "General Settings",
						"type" => "heading");
	
	
	
	$options[] = array( "name" => "Favicon",
						"desc" => "This option sets the favicon image, while it is suggested that it be an icon file, in most cases with modern browsers a png will also work. This icon shown in tabs and history areas to quickly identify the site to your visitors.",
						"id" => "favicon",
						"type" => "upload");
						
	$options[] = array( "name" => "Enable Ajax Loading",
						"desc" => "This option turns off and on the Ajax Content loader pervasive through out the site. It can sometimes interfere with specific javascript plugins that require an on ready hook. This can be solved usually with Livequery, included with the theme.",
						"id" => "ajax",
						"std" => "Enabled",
						"type" =>"checkbox");	
	
	$options[] = array( "name" => "Demo Mode",
						"desc" => "Displays some css changing options on the front end of the site. Do not enable for live sites.",
						"id" => "demo",
						"std" => 0,
						"type" =>"checkbox");					

	
						
	$options[] = array( "name" => "Footer Text",
						"desc" => "This is text that will appear in the bottom left of the static footer. Feel free to change it. It is intended for copyright information.",
						"id" => "footer-text",
						"std" => "",
						"class" => "",
						"type" => "text");
	
						
	
	
	
	
	$options[] = array( "name" => "Styling",
						"type" => "heading");


	$options[] = array( "name" => "Enable Shadow on Glass",
						"desc" => "This option puts a dark shadow/halo around the trim of the site when enabled.  It adds an element of realism.",
						"id" => "shadow",
						"std" => "Enabled",
						"type" =>"checkbox");
	
	$options[] = array( "name" => "Enable Header Screen",
						"desc" => "This creates a screen on the top half of the website for artistic reasons when enabled.",
						"id" => "screen",
						"std" => "Enabled",
						"type" =>"checkbox");
	$options[] = array( "name" => "Enable Chrome on the Glass Trim",
						"desc" => "This creates an overlay on the glass trim, giving it a rounded feel. This affects the color of the element significantly so use with care.",
						"id" => "chrome",
						"std" => "Enabled",
						"type" =>"checkbox");						
	$options[] = array( "name" => "Glass Link Color",
						"desc" => "This is the color of the links in the bottom and top of the site in the trim area along with the text.This color should contrast the Glass Link color. ",
						"id" => "link_color_trim",
						"std" => "#ffffff",
						"type" => "color");
						
	$options[] = array( "name" => "Glass Color",
						"desc" => "This is the background color of the header navigation and footer that form the trim of the theme.",
						"id" => "glass",
						"std" => "#000000",
						"type" => "color");
	$options[] = array( "name" => "Glass Color border",
						"desc" => "This is the color of various one pixel borders associated with the site trim, but not the ones within main content area. Those will stay a gray tone unless changed in the custom.css",
						"id" => "glassborder",
						"std" => "#000000",
						"type" => "color");
		$options[] = array( "name" => "Opacity Level",
						"desc" => "This changes the opacity level of the background of the trim and only the background it does not change the opacity of the text of those elements (thus not affecting the color). The value must be between 0-100, and must have a placeholder zero preceding if less than 10. The following are valid values; 01, 05, 10, 50, 99, 98.5, 20.52, 100, 60, 20.",
						"id" => "opacity",
						"std" => "",
						"class" => "mini",
						"type" => "text");
						
	$options[] = array( "name" => "Link Color",
						"desc" => "This changes the color of the normal links in the body of the site, they will always be on a white background unless changed in the custom css so keep that in mind.",
						"id" => "link_color",
						"std" => "#0000ff",
						"type" => "color");
	$options[] = array( "name" => "Background Color",
						"desc" => "This is the chief background color that any background images will appear against.",
						"id" => "backgroundcolor",
						"std" => "#0000",
						"type" => "color");
	
		
	$options[] = array( "name" => "Logo",
						"desc" => "You can set this value using WordPress media library, or upload your own using this option. Any image that you set using this option can be recalled from the library as long as the media is not deleted. This image replaces the header text in the top half of the screen that is wrapped in trim. Removing the image returns the header text.",
						"id" => "logo",
						"type" => "upload");
	
	
						
	$options[] = array( "name" => "Background Image",
						"desc" => "This option sets the background image.You can set this value using WordPress media library, or upload your own using this option. Any image that you set using this option can be recalled from the library as long as the media is not deleted. ",
						"id" => "backgroundimage",
						"type" => "upload");					
	$options[] = array( "name" => "Background Attachment",
						"desc" => "Sets if the image is Fixed to the browser window not scrolling with the screen, or if it scrolls with the screen.",
						"id" => "backgroundattachment",
						"std" => "fixed",
						"type" => "select",
						"options" => array(
							'fixed' => 'Fixed',
							'scroll' => 'Scroll')
						);
	$options[] = array( "name" => "Background Repeat",
						"desc" => "This option sets in what way you would like to set the background repeating if it is repeated.",
						"id" => "backgroundrepeat",
						"std" => "no-repeat",
						"type" => "select",
						"options" => array(
							'no-repeat' => 'No Repeating',
							'repeat' => 'Repeating',
							'repeat-x' => 'Repeat Horizonally',
							'repeat-y' => 'Repeat Vertically')
						);
		$options[] = array( "name" => "Background Placement Horizonally",
						"desc" => "Sets the origin of the background rendering horizontally. If the background repeats this option moves it around.",
						"id" => "backgroundx",
						"std" => "center",
						"type" => "select",
						"options" => array(
							'left' => 'Left',
							'right' => 'Right',
							'center' => 'Center')
						);
		$options[] = array( "name" => "Background Placement Vertically",
						"desc" => "Sets the origin of the background rendering Vertically. If the background repeats this option moves it around.",
						"id" => "backgroundy",
						"std" => "center",
						"type" => "select",
						"options" => array(
							'top' => 'Top',
							'bottom' => 'Bottom',
							'center' => 'Center')
						);
	
	
	
	$options[] = array( "name" => "Typography",
						"type" => "heading");
	$options[] = array( "name" => "Typography",
						"desc" => "While the theme has defaults for Typography you can freely change theme here. The google font resporitory can be found here at the <a href='http://www.google.com/webfonts' target='blank_'> google fonts repository</a>. You can change the font of the body area or the headers.",
						"type" => "info");
						
	$options[] = array( "name" => "Header Google Font",
						"desc" => "Select from a list of 320 fonts to use as the header font.",
						"id" => "googlefont",
						"std" => "45",
						"type" => "select",						
						"options" => $fontname);
						

	
	$options[] = array( "name" => "Body Google Font URL",
						"desc" => "Select from a list of 320 fonts to use as the body text",
						"id" => "bgooglefont",
					"std" => "45",
						"type" => "select",						
						"options" => $fontname);
										
					
						
						
	
	$options[] = array( "name" => "Layout",
						"type" => "heading");
	
	$options[] = array( "name" => "Header Height",
						"id" => "height",
						"std" => "100",
						"class" => "mini",
						"type" => "text");
	
	$options[] = array( "name" => "Header Height Measurement",
						"desc" => "Images for layout.",
						"id" => "hhmeasure",
						"class"=>"mini",
						"std" => "%",
						"options" => array(
							"%"=>'Percentage %',
							"px"=>'Pixel [px]',
							'em'=>'Letter M Widths [em]'),
						"type"=>"select",
						);						
	$options[] = array( "name" => "Enable Fixed Header",
						"desc" => "Fixes the Header to the top of the screen",
						"id" => "fixheader",
						"std" => "Enabled",
						"type" =>"checkbox");
						
	$options[] = array( "name" => "Enable Fixed ",
						"desc" => "Fixes the footer to the bottom of the screen",
						"id" => "fixfooter",
						"std" => "Enabled",
						"type" =>"checkbox");												
	
	$options[] = array( "name" => "Expanded Content Slate ",
						"desc" => "Expands the whitespace in the content zone to cover the background.",
						"id" => "contentwidth",
						"std" => "Enabled",
						"type" =>"checkbox");

	$options[] = array( "name" => "Blog Page Layout",
						"desc" => "",
						"id" => "layout",
						"std" => "2c-l-fixed",
						"type" => "images",
						"options" => array(
							'1col' => $imagepath . '1col.png',
							'1col_footer' => $imagepath . '1col_footer.png',
							'2col' => $imagepath . '2col.png',
							'2col_footer' => $imagepath . '2col_footer.png')
						);
						
	$options[] = array( "name" => "Single Page Layout",
						"desc" => "",
						"id" => "single_layout",
						"std" => "2c-l-fixed",
						"type" => "images",
						"options" => array(
							'1col' => $imagepath . '1col.png',
							'1col_footer' => $imagepath . '1col_footer.png',
							'2col' => $imagepath . '2col.png',
							'2col_footer' => $imagepath . '2col_footer.png')
						);
	$options[] = array( "name" => "Number of columns in Blog",
						"desc" => "Enable two columns for the main blog post list.",
						"id" => "postcols",
						"std" => "Enabled",
						"type" =>"checkbox");	
	
	
	
	
							
	$options[] = array( "name" => "2col_footer Template Page Layout",
						"desc" => "Images for layout.",
						"id" => "2col_footer_layout",
						"std" => "2col_footer",
						"type" => "images",
						"class"=>"hidden",
						"options" => array(
							'1col' => $imagepath . '1col.png',
							'1col_footer' => $imagepath . '1col_footer.png',
							'2col' => $imagepath . '2col.png',
							'2col_footer' => $imagepath . '2col_footer.png')
						);						
	$options[] = array( "name" => "1col Template Page Layout",
						"desc" => "Images for layout.",
						"id" => "1col_layout",
						"std" => "1col",
						"type" => "images",
						"class"=>"hidden",
						"options" => array(
							'1col' => $imagepath . '1col.png',
							'1col_footer' => $imagepath . '1col_footer.png',
							'2col' => $imagepath . '2col.png',
							'2col_footer' => $imagepath . '2col_footer.png')
						);						
	$options[] = array( "name" => "1col_footer Template Page Layout",
						"desc" => "Images for layout.",
						"id" => "1col_footer_layout",
						"std" => "1col_footer",
						"type" => "images",
						"class"=>"hidden",
						"options" => array(
							'1col' => $imagepath . '1col.png',
							'1col_footer' => $imagepath . '1col_footer.png',
							'2col' => $imagepath . '2col.png',
							'2col_footer' => $imagepath . '2col_footer.png')
						);						
	$options[] = array( "name" => "2col Template Page Layout",
						"desc" => "Images for layout.",
						"id" => "2col_layout",
						"class"=>"hidden",
						"std" => "2col",
						"type" => "images",
						"options" => array(
							'1col' => $imagepath . '1col.png',
							'1col_footer' => $imagepath . '1col_footer.png',
							'2col' => $imagepath . '2col.png',
							'2col_footer' => $imagepath . '2col_footer.png')
						);
	
	
	
	
	
	
	
						
						

	
	
	$options[] = array( "name" => "Social",
						"type" => "heading");
						
	$options[] = array( "name" => "Facebook ID number",
						"desc" => "Your facebook ID number, it can usually be found in the URL of your profile/fan page/group",
						"id" => "facebook",
						"std" => "",
						"class" => "mini",
						"type" => "text");
	
	$options[] = array( "name" => "Twitter Name",
						"desc" => "Your Twitter name, please exclude the @ sign at the begining.",
						"id" => "twitter",
						"std" => "",
						"class" => "mini",
						"type" => "text");
	
	$options[] = array( "name" => "Google+ ID",
						"desc" => "Number found in the url of your Google+ profile page",
						"id" => "gplus",
						"std" => "",
						"class" => "mini",
						"type" => "text");
	
	$options[] = array( "name" => "LinkedIn ID",
						"desc" => "Number found in the url of your LinkedIn profile page",
						"id" => "linkedin",
						"std" => "",
						"class" => "mini",
						"type" => "text");
	
	$options[] = array( "name" => "Dribbble Username",
						"desc" => "Your Dribbble profile name",
						"id" => "dribbble",
						"std" => "",
						"class" => "mini",
						"type" => "text");
						
	$options[] = array( "name" => "Enable RSS",
						"desc" => "Enable the the RSS icon.",
						"id" => "rss",
						"std" => "Enabled",
						"type" =>"checkbox");


return $options;}?>