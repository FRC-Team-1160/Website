<?php get_header(); ?>
	<div id="contents"><div class="blog">
		<?php if(have_posts()) : ?>
     <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
        <?php while(have_posts()) : the_post(); ?>

	<div class="post"><div class="post-content">
					<?php
					if ( has_post_thumbnail() ) {
						echo '<div class="thumbnail"><div class="drop-shadow curved curved-hz-1"><div class="featured">';
						the_post_thumbnail();
						echo '</div></div></div>';
					}
					else {
							
					}
					?><div class="entry">
	<div class="time">
	Posted <?php the_time('F jS, Y') ?>
	</div>
	<fieldset><legend>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>">
	<?php the_title(); ?></a></legend></fieldset>
	<?php the_content();?>
	<div class="clear"></div>
	<div class="commentlabel"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></div>
	<div class="clear"></div>
	</div>
	</div></div>
	<?php endwhile; ?>
	<?php else: ?>
	<div class="post"><div class="post-content"><div class="entry">
	<p>Sorry, there are no posts to display.</p>
	</div>
	</div></div>
	<?php endif; ?>
	<div class="clear"></div>
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
</div>
            <div id="widget-4">
                <?php 
                if (function_exists('dynamic_sidebar') && dynamic_sidebar('home_sidebar')) : 
                else : 
                ?>
                <?php endif; ?>
            </div>
<?php get_footer(); ?>