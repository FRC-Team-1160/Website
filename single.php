<?php get_header(); ?>
<div id="contents">
	<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="post"><div class="post-content">
					<?php
					if ( has_post_thumbnail() ) {
						echo '<div class="thumbnail"><div class="drop-shadow curved curved-hz-1"><div class="featured">';
						the_post_thumbnail();
						echo '</div></div></div>';
					}
					else {
							
					}
					?>
					<div class="entry">
					<div class="time">
						Posted <?php the_time('F jS, Y') ?>
					</div>
					<fieldset><legend>
						<?php the_title(); ?></legend></fieldset>
					<?php the_content();?>
					<?php edit_post_link('edit'); ?>
					<div class="clear"></div>
					<?php comments_template(); ?>
				</div></div></div>
			<?php endwhile; ?>
			<?php else: ?>
				<div class="post"><div class="post-content"><div class="entry">
					<p>Sorry, there are no posts to display.</p>
				</div></div></div>
		<?php endif; ?>
<?php get_footer(); ?>