<?php get_header(); ?>

<div class="contents">
	<div class="post">
	<div class="post-content">
		<article class="entry">
			<?php if (current_user_can(edit_posts) ) { ?>
			 <h2>Forum Topics</h2>
				<ul>
					<?php wp_list_categories(
						array('taxonomy' => 'topics',
					) ); ?>
				</ul>
			<?php } else { ?>
				<div class="entry">
					<fieldset style="text-align:center;"><legend style="padding:0 1em;">You must log in as a user with sufficient privileges in order to view this page.</legend></fieldset>
					<p>
						<div class="center">
						<?php wp_login_form( $args ); ?>
						</div>
					</p>

					<div class="clear"></div>
				</div>

			<?php } ?>
		</article>
</div>
</div>
<?php get_footer(); ?>