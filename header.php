	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
		<meta name="description" content="
			<?php if ( is_single() ) {
				single_post_title('', true);} 
				else {bloginfo('name'); echo " - "; bloginfo('description');} ?>" />
		
<?php 	//	Mobile browser scrolling tends to really distort things so I turned it off. ?>
		<meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=3.0; user-scalable=1;' />
		<meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=3.0; user-scalable=true;' />
		<meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=3.0; user-scalable=yes;' />
		 
<?php	//	prefeching for off-server scripts	?>
		<link rel="dns-prefetch" href="//ajax.googleapis.com">
		<link rel="dns-prefetch" href="//fonts.googleapis.com">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" type="image/png" href="<?php echo of_get_option('favicon','')?>/">

<?php	//  enqueues scripts as defined in fuctions.php
		wp_scriptloader();
		
		// calls scripts enque'd with add_action(wp_head)
		wp_head();
		include "includes/style.php";?>

		
	</head>
	<body id='home' <?php body_class( $class ); ?>>