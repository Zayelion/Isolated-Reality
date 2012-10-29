<?php 

// changes a class bassed on template/settings, to remove the sidebar?>
			<div id='content'  class='
			<?php
				if ( of_get_option( $layout.'layout', '2col' ) == '1col'
				or of_get_option( $layout.'layout', '2col' ) == '1col_footer'){
				echo "sidebardisabled";	}
				else {echo"2col";}
				if (of_get_option('contentwidth',true)== false) {echo " contentwidthwidth ";}
         		else {echo " contentwidththin ";}?>?> container '>
				
				

				<?php
				// renders the sidebar if it is enabled.
					if (of_get_option( $layout.'layout', '' ) == '2col'	or of_get_option( $layout.'layout', '' ) == '2col_footer'){
						echo"<div id='main-sidebar'class='sidebar'>	";
						if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar')) : else : endif;
					}
					// for style reasons an element is still needed to be placed, in this case an empty one.
					else {echo "<div>";}
					echo "</div>";
				?>
				<div class='right-column '><div><!-- --></div> 
				<?php 
					/* This is The Loop */
					
					
					
					
				 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
					<div class='post-metadata'>
							By <?php the_author();?>
							on <?php  echo get_the_date();?>
							 <?php comments_number('', ' 1 Comment ', ' % Comments ');?>
							  <?php the_category(', ');?>
							 
							<?php the_tags(' Tags: ', ' / ');?>
						</div>
						<h2 class='heading'><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						
							<div class='entry'>
								<?php the_content();?>
							</div><!-- end entry -->
							<!--<?php trackback_rdf(); ?>-->
							<?php comments_template(); ?>
							
					</article>
				<?php   endwhile;?>
				<?php kriesi_pagination($additional_loop->max_num_pages); ?>
				<?php else :?>
				
				<p>'Sorry, no posts matched your criteria.</p>
				<?php endif; 
				
				
				
					
					/* End of The Loop */?>
					
					
					<?php
						// renders bottom widget if enabled.
						if (of_get_option( $layout.'layout', '' ) == '1col_footer'	or of_get_option( $layout.'layout', '' ) == '2col_footer'){
						echo"<div class='sidebar'>";
						if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer')) : else : endif;
						echo "</div>";}
						else { echo "<div></div>";}?>

					</div>
					
				</div>			
 				