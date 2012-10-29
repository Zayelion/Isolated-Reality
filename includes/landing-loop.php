<div id='content'  class='container subcontainer <?php
         if (of_get_option('contentwidth',true)== false) {echo "contentwidthwidth";
         }
         else {echo "contentwidththin";}?>'>

<?php
	//Not the lack of a header, this is done on purpose. Use of the [header] shortcode is expected
	//Not all page types really need a header this template is for that.
	 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
					<div class='post-metadata'>
							By <?php the_author();?>
							on <?php  echo get_the_date();?>
							 <?php comments_number('', ' 1 Comment ', ' % Comments ');?>
							 Categories: <?php the_category(', ');?>
							 
							<?php the_tags(' Tags: ', ' / ');?>
						</div>
						<div class='entry'>
						
							<?php the_content();?>
						</div><!-- end entry -->
					</article>
<?php   endwhile; else : endif; ?>
	
</div>
						
