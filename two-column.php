<?php
/*
Template Name: Two Columns
*/
?>
<?php get_header(); ?>
<div id="contents" class="sidebar">
	<?php
		if (have_posts()) : 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		while (have_posts()) : the_post();
	?>
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

		<div class="sidebar-left">
			<div class="sidebar-content">
				<?php if(!empty($post->post_excerpt)) {

					//This post has an excerpt, let's display it

					echo '<div class="border-right"><fieldset><legend>About ';
					the_title();
					echo '</fieldset></legend>';
					the_excerpt();
					echo '</div>';

		 		} else {

					// This post has no excerpt

		 		} ?>
			</div>
		</div>
		<div class="rightcontent">
			<div class="entry">

				<fieldset><legend><?php the_title(); ?></legend></fieldset>

				<?php the_content();?>

				<?php edit_post_link('edit'); ?>

				<div class="clear"></div>

				<?php endwhile; else: ?>

					<p>Sorry, there are no posts to display.</p>
						
						<div class="clear"></div>
				<?php endif; ?>
			</div>
		</div>
		
		<div class="clear"></div>

	</div></div>

<?php get_footer(); ?>