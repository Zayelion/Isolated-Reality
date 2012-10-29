<?php

$elementtemplate = 'single_';?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie"<?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie"<?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie"<?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--><html  <?php language_attributes(); ?> ><!--<![endif]-->


        <?php
        // checks if the index has been modified by a template file. 
        $layout ='';
        global $elementtemplate;
        if (isset($elementtemplate)) {$layout = $elementtemplate;}
        // checks for demo mode
        if (of_get_option('demo',false ) == true){include "includes/demo.php";}
        // retrieves the header <head> tag.
        get_header();
        
        // Top halve of the page.?>
        
        
        <div id='navigationpadding'><!--  Navigation padding for the scrolling effect --></div>
        <div style='padding-top:100px'></div>
        <?php include "includes/navigation.php"; ?>

        <section class='slate <?php
         if (of_get_option('contentwidth',true)== true) {echo "contentwidthwide";
         }
         else {echo "contentwidththin";}
        ?>'>
                
                
                <div class='container' style='position:relative;'>
                        <div id='ajaxloader'><!-- Ajax loader image--></div>
                </div>
                
                <section id='container' >
                <?php //Everything within this section element 
                        
                       include "includes/the-loop.php";?>

                </section>
        </section><!-- end of slate -->
        <div id='artscreen'><!-- This is the art screen --></div>
<?php
        // loads scripts set to load in the footer.
        get_footer();
        wp_footer();
        ?>
         <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6. chromium.org/developers/how-tos/chrome-frame-getting-started -->
         <!--[if lt IE 7 ]>
                <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
                <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
        <![endif]-->
        <!-- WP REQUIRES <?php  posts_nav_link();  comment_form(); wp_link_pages(  ); ?>-->
        </body>
</html>


?>
