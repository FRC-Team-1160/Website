<div class="post">

		<?php if(have_posts()) :?>
		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
		<?php while(have_posts()) : the_post(); ?>

	<?php // FEATURED IMAGE
	if(is_home()) { //ignore any other page, because every other page has a big featured image
		if(has_post_thumbnail( $post_id )) {?>

				<?php
					$post_image_id = get_post_thumbnail_id($post_to_use->ID);
					if ($post_image_id) {
						$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
						if ($thumbnail) (string)$thumbnail = $thumbnail[0];
					}
					if (!empty($thumbnail)) {
				?>
						<div class="thumbnail">

							<span><!-- THIS IS THE TITLE, BUT IT LOOKS BETTER IF ITS JUST A BORDER
								<h1>
									<?php // the_title(); ?>
								</h1>-->
							</span>
							<div class="featured screen" style="background-image: url('<?php echo $thumbnail; ?>')!important;">
							</div>
						</div>

				<?php }

		} //if post thumbnail,
		else { ?>
				<div class="no-thumbnail"></div>
		<?php } //if there is a thumbnail, else

		}//is_home?>

<div class="post-content">

	<?php // SIDEBAR FOR TWO COLUMN & BOOKMARKS ?>

							<?php if (is_page_template('two-column.php', 'bookmarks.php') || is_single() || is_home()) { ?>
								<aside class="sidebar-left">
									<section class="sidebar-content">
										<div class="sidebarpad">

											<?php if(is_page_template('bookmarks.php')) : ?>

												<?php
												if (function_exists('dynamic_sidebar') && dynamic_sidebar('bookmarks')) :
												else :
												?>
												<?php endif; ?>

											<?php elseif(is_home()||is_single()||is_search()): ?>
												<div class="cont">
													<div class="information">
														<time class="time">
															<span class="year">
																<?php the_time('Y') ?>
															</span>
																<?php the_time('M j') ?>
														</time>
														<?php if(is_single()): ?>
														<h6>A Post by <?php the_author(); ?></h6>
															<h4>Categories</h4>
																<?php
																	$taxonomy = 'category';

																	// get the term IDs assigned to post.
																	$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
																	// separator between links
																	$separator = ', ';

																	if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

																		$term_ids = implode( ',' , $post_terms );
																		$terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
																		$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

																		// display post categories
																		echo  $terms;
																	}
																?>

																<?php if('forum' == get_post_type()) :
																	$taxonomy = 'topics';

																	// get the term IDs assigned to post.
																	$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
																	// separator between links
																	$separator = ', ';

																	if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

																		$term_ids = implode( ',' , $post_terms );
																		$terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
																		$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

																		// display post categories
																		echo  $terms;
																	}
																	endif;
																?>
															<h4>Tags</h4>
															<section class="tags">
																<?php the_tags( '', '&nbsp;', '' ); ?>					</section>
														<?php endif; ?>
													</div>
												</div>

											<?php endif; ?>

											<?php if(!empty($post->post_excerpt)) {

												//This post has an excerpt, let's display it
												the_excerpt();

									 		} else {

												// This post has no excerpt

									 		} ?>
								 		</div>
									</section>
								</aside>

								<article class="rightcontent">

							<?php } else { ?>

								<article class="<?php if (is_page_template('page-contact-us.php')) { ?>entry-3-4<?php } ?>">

							<?php } ?>
									<div class="entry">

	<?php // TITLE ?>

								<?php if( !is_page() && !is_single() ) { ?>

									<fieldset class="title"><legend>

										<?php if (is_home() || is_category() || is_tax()) { ?>
											<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>">
												<?php the_title(); ?>
											</a>
										<?php } else { ?>

											<?php the_title(); ?>

										<?php } ?>

									</legend></fieldset>

								<?php } else { } ?>
	<?php // THE_CONTENT ?>

<?php
/* FOR PAGES THAT ARE UNDER CONSTRUCTION */
				$custom_fields = get_post_custom();
				$construction = $custom_fields['construction'];
				if(!empty($construction)) {
						foreach ( $construction as $key => $value ) {
						if ($value == 'under construction') {
?>
							<div class="clear"></div>
							<div class="team1160-flash-outline"><span class="team1160-starburst-outline reverse"></span><span class="team1160-starburst-outline"></span></div>
							<h1 style="text-align:center; margin-top:1em; color:#444; font-weight:bold;">This page is currently under construction</h1>
							<div class="clear"></div>
<?php
						}}} else {
?><?php if (is_single()) { echo '<h2>'; the_title(); echo '</h2>'; } ?>

								<?php the_content();?>

							<?php if (is_single()) : ?>

								<?php comments_template(); ?>
							<?php else :?>
							<?php endif ?>
<?php } ?>

	<?php // EDIT LINK ?>

								<?php if (!is_home() && current_user_can('edit_posts')) {?>
								<div class="separate"></div>
								<?php
									edit_post_link('edit');

								}?>

								<div class="clear"></div>

									</div><!--only in two-columns and contact-->

							</article>

	<?php // CONTACT PAGE SPECIFIC ?>

						<?php if (is_page_template('page-contact-us.php')) { ?>
								<article class="entry-1-4">
									<div class="entry contact">
										<?php if(isset($emailSent) && $emailSent == true) { ?>
											<div class="thanks" id="message">
												<p>Thanks, your email was sent successfully.</p>
													<script type="text/javascript">
													      document.location.href="#message";
													</script>
											</div>
										<?php } elseif(isset($hasError) || isset($captchaError)) { ?>
												<p class="error" id="message">Sorry, an error occured: please check the fields with error messages.</p>
													<script type="text/javascript">
													      document.location.href="#message";
													</script>
											<?php } ?>

										<h3>
											Contact Titanium Robotics
										</h3>

										<form action="<?php the_permalink(); ?>" class="pure-form" id="contactForm" method="post">
											<fieldset class="pure-group contactform">

											<!--NAME -->
													<?php if($nameError != '') { ?>
														<span class="error"><?=$nameError;?></span>
													<?php } ?>

												<input type="text" required="required" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" placeholder="Name" class="pure-input-1" />

											<!-- EMAIL -->
													<?php if($emailError != '') { ?>
														<span class="error"><?=$emailError;?></span>
													<?php } ?>

												<input type="email" required="required" name="email" id="email" placeholder="Email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="pure-input-1" />

											<!-- EMAIL SUBJECT -->
												<input type="text" name="topic" id="topic" placeholder="Subject" value="<?php if(isset($_POST['topic']))  echo $_POST['topic'];?>" class="pure-input-1" />

											</fieldset>

											<!-- COMMENT -->
													<?php if($commentError != '') { ?>
														<span class="error"><?=$commentError;?></span>
													<?php } ?>

												<textarea name="comments" required="required" id="commentsText" rows="8" placeholder="Message" class="pure-input-1"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
											<div class="clear"></div>
												<input type="submit" class="pure-button pure-input" />

												<input type="hidden" name="submitted" id="submitted" value="true" />

									</form>
								</div>
							</article>
						<?php } //IF PAGE TEMPLATE IS CONTACT ?>


							<div class="clear"></div>

						</div>

		<?php endwhile; ?>
		<?php else: ?>

	<?php // NO POSTS TO DISPLAY ?>

					<?php if (!is_search()) { ?>

						<div class="post-content">

							<article class="entry">

								<p>Sorry, there are no posts to display.</p>
							</article>

						</div>

					<?php } else { ?>

	<?php // NO POSTS SEARCH SPECIFIC ?>

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

	<?php // PAGINATION LINKS ?>

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
								'prev_text' => __('<span class="team1160-chevron-left"></span>'),
								'next_text' => __('<span class="team1160-chevron-right"></span>'),
								);

							if( $wp_rewrite->using_permalinks() )
								$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');

							if( !empty($wp_query->query_vars['s']) )
								$pagination['add_args'] = array('s'=>get_query_var('s'));

							echo '<div class="pagination">' . paginate_links($pagination) . '</div>';
							?>
							<div class="clear"></div>
						</div>
					<? } //navigation, if isn't a page or isn't single page?>
				</div>