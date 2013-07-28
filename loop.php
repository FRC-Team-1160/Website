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
							<div class="featured" style="background-image: url('<?php echo $thumbnail; ?>')!important;">
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

							<?php if (is_page_template('two-column.php', 'bookmarks.php')) { ?>
								<aside class="sidebar-left">
									<section class="sidebar-content">
										<div class="border-right">

											<?php if(is_page_template('bookmarks.php')) : ?>

												<?php 
												if (function_exists('dynamic_sidebar') && dynamic_sidebar('bookmarks')) : 
												else : 
												?>
												<?php endif; ?>

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

	<?php // TIME ?>

								<?php if ( !is_page() ) { ?>
								<time class="time">
									
									<?php the_time('n/j/y') ?>
			
								</time>
								<?php } else {

								} ?>
	
	<?php // THE_CONTENT ?>
							<?php if (!is_home()) : ?>
								<?php the_content();?>
							<?php else : ?>
								<?php the_excerpt(); ?>
							<?php endif; ?>

							<?php if (is_single()) : ?>

								<a class="moot" href="https://moot.it/i/titaniumrobotics/blog/<?php global $post; $post_slug=$post->post_name; echo $post_slug; ?>">
								Comments
								</a>

							<?php else :?> 

							<?php endif ?>

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
			<div id="video" class="homecontainer">
				<div class="entry" style="width:100%; padding:0; float:none;">
					<iframe width="321" height="181" src="http://www.youtube.com/embed/sZsngCANVb4" allowfullscreen></iframe>
				</div>
			</div>

		<div class="clear"></div>

		<div id="FIRST" class="withshadow first homecontainer">
			<div class="entry leftside">
				<div>
						<h1>Team 1160 is a FIRST<sup>&reg;</sup> Team</h1>
						<h4>What is FIRST<sup>&reg;</sup> and what do they do?</h4>
					<p>
						<span style="font-size:10em; float:left; padding:0 15px 0 0;" title="FIRST" aria-hidden="true" data-icon="f"></span>Accomplished inventor <a target="_blank" href="http://www.usfirst.org/aboutus/content.aspx?id=48" rel="nofollow"><strong>Dean Kamen</strong></a> founded <a target="_blank" href="http://www.usfirst.org/" rel="nofollow"><strong><em>FIRST</em></strong></a><em><sup> ®</sup></em><em> </em>(For Inspiration and Recognition of Science and Technology) in 1989 to inspire appreciation of science and technology in young people.
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
		<?php

		if(have_posts()) :						

		query_posts( 'showposts=1' );

		while(have_posts()) : the_post();

		$post_image_id = get_post_thumbnail_id($post->ID);
				if ($post_image_id) {
					$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
					if ($thumbnail) (string)$thumbnail = $thumbnail[0];
				}
		?>

		<div id="blog" class="announcement homecontainer"
		style="background-image: url('<?php echo $thumbnail ?>') !important;">
			<div class="entry rightside">
				<article>
					<h1>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					</h1>
					<?php the_excerpt(); ?>
				</article>
			</div>
			<div class="clear"></div>
		</div>

<?php endwhile; endif; ?>

		<div class="clear"></div>

		<div id="location" class="withshadow location homecontainer">
			<div class="entry leftside">
				<div>
					<h1>
						Team 1160 is located in San Marino, CA.
					</h1>
					<p>
						We have been fortunate enough to be able to convert a small classroom into a workshop.  We also use the College &amp; Career Center as a computer lab.
					</p>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="clear"></div>

		<div id="sponsors" class="white sponsored homecontainer">
			<div class="entry sponsors">
				<h1>Titanium Sponsors</h1>
				<table>
					<tbody>
						<tr>
							<td>
								<a href="http://www.boeing.com" target="_blank"><img alt="Boeing" src="http://www.titaniumrobotics.com/wp-content/themes/Website-master/assets/sponsor1.png" /></a><a href="http://www.nasa.gov" target="_blank">
								<img alt="NASA" src="http://www.titaniumrobotics.com/wp-content/themes/Website-master/assets/sponsor2.png" /></a><a href="http://www.jpl.nasa.gov" target="_blank"><img alt="JPL" src="http://www.titaniumrobotics.com/wp-content/themes/Website-master/assets/sponsor3.png" /></a><a href="http://www.ccsm.org" target="_blank"><img alt="Chinese Club" src="http://beta.titaniumrobotics.com/wp-content/themes/Website-master/assets/sponsor4.png" /></a><a href="http://www.sanmarinohs.org" target="_blank">SMHS PTSA</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="clear"></div>

		<div id="social" class="white social homecontainer">
			<div class="entry">
				<h1>Follow Us</h1>
				<p>
					<a href="http://www.facebook.com/team1160" target="_blank">
							<span style="display:inline-block; color:#0054A3; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe01d;">
							</span>
					</a>
					<a href="http://twitter.com/frc1160" target="_blank">
						<span style="display:inline-block; color: rgb(0, 172, 237); text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe000;"></span>
					</a>
					<a href="http://www.youtube.com/titaniumrobotics" target="_blank">
						<span style="display:inline-block; color: darkred; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe001;"></span>
					</a>
					<a href="http://www.github.com/FRC-Team-1160" target="_blank">
						<span style="display:inline-block; color: black; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe003;"></span>
					</a>
				</p>
			</div>
			<div class="clear"></div>
		</div>

<?php } ?> 