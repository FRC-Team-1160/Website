<?php get_header(); ?>
	<div id="contents">
		<div class="blog">
			<div class="blog-content">
					<?php require ('loop.php') ?>
					<?php get_required_files() ?>

				<div class="side">
					<?php 
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar_right')) : 
					else : 
					?>
					<?php endif; ?>
				</div>

			</div>
	</div>
<?php get_footer(); ?>