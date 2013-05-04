<div class="post">
					<?php if(have_posts()) : ?>
					<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
					<?php while(have_posts()) : the_post(); ?>
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

						<article class="entry">

							<?php if( !is_page() && !is_single() ) { ?>
							
								<fieldset><legend>
									
									<?php if (is_home()) { ?>
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>">
											<?php the_title(); ?>
										</a>
									<?php } else { ?>
										
										<?php the_title(); ?>

									<?php } ?>

								</legend></fieldset>

							<?php } else { } ?>

							<?php if ( !is_page() ) { ?>
							<div class="time">
								
								Posted <?php the_time('F jS, Y') ?>
		
							</div>
							<?php } else {

							} ?>

							<?php the_content();?>

							<?php if (!is_home() && current_user_can('edit_posts')) {?>
							<div class="separate"></div>
							<?php
								edit_post_link('edit');

							}?>

							<div class="clear"></div>

						</article>

					</div>

			<?php endwhile; ?>
			<?php else: ?>
				<?php if (!is_search()) { ?>

					<div class="post-content">

						<article class="entry">
		
							<p>Sorry, there are no posts to display.</p>
						</article>
				
					</div>

				<?php } else { ?>

						<div class="post-content">
							
							<article class="entry">
								
								Sorry, there are no search results for <strong><?php the_search_query(); ?></strong>.<br />
								
								<strong>You could try one of the following:</strong>
								
								<ul>
									<li>Use less keywords.</li>
									<li>Check the spelling of keywords.</li>
									<li>Search via Google (type: site:www.titaniumrobotics.com "<strong><?php the_search_query(); ?></strong>", or just click on <a href="http://www.google.com/search?hl=en&safe=off&tbo=d&site=webhp&q=site%3Awww.titaniumrobotics.com+%22Replace+Me%22&oq=site%3Awww.titaniumrobotics.com+%22Replace+Me%22&gs_l=serp.3...7551.7551.0.7865.1.1.0.0.0.0.62.62.1.1.0.les%3B..0.0...1c.1.SrOllNyBKks">Google</a>)</li>
									<li>Try using different keywords.</li>
								</ul>

							<div class="clear"></div>
							
							</article>
						</div>

				<?php } ?>

				<?php endif; ?>

				<div class="clear"></div>

				<?php if (!is_page() && !is_single()) { ?>
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
					</div>
				<? } ?>
				
			</div>