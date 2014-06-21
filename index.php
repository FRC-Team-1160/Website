<?php get_header(); if (!is_category()): ?>
	<div class="contents" class="sidebar">
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
<?php endif; get_footer(); ?>