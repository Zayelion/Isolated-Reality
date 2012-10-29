<?php



include "includes/googlefonts.php";

// External Scripts and CSS files to be called in header.php later 
function wp_scriptloader(){
	
	/* wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"), false, '1.7.1', false); */
	
	wp_register_script('modernizr', get_template_directory_uri() .'/js/modernizr.js','','1',false);
	wp_register_script('retina', get_template_directory_uri() .'/js/retina.js','','1',false);
	wp_register_script('hyphenator', get_template_directory_uri() .'/js/hyphenator.js','','1',false);
	wp_register_script('prettify', get_template_directory_uri() .'/js/prettify.js','','1',false);
	wp_register_style( 'style', get_template_directory_uri() .'/style.css');
	
	
	if (of_get_option('ajax',true) == true ){wp_register_script('irajax', get_template_directory_uri() .'/js/plugins.js', array('jquery'),'1',true);}
	else {wp_register_script('irajax', get_template_directory_uri() .'/js/404.js', array('jquery'),'1',true);}
	
	
	
	wp_enqueue_style('style');
	
	wp_enqueue_script('modernizr');
	wp_enqueue_script('jquery');
	wp_enqueue_script('irajax');
	wp_enqueue_script('retina');
	wp_enqueue_script('hyphenator');
	wp_enqueue_script('prettify');
	
	
	
}

// Call exportable shortcodes  Copy and paste this code and the file to use the shortcodes.
include "shortcodes/shortcodes.php";
add_action('wp_head','irsc_function'); 
add_action('wp_footer','lightbox_activation_function');

// Creating Widgets
register_sidebar(array('name' => 'Article Footer','id'   => 'footer','description'   => 'This is the widgetized header.','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget'  => '</div>','before_title'  => '<h4>','after_title'   => '</h4>'));
register_sidebar(array('name' => 'Sidebar','id'   => 'sidebar','description'   => 'This is the widgetized sidebar.','before_widget' => '<li id="%1$s" class="widget %2$s">','after_widget'  => '</li>','before_title'  => '<h4>','after_title'   => '</h4>'));

// CSS fix for Main Navigation when user is logged in to bring it down from under the AdminBar
{add_action('wp_head', 'fix_subnav');  }

// Add additional theme support configurations
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
if (function_exists('register_sidebar')) {	add_action('get_header', 'enable_threaded_comments');}
if ( ! isset( $content_width ) ) $content_width = 900;



// enable threaded comments
function enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
		}
}

// HTML for comments called from comments.php
function format_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		?>
           <li class='comment'>
				<article id='comment-<?php  comment_ID(); ?> '>
					<div class='text'>
						<strong><?php  comment_author_link(); ?></strong>
						<span>on <?php  comment_date( 'F j, Y @ g:ia', $comment_ID ); ?>: </span>
						<div class='commentpost'><?php  comment_text( $comment_ID ); ?></div>
					</div>
					<?php  echo get_avatar( $id_or_email, $size, $default, $alt ); ?>  
					<div class='replybutton'>
						<?php  comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					<div>
				</article>
		   <?php  // </li> or go onto nested <ul> ?>
   <?php 
}

// Kriesi's Pagination: Special Thanks	
function kriesi_pagination($pages = '', $range = 2){
		$showitems = ($range * 2)+1;
		global $paged;
		
		if(empty($paged)) $paged = 1;
		
		if($pages == '')     {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			
			if(!$pages)         {
				$pages = 1;
			}

		}

		
		if(1 != $pages)     {
			echo "<div class='pagination'>";
			
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
			
			if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
			for ($i=1; $i <= $pages; $i++)         {
				
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))             {
					echo ($paged == $i)? "<span class='current'>".$i."</span>":
					"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
				}

			}

			
			if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
			
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
			echo "</div>\n";
		}

	}
	
//* Loads the Options Panel: Special Thanks Devin Price
if ( !function_exists( 'optionsframework_init' ) ) {
	/* Set the file path based on whether we're in a child theme or parent theme */	
	if ( STYLESHEETPATH == TEMPLATEPATH ) {
		define('OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri()  . '/admin/');
	} else {
		define('OPTIONS_FRAMEWORK_URL', STYLESHEETPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri()  . '/admin/');
	}
	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
}
// Explodes hexidecimal color values from option framework and returns them as an array in RGB, to be used as rgba color values in css.
// giving a constant feel to the the theme's colors. 
function html2rgb($color){
		
		if ($color[0] == '#')        $color = substr($color, 1);
		
		if (strlen($color) == 6)        list($r, $g, $b) = array($color[0].$color[1],                                 $color[2].$color[3],                                 $color[4].$color[5]);
		elseif (strlen($color) == 3)        list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]); else        return false;
		$r = hexdec($r);
		$g = hexdec($g);
		$b = hexdec($b);
		return array($r, $g, $b);
  		}
function fix_subnav() {
	if (of_get_option('fixheader',true)== true && is_user_logged_in() == true ){
		echo "
			<style>
			#subnav{ padding-top:28px;}
			#navigationpadding {height:77px;}
			</style>";}
	elseif (of_get_option('fixheader',true)== true && is_user_logged_in() == false){
		echo "			
			<style>
			#navigationpadding {height:49px}
			</style>";}
	elseif (of_get_option('fixheader',true)== false && is_user_logged_in() == true){
		echo "
			<style>
			#navigationpadding {height:28px}
			</style>";
	}
} 
// Start of Presstrends Magic
function presstrends() {

// PressTrends Account API Key
$api_key = '43mpmcoi9a39j9jp88xeub22hni0uecewa8x';

// Start of Metrics
global $wpdb;
$data = get_transient( 'presstrends_data' );
if (!$data || $data == ''){
$api_base = 'http://api.presstrends.io/index.php/api/sites/update/api/';
$url = $api_base . $api_key . '/';
$data = array();
$count_posts = wp_count_posts();
$count_pages = wp_count_posts('page');
$comments_count = wp_count_comments();
$theme_data = get_theme_data(get_stylesheet_directory() . '/style.css');
$plugin_count = count(get_option('active_plugins'));
$all_plugins = get_plugins();
foreach($all_plugins as $plugin_file => $plugin_data) {
$plugin_name .= $plugin_data['Name'];
$plugin_name .= '&';}
$posts_with_comments = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}posts WHERE post_type='post' AND comment_count > 0");
$comments_to_posts = number_format(($posts_with_comments / $count_posts->publish) * 100, 0, '.', '');
$pingback_result = $wpdb->get_var('SELECT COUNT(comment_ID) FROM '.$wpdb->comments.' WHERE comment_type = "pingback"');
$data['url'] = stripslashes(str_replace(array('http://', '/', ':' ), '', site_url()));
$data['posts'] = $count_posts->publish;
$data['pages'] = $count_pages->publish;
$data['comments'] = $comments_count->total_comments;
$data['approved'] = $comments_count->approved;
$data['spam'] = $comments_count->spam;
$data['pingbacks'] = $pingback_result;
$data['post_conversion'] = $comments_to_posts;
$data['theme_version'] = $theme_data['Version'];
$data['theme_name'] = $theme_data['Name'];
$data['site_name'] = str_replace( ' ', '', get_bloginfo( 'name' ));
$data['plugins'] = $plugin_count;
$data['plugin'] = urlencode($plugin_name);
$data['wpversion'] = get_bloginfo('version');
foreach ( $data as $k => $v ) {
$url .= $k . '/' . $v . '/';}
$response = wp_remote_get( $url );
set_transient('presstrends_data', $data, 60*60*24);}
}

// PressTrends WordPress Action
add_action('admin_init', 'presstrends');


// End of functions.php



?>