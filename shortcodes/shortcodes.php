<?php

/*This is the CSS to be added to the head tag. It is not an external file to cut down on http request,and make exportablity of the shortcodes simpler*/
function irsc_function()
{
	echo "	<style>	.clear {clear:both;}
.column {padding-right:15px; float:left; padding-bottom:15px; text-align:justify;}
.column br {display:none; height:0; width:0;}
.col1 {width:100%;}
.col2 {width:50%;}
.col3 {width:33.333%;}
.col4 {width:25%;}
.col75 {width:75%;}
.col23 {width:66.666%;}
.ir-highlight {background:yellow;}
.alert {border:1px solid; padding:20px; }
.top-quote{clear:both;color:#888;float:left;font-size:1.5em;font-style:italic;font-weight:400;line-height:1.2em;text-align:center;width:100%;}
.top-quote span{display:block;font-size:12px;padding-right:2px;text-align:right;width:100%;}
.center {margin:0 auto; text-align:center;}	.headertext {font-size:1.4em;}
.ir-border {overflow:auto; padding: 25px; border:1px solid #ccc;}
.ir-border br {display:none; height:0; width:0;}
.pricepoint {border:3px solid #ccc ; text-align:center; font-size:12px;}
.pricepoint div {padding:10px; width:auto;}	.pricepoint br {display:block;}
.pricepoint button {display:inline; margin:0 auto; font-size:1em; padding:5px 25px; background:#f0f0f0; border:1px solid #ccc; }
.pricepointheader {font-size:1.6em; border-bottom:1px solid #ccc;}
</style>	";
	return false;
}

/* Enqueue the information for the Lightbox */
/* Function that is called later in the footer */
function lightbox_activation_function()
{
	wp_register_script('livequery', get_template_directory_uri() .'/shortcodes/js/jquery.livequery.js', array('jquery'),'',true);
	wp_register_script('lightboxjs', get_template_directory_uri() .'/shortcodes/js/slimbox2.js', array('jquery','livequery'),'',true);
	wp_register_style('lightboxcss', get_template_directory_uri() .'/shortcodes/css/slimbox2.css' );
	wp_enqueue_script('livequery');
	wp_enqueue_script('lightboxjs');
	wp_enqueue_script('lightboxjswheel');
	wp_enqueue_style('lightboxcss');
}


/* The functions that process the shortcodes */

function highlight_function($attr, $content=null)
{
	extract(shortcode_atts(array('color' =>'yellow'	),$atts));
	return "<span style='background-color:{$color};'>". $content . "</span>";
}
function alert_function($attr, $content=null)
{
	extract(shortcode_atts(array('color' =>'red',	'border' =>'darkred'	),$atts));
	return "<span class='alert' style='
background-color:{$color};
border:1px solid{$border};
border-radius:5px;
'>".  do_shortcode($content) . "</span>";
}
function border_function($attr, $content=null)
{
	extract(shortcode_atts(array('color' =>'#cccccc',
	'width' =>'1px',
	'style'=>'solid'	),$atts));
	return "<div class='ir-border' style='		border:{$color} {$width} {$style};'>".  do_shortcode($content) ."</div>";
}
function bigquote_func($attr, $content=null) {
	return "<span class='top-quote ir-border'>".  do_shortcode($content) . "</span>";
}
function col_1_function($atts, $content=null)
{
	return "<div class='column col1'>". do_shortcode($content) ."</div>";
}
function col_2_function($atts, $content=null)
{
	return "<div class='column col2'>". do_shortcode($content) ."</div>";
}
function col_3_function($atts, $content=null)
{
	return "<div class='column col3'>". do_shortcode($content) ."</div>";
}
function col_4_function($atts, $content=null)
{
	return "<div class='column col4'>". do_shortcode($content) ."</div>";
}
function col_13_function($atts, $content=null)
{
	return "<div class='column col13'>". do_shortcode($content) ."</div>";
}
function col_23_function($atts, $content=null)
{
	return "<div class='column col23'>". do_shortcode($content) ."</div>";
}
function col_75_function($atts, $content=null)
{
	return "<div class='column col75'>". do_shortcode($content) ."</div>";
}
function clear_function()
{
	return "<div class='clear'></div>";
}
function author_function($atts, $content=null)
{
	return "<span>". do_shortcode($content) ."</span>";
}
function center_function($atts, $content=null)
{
	return "<div class='center'>". do_shortcode($content) ."</div>";
}
function lightbox_function($atts, $content=null)
{
	extract(shortcode_atts(array('href' => '',	'caption' => '',	'set' => '-'	),$atts));
	return "<a rel='lightbox{$set}' href='{$href}' title='{$caption}'>".  do_shortcode($content) ."</a>";
}
function vimeo_function($atts, $content=null)
{
	extract(shortcode_atts(array('id' => '',	'caption' => '',	'set' => ''	),$atts));
	if ($set != '') {
		$set = "-".$set;
	}
	return "<a rel='lightbox{$set}' href='http://vimeo.com/{$href}' title='{$caption}'>".  do_shortcode($content) ."</a>";
}
function youtube_function($atts, $content=null)
{
	extract(shortcode_atts(array('id' => '',	'caption' => '',	),$atts));
	return "<a rel='lightbox{$set}' href='http://www.youtube.com/watch?v={$href}' title='{$caption}'>".  do_shortcode($content) ."</a>";
}
function header_function($atts, $content=null)
{
	return "<div class='headertext'>". do_shortcode($content) ."</div>";
}
function pricepoint_function($atts, $content=null)
{
	extract(shortcode_atts(array('title' => '',	'buttontext' => '',	'buttonname' => '',	'buttonid' => '',	'action' => 'onclick',	'actionscript' => ''	),$atts));
	return "<div class='pricepoint'>	<div class='pricepointheader'>{$title}</div>	<div>".$content."</div>	<div><button name='{$buttonname}' {$action}='{$actionscript}' >{$buttontext}</button></div></div> ";
}
function code_function($atts,$content=null)
{
	return "<code>".$content."</code>";
}
/*adding all the shortcodes for use */add_shortcode('ir-border','border_function');
add_shortcode('ir-big-quote','bigquote_func');
add_shortcode('gallery_shortcode', 'my_gallery_shortcode_function');
add_shortcode('ir-highlight','highlight_function');
add_shortcode('ir-alert','alert_function');
add_shortcode('ir-col_single','col_1_function');
add_shortcode('ir-col_double','col_2_function');
add_shortcode('ir-col_third','col_3_function');
add_shortcode('ir-col_quarter','col_4_function');
add_shortcode('ir-col_one_third','col_3_function');
add_shortcode('ir-col_two_thirds','col_23_function');
add_shortcode('ir-col_three_quarter','col_75_function');
add_shortcode('ir-clear','clear_function');
add_shortcode('ir-center','center_function');
add_shortcode('ir-author','author_function');
add_shortcode('ir-youtube','youtube_function');
add_shortcode('ir-vimeo','vimeo_function');
add_shortcode('ir-lightbox','lightbox_function');
add_shortcode('ir-header','header_function');
add_shortcode('ir-pricepoint','pricepoint_function');
add_shortcode('code','code_function');
add_filter('the_content', 'addshadowboxrel', 12);
add_filter('get_comment_text', 'addshadowboxrel');
function addshadowboxrel ($content)
{   global $post;
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
	$replacement = '<a$1href=$2$3.$4$5 rel="shadowbox['.$post->ID.']"$6>$7</a>';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}
?>