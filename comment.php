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
				<?php the_content();?>
				<?php comments_template(); ?>

				
				<?php edit_post_link('edit'); ?>
			</div></div></div>
		<?php endwhile; ?>
	<?php else: ?>
		<div class="post"><div class="post-content"><div class="entry">
			<p>Sorry, there are no posts to display.</p>
		</div></div></div>
	<?php endif; ?>
<?php get_footer(); ?>