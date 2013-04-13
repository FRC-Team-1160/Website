<?php get_header(); ?>
<div id="contents">
	<?php
	if (have_posts()) : 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	while (have_posts()) : the_post();
	?>
	<div class="post">
		<div class="post-content">
		
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

				<fieldset><legend>
				
					<?php the_title(); ?>

				</legend></fieldset>

				<?php the_content();?>

				<?php edit_post_link('edit'); ?>

				<div class="clear"></div>

			<?php endwhile; ?>
			<?php else: ?>

				<p>Sorry, there are no posts to display.</p>

			<div class="clear"></div>

			<?php endif; ?>

			</div>
	
			<div class="clear"></div>

		</div>
	</div>
<?php get_footer(); ?>