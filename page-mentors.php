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

						<div class="entry profile" id="<?php global $post; $post_slug=$post->post_name; echo $post_slug; ?>">

							<div class="everything">
								<div class="text">
									<div class="descriptions">
									<div class="featured">
										<a href="#<?php global $post; $post_slug=$post->post_name; echo $post_slug; ?>" rel="link" title="<?php the_title()?>">
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
										<h4>
												<?php the_title(); ?>
										</h4>
										<?php the_content();?>
										<div class="clear"></div>
									</div>
								</div>
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