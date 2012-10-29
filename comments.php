<br />
<div id="commentsection">
<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php return; }?>

<!--IF THERE ARE COMMENTS-->
<?php if ( have_comments() ) : ?>
	<?php $args = array(
	'callback'          => 'format_comment',
	); ?>
	
	<h3 id="comments">Comments</h3>

	<ol class="commentlist">
	<?php wp_list_comments($args); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
<?php endif; ?>
</div>