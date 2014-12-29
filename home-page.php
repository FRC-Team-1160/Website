<?php
/*
Template Name: Home Page
*/
?>
<?php get_header();?>



		<div class="clear gap"></div>
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


			<figure class="item thumbnail">
				<div  class="featured"
				style="background-image: url('<?php echo $thumbnail ?>') !important; background-size:cover !important; background-position:center center;"></div>
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
		<?php flush(); ?>
<div class="clear"></div>
<div class="contents">


		<div class="homecontainer clear">
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
				<span class="rubiks feature-icon team1160-location-outline" style="font-size:9em; height:9rem; display:block; margin:0 auto 16px; width:1em;" title="Location Pin"></span>
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

		<div class="homecontainer clear">
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

		<div class="homecontainer clear">
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

		<div id="why-the-bird" class="homecontainer clear">
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
		</div>

<?php get_footer(); ?>