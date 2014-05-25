<?php get_header();?>
		<div class="contents">
			<?php 
			  $temp = $wp_query; 
			  $wp_query = null; 
			  $wp_query = new WP_Query(); 
			  $wp_query->query('showposts=999&post_type=mentors'.'&paged='.$paged); 

			  while ($wp_query->have_posts()) : $wp_query->the_post(); 
			?>

						<div class="entry-1-2 profile" id="<?php global $post; $post_slug=$post->post_name; echo $post_slug; ?>">
								<div class="text">
									<div class="pic screen">
										<a href="#<?php global $post; $post_slug=$post->post_name; echo $post_slug; ?>" rel="link" title="<?php the_title()?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
										<h4>
												<?php the_title(); ?>
										</h4>
										<?php the_content();?>
										<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
				<?php endwhile; ?>

					<div class="clear"></div>
					<?php 
					  $wp_query = null; 
					  $wp_query = $temp;  // Reset
					?>
<?php get_footer(); ?>