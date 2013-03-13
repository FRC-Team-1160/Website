<?php get_header(); ?>
<?php if ( is_user_logged_in() ) { ?>

<div id="contents">
	<div class="post"><div class="post-content"><div class="entry">
		<fieldset><legend>Team 1160's Website Users</legend></fieldset>
		<div id="authorlist"><ul><?php contributors(); ?></ul></div>
	</div></div></div>
</div>

<?php } else{ ?>

<div id="contents">
	<div class="post"><div class="post-content"><div class="entry">
		Please log in to view this page.
	</div></div></div>
</div>

<?php }?>

<?php get_footer(); ?>