<?php get_header(); ?>

<div id="contents">
	<div class="post">
	<div class="post-content">
	<?php if (current_user_can(edit_posts) ) { ?>
	 <!-- (2) Placeholder for the forum. The forum will be rendered inside this element -->
      <a class="moot" href="http://api.moot.it/titaniumrobotics"></a>
	<?php } else { ?>
		<div class="entry">
			<fieldset style="text-align:center;"><legend style="padding:0 1em;">You must log in as a user with sufficient privileges in order to view this page.</legend></fieldset>
			<p id="login" style="text-align:center;">
				<span style="font-family:'icons'; font-size:5em; color:#0054A3;">&#xe00e;</span>
				<div class="center">
				<?php wp_login_form( $args ); ?>
				</div>
			</p>

			<div class="clear"></div>
		</div>

	<?php } ?>
</div>
</div>
<?php get_footer(); ?>