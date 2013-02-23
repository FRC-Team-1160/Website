<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<div id="comments">
<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
 
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>
<!-- You can start editing here. -->
 
<?php if ( have_comments() ) : ?>
	<fieldset id="comments"><legend><?php comments_number('No Replies', 'One Reply', '% Replies' );?></legend></fieldset>
 
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=advanced_comment');
                ?>
	</ol>
	<div class="clear"></div>
<div class="navigation">
<?php
//Create pagination links for the comments on the current post, with single arrow heads for previous/next
paginate_comments_links( array('prev_text' => '&larr;', 'next_text' => '&rarr;'));
?>
</div>
 <?php else : // this is displayed if there are no comments so far ?>
 
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>
 
	<?php endif; ?>
<?php endif; ?>
<fieldset><legend><span class="fs1" aria-hidden="true" data-icon="&#xe014;"></span><?php comment_form_title( 'Leave a Reply!', 'Leave a Reply to %s!' ); ?></legend></fieldset>
<div id="cancel-comment-reply">
    <small><?php cancel_comment_reply_link('CANCEL REPLY') ?></small></div>
<div id="respond">
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a></p>
<?php else : ?>
<p>
<label for="author">Name <?php if ($req) echo '<span class="required"><sup>*</sup></span>'; ?></label>
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" required="required" placeholder="Bilbo Baggins" />
</p>
<p>
<label for="email">Email (will not be published)
<?php if ($req) echo '<span class="required"><sup>*</sup></span>'; ?></label>
<input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" placeholder="immahobbit@example.com" tabindex="2" required="required" />
</p>
<p>
<label for="url">Website</label>
<input type="url" name="url" id="url" value="<?php echo $comment_author_url; ?>" placeholder="http://www.titaniumrobotics.com/" tabindex="3" />
</p>
<?php endif; ?>
<p>
<label for="comment">Comment</label>
<textarea name="comment" id="comment" rows="10" tabindex="4" placeholder="Hi, I rly lyked dis and I ttly agree. . ." required="required" ></textarea>
</p>
<p>
<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>
</form>
</div>
</div>
 