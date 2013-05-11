<?php
/*
Template Name: Blank
*/
?>
<!DOCTYPE html>
<html>
<body>
	<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php the_content();?>
<div class="clear"></div>
<?php endwhile; endif ?>
</body>
</html>