<?php
/*
Template Name: List All Subpages sidebar
*/
?>
<?php get_header();?>
		<div class="contents">

				<div class="side">
					<div class="entry">
						<div class="cont left">
							<fieldset><legend>Topics</legend></fieldset>
							<?php
								$children = wp_list_pages(
									"title_li=&child_of=".$post->ID."&echo=0"
								);
							
							if ($children) { 
								$parent_title = get_the_title($post->post_parent);
							?>
								<ul>
									<?php echo $children; ?>
								</ul>
							<?php }?>
						</div>
					</div>
				</div>

	<?php require('loop.php');
	get_required_files(); ?>

<?php get_footer(); ?>