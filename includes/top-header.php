<?php
	//checks if a logo has been set, else uses the site name and description to make a simple one.
		if (of_get_option('logo','') != "") {
			echo "
				<header>
					<div class='container'><div>
						<a href='".get_site_url()."'><img alt='logo' id='logo' src='"
						.of_get_option('logo','')."' /> 
						</a></div>
					</div>
				</header>
			";
		}
		else {
			echo "
				<header>
					<div class='trim replacementlogo centered' style='width:765px;'><a href='".get_site_url()."'>
						<h1 class='centered heading'>".get_bloginfo('name')."</h1> 
						<h2 class='centered'>".get_bloginfo('description')."</h2>
					</a></div>
				</header>
			";
		}
?>