<?php get_header(); ?>

<div id="contents"><div class="blog">
	<?php if (current_user_can(edit_posts) ) { ?>
		<?php if(have_posts()) : ?>
     <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          query_posts("post_type=forum_post&paged=$paged"); ?>
        <?php while(have_posts()) : the_post(); ?>
			<div class="post"><div class="post-content">
					<?php
					if ( has_post_thumbnail() ) {
						echo '<div class="thumbnail">';
						the_post_thumbnail();
						echo '</div><div class="shadow"></div>';
					}
					else {
							
					}
					?>
				<div class="entry">
					<div class="time">
						Posted <?php the_time('F jS, Y') ?> by <a href="/author/<?php the_author() ?>"><?php the_author(); ?></a>
					</div>
					<fieldset><legend>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>">
						<?php the_title(); ?>
						</a>
					</legend></fieldset>

					<?php the_content();?>

					<div class="commentlabel"><?php comments_number( 'No Replies', '1 Reply', '% Replies' ); ?> / <a href="<?php comments_link(); ?>">Add a Reply</a>
					</div>
					<div class="clear"></div>
				</div>
			</div></div>

        <?php endwhile; ?>
        <?php endif; ?>
	<div class="navigation"><?php 
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

	<?php } else { ?>
		<div class="post"><div class="post-content"><div class="entry">
			<fieldset style="text-align:center;"><legend>You must log in as a user with sufficient privileges in order to view this page.</legend></fieldset>
			<p id="login">
				<div class="center">
				<?php wp_login_form( $args ); ?>
				</div>
			</p>

			<div class="clear"></div>
		</div></div></div>

<?php } ?>
</div>
<?php get_footer(); ?>