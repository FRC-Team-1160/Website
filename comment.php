<?php
/*
Template Name: With Comments
*/
?>
<?php get_header(); ?>
<div id="contents">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post"><div class="post-content"><div class="entry">
				<fieldset>
					<legend>
						<?php the_title(); ?>
					</legend>
				</fieldset>
				<?php the_content();?>
				<?php edit_post_link('edit'); ?>
				<?php comments_template(); ?>
			</div></div></div>
		<?php endwhile; ?>
	<?php else: ?>
		<div class="post"><div class="post-content"><div class="entry">
			<p>Sorry, there are no posts to display.</p>
		</div></div></div>
	<?php endif; ?>
<?php get_footer(); ?>