<?php get_header(); ?>
<div id="contents">
<?php if( get_post_type() == 'teamforum' ) : ?>
		<?php if( current_user_can(edit_posts) ) : ?>
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
							<?php edit_post_link(); ?>
							<strong>Categories:</strong><ul>
<?php wp_list_categories('orderby=name'); ?> 
</ul>
							<div class="clear"></div>
							<?php comments_template(); ?>
						</div></div></div>
					<?php endwhile; ?>
					<?php else: ?>
						<div class="post"><div class="post-content"><div class="entry">
							<p>Sorry, there are no posts to display.</p>
						</div></div></div>
				<?php endif; ?>
		<?php else: ?>
				<div class="post"><div class="post-content"><div class="entry">
							<fieldset style="text-align:center;"><legend>You must log in as a user with sufficient privileges in order to view this page.</legend></fieldset>
							<p id="login">
								<div class="center">
								<?php wp_login_form( ); ?>
								</div>
							</p>
				
							<div class="clear"></div>
				</div></div></div>
		<?php endif; ?>
<?php else: ?>
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
					<div class="categories"><strong>Categories & Tags</strong><ul>
						<?php wp_list_categories('orderby=name'); ?> 
						</ul><?php
							if(get_the_tag_list()) {
								echo get_the_tag_list('<p><strong>Tags</strong><br /> ',', ','</p>');
							}
						?></div>
					<div class="clear"></div>
					<?php comments_template(); ?>
				</div></div></div>
			<?php endwhile; ?>
			<?php else: ?>
				<div class="post"><div class="post-content"><div class="entry">
					<p>Sorry, there are no posts to display.</p>
				</div></div></div>
		<?php endif; ?>	
<?php endif; ?>
<?php get_footer(); ?>