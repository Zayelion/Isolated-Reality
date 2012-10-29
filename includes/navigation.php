                <nav id='subnav' style='z-index:400 !important; <?php
                 if (of_get_option('fixheader', true ) == true) {echo "position:fixed";} 
                 else {}
                 ?>' >
				<div class='trim'>
				<div class="container subcontainer">
					<nav style='float:left;'>
					<?php wp_nav_menu( array( 'sort_column' => 'menu_order','container' => false) ); ?>
					</nav>
					<form method="get" id="searchform" action=" <?php echo home_url();?>/" class='pull-right'>
					
						<div class='pull-right searchdimentions'>
							<input type="text" size="25" name="s" id="s" value="Search" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
						</div>
						
						<nav class='social'>
						<?php
						 if  (of_get_option( 'facebook', '') != false){
							echo "
								<a href='https://www.facebook.com/profile.php?id=".of_get_option( 'facebook', '')."'>
								<img src='".get_template_directory_uri()."/images/facebook-variation.png' alt='facebook'  /></a>";
						}
						 if  (of_get_option( 'twitter', '') != false){
							echo "
								<a href='https://www.twitter.com/".of_get_option( 'twitter', '')."'>
								<img src='".get_template_directory_uri()."/images/twitter-variation.png' alt='twitter'  /></a>";
						}
						if  (of_get_option( 'gplus', '') != false){
							echo "
								<a href='https://plus.google.com/".of_get_option( 'gplus', '')."'>
								<img src='".get_template_directory_uri()."/images/gplus-variation.png' alt='google plus'  /></a>";
						}
						if  (of_get_option( 'linkedin', '') != false){
							echo "
								<a href='http://www.linkedin.com/profile/view?id=".of_get_option( 'linkedin', '')."'>
								<img src='".get_template_directory_uri()."/images/linkedin-variation.png' alt='facebook'  /></a>";
						}
						if  (of_get_option( 'dribbble', '') != false){
							echo "
								<a href='https://www.dribbble.com/".of_get_option( 'dribbble', '')."'>
								<img src='".get_template_directory_uri()."/images/dribbble-variation.png' alt='facebook'  /></a>";
						}
						if  (of_get_option( 'rss', '') != false){
							echo "
								<a href='/feed/'>
								<img src='".get_template_directory_uri()."/images/rss-variation.png' alt='feed'  /></a>";
						}?>
					</nav>
				</form>
				</div>
				</div>
				</nav>