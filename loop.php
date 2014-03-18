<?php if (!is_page_template('home-page.php')){ ?>

<div class="post">

		<?php if(have_posts()) :?>
		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
		<?php while(have_posts()) : the_post(); ?>
			
			<div class="post-content">

	<?php // FEATURED IMAGE ?>
		<?php if(has_post_thumbnail( $post_id )) {?>

				<?php
					$post_image_id = get_post_thumbnail_id($post_to_use->ID);
					if ($post_image_id) {
						$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
						if ($thumbnail) (string)$thumbnail = $thumbnail[0];
					}
					if (!empty($thumbnail)) {
				?>
						<div class="thumbnail">
							<div class="featured screen" style="background-image: url('<?php echo $thumbnail; ?>')!important;">
							</div>
							<h1>
								<?php the_title(); ?>
							</h1>
						</div>

				<?php }

		} else { ?>
				<div class="no-thumbnail"></div>
		<?php } ?>


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
																	// get the category IDs assigned to post
																	$categories = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
																	// separator between links
																	$separator = ', ';

																	if ( $categories ) {

																		$cat_ids = implode( ',' , $categories );
																		$cats = wp_list_categories( 'title_li=&style=none&echo=0&include=' . $cat_ids );
																		$cats = rtrim( trim( str_replace( '<br />',  $separator, $cats ) ), $separator );
																		
																		// display post categories
																		echo  $cats;
																	}
																?>
															<h4>Tags</h4>
															<section class="tags">
																<?php the_tags( '', '&nbsp;', '' ); ?> 
															</section>
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
									<div class="entry">

							<?php } else { ?>

								<article class="entry">

							<?php } ?>

	<?php // TITLE ?>

								<?php if( !is_page() && !is_single() ) { ?>
								
									<fieldset class="title"><legend>
										
										<?php if (is_home()) { ?>
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
?>
							
								<?php the_content();?>

							<?php if (is_single()) : ?>

								<?php comments_template(); ?> 

							<?php else :?> 

							<?php endif ?>
<?php } ?>

	<?php // CALENDAR ?>

								

	<?php // CONTACT PAGE SPECIFIC ?>

								<?php if (is_page_template('page-contact-us.php')) { ?>

								<div class="separate"></div>

										<?php if(isset($emailSent) && $emailSent == true) { ?>
											<div class="thanks">
												<p>Thanks, your email was sent successfully.</p>
											</div>
										<?php } else { ?>
											<?php if(isset($hasError) || isset($captchaError)) { ?>
												<p class="error">Sorry, an error occured: please check the fields with error messages.<p>
											<?php } ?>

										<h1>
											Contact Titanium Robotics
										</h1>
										
										<form action="<?php the_permalink(); ?>" class="pure-form" id="contactForm" method="post">
											<fieldset class="pure-group contactform">
											
											<!--NAME -->
													<?php if($nameError != '') { ?>
														<span class="error"><?=$nameError;?></span>
													<?php } ?>

												<input type="text" required="required" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" placeholder="Name" class="pure-input-1-2" />
												
											<!-- EMAIL -->
													<?php if($emailError != '') { ?>
														<span class="error"><?=$emailError;?></span>
													<?php } ?>

												<input type="email" required="required" name="email" id="email" placeholder="Email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="pure-input-1-2" />
												
											<!-- EMAIL -->
												<input type="text" required name="subject" id="email" placeholder="Subject" class="pure-input-1-2" />

											</fieldset>
												
											<!-- COMMENT -->
													<?php if($commentError != '') { ?>
														<span class="error"><?=$commentError;?></span>
													<?php } ?>

												<textarea name="comments" required="required" id="commentsText" rows="8" placeholder="Message" class="pure-input-1-2"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
											<div class="clear"></div>		
												<input type="submit" class="pure-button pure-input"></button>
										
												<input type="hidden" name="submitted" id="submitted" value="true" />
									
									</form>
								<?php } ?>

								<?php } else {} ?>

	<?php // EDIT LINK ?>

								<?php if (!is_home() && current_user_can('edit_posts')) {?>
								<div class="separate"></div>
								<?php
									edit_post_link('edit');

								}?>

								<div class="clear"></div>

								<?php if (is_page_template('two-column.php')) { ?>
									
									</div>

								<?php } ?>

							</article>

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
								'prev_text' => __('&larr;'),
								'next_text' => __('&rarr;'),
								);

							if( $wp_rewrite->using_permalinks() )
								$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');

							if( !empty($wp_query->query_vars['s']) )
								$pagination['add_args'] = array('s'=>get_query_var('s'));

							echo '<div class="pagination">' . paginate_links($pagination) . '</div>'; 		
							?>
							<div class="clear"></div>
						</div>
					<? } ?>
				</div>
<?php } else { ?>
		<div class="clear"></div>
			<div class="screen gallery autoplay items-4">
			<div id="item-1" class="control-operator"></div>
			<div id="item-2" class="control-operator"></div>
			<div id="item-3" class="control-operator"></div>
			<div id="item-4" class="control-operator"></div>
			<?php

				if(have_posts()) :						

				query_posts( 'showposts=4' );

				while(have_posts()) : the_post();

				$post_image_id = get_post_thumbnail_id($post->ID);
						if ($post_image_id) {
							$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
							if ($thumbnail) (string)$thumbnail = $thumbnail[0];
						}
				?>


			<figure class="item"
				style="background-image: url('<?php echo $thumbnail ?>') !important; background-size:cover !important; background-position:center center;">
					<div class="rightside">
						<article class="entry">
							<h3>
									<span><?php the_title(); ?></span>
							</h3>
							<?php $excerpt = get_the_excerpt( ) ?>
							<p><span><?php echo $excerpt ?></span></p>
							<a class="button" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">Read the Article</a>
						</article>
					</div>
					<div class="clear"></div>
			</figure>
			<?php endwhile; endif; ?>
			<div class="controls">
			<a href="#item-1" class="control-button">&mdash;</a>
			<a href="#item-2" class="control-button">&mdash;</a>
			<a href="#item-3" class="control-button">&mdash;</a>
			<a href="#item-4" class="control-button">&mdash;</a>
			</div>
			</div>

		<div class="clear"></div>

		<div id="FIRST" class="first homecontainer">
			<div class="entry leftside">
				<div>
						<h1>Team 1160 is a FIRST<sup>&reg;</sup> Team</h1>
						<h3>What is FIRST<sup>&reg;</sup> and what do they do?</h3>
					<p>
						<span class="feature-icon team1160-first" style="font-size:10em; float:left; padding:0 15px 0 0;" title="FIRST Logo"></span>Accomplished inventor <a target="_blank" href="http://www.usfirst.org/aboutus/content.aspx?id=48" rel="nofollow"><strong>Dean Kamen</strong></a> founded <a target="_blank" href="http://www.usfirst.org/" rel="nofollow"><strong><em>FIRST</em></strong></a><em><sup> ®</sup></em><em> </em>(For Inspiration and Recognition of Science and Technology) in 1989 to inspire appreciation of science and technology in young people.
					</p>
					<p>
						The way of life FIRST promotes, Gracious Professionalism<sup>™</sup>, is a way of working that encourages high-quality work, emphasizes the value of others, and respects individuals and the community. To learn more about <em>FIRST<sup>&reg;</sup></em>, visit <strong><a target="_blank" href="http://www.usfirst.org/" rel="nofollow">www.usfirst.org </a></strong>
					</p>
					<p>
						<a class="button" href="/about-first">Read the Full Article</a>
					</p>
				</div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="clear"></div>

		<div id="location" class="location homecontainer">
			<div class="entry leftside">
				<span class="red feature-icon team1160-location-outline" style="font-size:9em; float:left; padding:0 15px 0 0;" title="Location Pin"></span>
				<div>
					<h1>
						Team 1160 is located in San Marino, CA.
					</h1>
					<h4>
						We have been fortunate enough to be able to convert a small classroom into a workshop.  We also use the College &amp; Career Center as a computer lab.
					</h4>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="clear"></div>

		<div id="sponsors" class="sponsored homecontainer">
			<div class="entry sponsors">
				<h1>Titanium Sponsors</h1>
				<table style="width:100%;">
					<tbody>
						<tr>
							<td>
								<a href="http://www.boeing.com" target="_blank"><img alt="Boeing" src="http://www.titaniumrobotics.com/wp-content/themes/Website-master/assets/sponsor1.png" /></a><a href="http://www.nasa.gov" target="_blank">
								<img alt="NASA" src="http://www.titaniumrobotics.com/wp-content/themes/Website-master/assets/sponsor2.png" /></a><a href="http://www.jpl.nasa.gov" target="_blank"><img alt="JPL" src="http://www.titaniumrobotics.com/wp-content/themes/Website-master/assets/sponsor3.png" /></a><a href="http://www.ccsm.org" target="_blank"><img alt="Chinese Club" src="http://www.titaniumrobotics.com/wp-content/themes/Website-master/assets/sponsor4.png" /></a><a href="http://www.sanmarinohs.org" target="_blank">SMHS PTSA</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div id="social" class="social homecontainer">
			<div class="entry">
				<h1>Follow Us</h1>
				<ul>
					<li class="follow">
						<a href="http://www.facebook.com/team1160" target="_blank">
							<span class="team1160-social-facebook-circular"></span>
						</a>
					</li>
					<li class="follow twitterblue">
							<a href="http://twitter.com/frc1160" target="_blank">
								<span class="team1160-social-twitter-circular"></span>
							</a>
					</li>
					<li class="follow red">
							<a href="http://www.youtube.com/titaniumrobotics" target="_blank">
								<span class="team1160-video-outline"></span>
							</a>
					</li>
					<li class="follow black">
							<a href="http://www.github.com/FRC-Team-1160" target="_blank">
								<span class="team1160-social-github-circular"></span>
							</a>
					</li>
					<li class="follow blue">
							<a href="mailto:titaniumrobotics@gmail.com" target="_blank">
								<span class="team1160-social-at-circular"></span>
							</a>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
			<div class="clear"></div>

<?php } elseif (is_page_template('attachment.php')) {

}
 ?> 