<?php if (!is_page_template('home-page.php')): ?>

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
							<span>
								<h1>
									<?php the_title(); ?>
								</h1>
							</span>
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

								<article class="entry<?php if (is_page_template('page-contact-us.php')) { ?>-3-4<?php } ?>">

							<?php } ?>

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

								<?php if (is_page_template('two-column.php')) { ?>
									
									</div><!--only in two-columns and contact-->

								<?php } ?>

							</article>

	<?php // CONTACT PAGE SPECIFIC ?>

								<?php if (is_page_template('page-contact-us.php')) { ?>
								<article class="entry-1-4">
										<?php if(isset($emailSent) && $emailSent == true) { ?>
											<div class="thanks">
												<p>Thanks, your email was sent successfully.</p>
											</div>
										<?php } else { ?>
											<?php if(isset($hasError) || isset($captchaError)) { ?>
												<p class="error">Sorry, an error occured: please check the fields with error messages.<p>
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
												
											<!-- EMAIL -->
												<input type="text" required name="subject" id="email" placeholder="Subject" class="pure-input-1" />

											</fieldset>
												
											<!-- COMMENT -->
													<?php if($commentError != '') { ?>
														<span class="error"><?=$commentError;?></span>
													<?php } ?>

												<textarea name="comments" required="required" id="commentsText" rows="8" placeholder="Message" class="pure-input-1"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
											<div class="clear"></div>		
												<input type="submit" class="pure-button pure-input"></button>
										
												<input type="hidden" name="submitted" id="submitted" value="true" />
									
									</form>
								</article>
								<?php } ?>

								<?php } else {} ?>


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
<?php else: ?>
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


			<figure class="item thumbnail"
				style="background-image: url('<?php echo $thumbnail ?>') !important; background-size:cover !important; background-position:center center;">
				<span>
					<h1>
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h1>
				</span>
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

		<div class="homecontainer">
			<div class="entry-1-2 leftside">
				<div>
						<img style="height:9em; display:block; margin:0 auto 16px;" src="http://ti-static.titaniumrobotics.com/logos/FIRST/FIRST.svg">
						<h1>Team 1160 is a FIRST&reg; FRC Team</h1>
						<h3>What is FIRST&reg; and what do they do?</h3>
					<p><!--
						--><strong>FIRST stands for For Inspiration and Recognition of Science and Technology</strong>. Accomplished inventor <a target="_blank" href="http://www.usfirst.org/aboutus/content.aspx?id=48" rel="nofollow"><strong>Dean Kamen</strong></a> founded <a target="_blank" href="http://www.usfirst.org/" rel="nofollow"><strong>FIRST</strong></a>in 1989 to inspire appreciation of science and technology in young people. <em>FIRST</em> inspires people young and old to learn through robotics.
					</p>
					<p><strong>FRC</strong>, the league that Titanium Robotics competes in, is the High School level robotics league and stands for <strong>FIRST Robotics Competition</strong>
					<p>
						<a class="button" href="/about-first">Read the Full Article</a>
					</p>
				</div>
			</div>
			<div class="entry-1-2 leftside">
				<span class="red feature-icon team1160-location-outline" style="font-size:9em; height:9rem; display:block; margin:0 auto 16px; width:1em;" title="Location Pin"></span>
				<div>
					<h1>
						Team 1160 is located in San Marino, CA.
					</h1>
					<p>
						We have converted a classroom at our school into a full workshop and use our College and Career Center as a computer lab. All of our work is done in these two rooms during the season.
					</p>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="clear"></div>

		<div class="homecontainer">
			<div class="entry-1-2">
				<img src="http://ti-static.titaniumrobotics.com/uploads/2014/02/DSC_0139-1024x678.jpg" />
			</div>
			<div class="entry-1-2 bold">
				<p>
					Titanium Robotics is an FRC team with roughly 50 members, mostly from San Marino High School in San Marino, CA, although some members are from surrounding schools and areas such as South Pasadena and Arcadia.<br />
				</p>
				<p>
					Team 1160 provides a place in the normal school environment for students to learn how to apply their skills in Science, Technology, Engineering, and Mathematics. We're a group of students and mentors whose main goal is to provide the world with the next generation of STEM leaders.
				</p>
				<a href="/about-us" class="button">Read More</a>
			</div>
			<div class="clear"></div>
		</div>

		<div class="clear"></div>
		
		<div class="homecontainer">
			<div class="entry-3-4 sponsored leftside">
				<h2>Titanium Sponsors</h2>
				<table style="width:100%;" class="sponsors">
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
			<div class="entry-1-4 social leftside">
				<h2>Follow Us</h2>
				<ul>
					<li class="follow blue">
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
		
		<div id="why-the-bird" class="homecontainer">
			<div class="entry-1-4">
				<img src="http://ti-static.titaniumrobotics.com/logos/logo.svgz" />
			</div>
			<div class="entry-3-4">
				<h2>Why the bird?</h2>
				<p>
					Many years ago, Team 1160 was renamed "Firebird Robotics" (we had originally been named Titanium) which is where the firebird logo comes from. The colors were also changed from blue and white to red and gold.
				</p>
				<p>
					In 2012, we felt that we needed to reconnect with our school, whose colors are blue and white and mascot is the Titan, making a drastic change by going into the season as Titanium Robotics. We maintained the logo so that teams that have had long-standing relationships with our team would be able to recognize our team as the same.
				</p>
			</div>
			<div class="clear"></div>
		</div>
 <?php endif ?>