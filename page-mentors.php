<?php get_header();?>
		<div id="contents">
			<div class="press">
			<?php 
			  $temp = $wp_query; 
			  $wp_query = null; 
			  $wp_query = new WP_Query(); 
			  $wp_query->query('showposts=999&post_type=mentors'.'&paged='.$paged); 

			  while ($wp_query->have_posts()) : $wp_query->the_post(); 
			?>

					<div class="post columned">
						<div class="post-content">
							<div class="entry">
<?php // FEATURED IMAGE ?>
								<a href="#<?php the_title_attribute(  ); ?>" rel="link" title="<?php the_title_attribute(  ); ?>">
									<?php if(has_post_thumbnail( $post_id )) {?>

											<?php
												$post_image_id = get_post_thumbnail_id($post_to_use->ID);
												if ($post_image_id) {
													$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
													if ($thumbnail) (string)$thumbnail = $thumbnail[0];
												}
												if (!empty($thumbnail)) {
											?>
														<div class="clip thumbnail" style="background-image: url('<?php echo $thumbnail; ?>')!important;">
														</div>

											<?php }

									} else { ?>
											<div class="clip no-thumbnail"></div>
									<?php } ?>
								</a>
							</div>

							<div class="clear"></div>
						</div>
					</div>
				<?php endwhile; ?>

					<div class="clear"></div>
					<?php 
					  $wp_query = null; 
					  $wp_query = $temp;  // Reset
					?>
				</div>
				<div class="clear"></div>
			<?php 
			  $temp = $wp_query; 
			  $wp_query = null; 
			  $wp_query = new WP_Query(); 
			  $wp_query->query('showposts=999&post_type=mentors'.'&paged='.$paged); 

			  while ($wp_query->have_posts()) : $wp_query->the_post(); 
			?>

						<div class="entry profile" id="<?php the_title_attribute(  ); ?>">

							<div class="everything">
								<div class="text">
									<?php if(has_post_thumbnail( $post_id )) {?>

											<?php
												$post_image_id = get_post_thumbnail_id($post_to_use->ID);
												if ($post_image_id) {
													$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
													if ($thumbnail) (string)$thumbnail = $thumbnail[0];
												}
												if (!empty($thumbnail)) {
											?>
													<div class="thumbnail">
														<div class="featured" style="background-image: url('<?php echo $thumbnail; ?>')!important;">
														</div>
													</div>

											<?php }

									} else { ?>
											<div class="no-thumbnail"></div>
									<?php } ?>
									<div class="descriptions">
										<h3>
												<?php the_title(); ?>
										</h3>
										<?php the_content();?>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>

					<div class="clear"></div>
				<?php endwhile; ?>

					<div class="clear"></div>
					<?php 
					  $wp_query = null; 
					  $wp_query = $temp;  // Reset
					?>
<?php get_footer(); ?>