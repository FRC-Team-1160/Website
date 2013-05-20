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

				<div class="press-content">
					<div class="post-content">
						<div class="entry">
							<h2>Press Releases</h2>
						</div>
					</div>
			<?php $loop = new WP_Query( array( 'post_type' => 'press', 'posts_per_page' => 10 ) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

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
								
									<h4>

											<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>">
												<?php the_title(); ?>
											</a>

									</h4>

								<p>
									
									<?php the_time('F jS, Y') ?>
			
								</p>
								<div class="clear"></div>
						</div>

								<?php if (current_user_can('edit_posts')) {?>
								<div class="separate"></div>
								<?php
									edit_post_link('edit');
								?>

								<?php }?>

								<div class="clear"></div>
					</div></div>

				<?php endwhile; ?>
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