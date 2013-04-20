<?php get_header(); ?>
	<div id="contents">
		<div class="blog">
			<div class="blog-content">
					<?php require ('loop.php') ?>
					<?php get_required_files() ?>
	            <div id="widget-4">
	                <?php 
	                if (function_exists('dynamic_sidebar') && dynamic_sidebar('home_sidebar')) : 
	                else : 
	                ?>
	                <?php endif; ?>
	            </div>
			</div>
	</div>
<?php get_footer(); ?>