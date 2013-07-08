<?php
/*
Template Name: Press & Media
*/
?>
<?php get_header();?>
		<div id="contents">
			<div class="press">

				<div class="side">
					<?php 
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar_left')) : 
					else : 
					?>
					<?php endif; ?>
				</div>
				<div class="onlytablet separate"></div>
				<div class="press-content">
					<div class="post-content">
						<div class="entry">
							<h2>Press Releases</h2>
						</div>
					</div>

<?php 
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('showposts=5&post_type=press'.'&paged='.$paged); 

  while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>

					<div class="post"><div class="post-content">
						<?php // FEATURED IMAGE ?>
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

						<div class="entry">
								
									<h4>

											<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>">
												<?php the_title(); ?>
											</a>

									</h4>

								<p>
									
									<?php the_time('j F Y') ?>
			
								</p>
								<?php the_excerpt();?>
								<div class="clear"></div>
						</div>

								<div class="clear"></div>
					</div></div>
				<?php endwhile; ?>

					<div class="clear"></div>
						<div class="navigation">
							<?php 
							global $wp_rewrite;			
							$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

							$pagination = array(
								'base' => @add_query_arg('page','%#%'),
								'format' => '',
								'total' => $wp_query->max_num_pages,
								'current' => $current,
								'show_all' => false,
								'type' => 'plain',
								'prev_text' => __('&larr;'),
								'next_text' => __('&rarr;'),
								);

							if( $wp_rewrite->using_permalinks() )
								$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');

							if( !empty($wp_query->query_vars['s']) )
								$pagination['add_args'] = array('s'=>get_query_var('s'));

							echo '<div class="pagination">' . paginate_links($pagination) . '</div>'; 		
							?>
							<div class="clear"></div>
						</div>

					<div class="clear"></div>
					<?php 
					  $wp_query = null; 
					  $wp_query = $temp;  // Reset
					?>
				</div>

				<div class="side">
					<?php 
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar_right')) : 
					else : 
					?>
					<?php endif; ?>
				</div>

			</div>

<?php get_footer(); ?>