<?php get_header();?>
		<div class="contents">
			<?php 
			  $temp = $wp_query; 
			  $wp_query = null; 
			  $wp_query = new WP_Query(); 
			  $wp_query->query('showposts=5&post_type=videos'.'&paged='.$paged); 

			  while ($wp_query->have_posts()) : $wp_query->the_post(); 
			?>
						<div class="entry-1-3">
							<a href="<?php the_permalink() ?>" rel="link" title="Link to <?php the_title(); ?>">
								<h3>
										<?php the_title(); ?>
								</h3>
							</a>
								<?php the_excerpt();?>
								<div class="clear"></div>
						</div>
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

<?php get_footer(); ?>