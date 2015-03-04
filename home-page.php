<?php
/*
Template Name: Home Page
*/
?>
<?php get_header();?>
<!--<div class="clear gap"></div>
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
			<!--<div class="controls">
			<a href="#item-1" class="control-button">&mdash;</a>
			<a href="#item-2" class="control-button">&mdash;</a>
			<a href="#item-3" class="control-button">&mdash;</a>
			<a href="#item-4" class="control-button">&mdash;</a>
			</div>-->
			<!--</div>-->
		<?php flush(); ?>
<div class="thumbnail">
<h1><em>Feelings are important, but it's the physics that matters.</em></h1><br />
<h1 class="team1160-bird" style="display:inline; margin:0 0.25em"></h1><h1 class="team1160-first" style="display:inline; margin:0 0.25em"></h1>
</div>

<div class="clear"></div>
<div class="contents">


		<div class="homecontainer clear">
			<div class="entry-1-2 leftside">
				<div>
						<img style="height:9rem; display:block; margin:0 auto 16px;" src="/ti-static/logos/FIRST/FIRST.svgz">
						<h1>Team 1160 is a FIRST&reg; FRC Team</h1>
						<h3>What is FIRST&reg; and what do they do?</h3>
					<p><!--
						--><strong>FIRST stands for For Inspiration and Recognition of Science and Technology</strong>. Accomplished inventor <a target="_blank" href="http://www.usfirst.org/aboutus/content.aspx?id=48" rel="nofollow">Dean Kamen</a> founded <a target="_blank" href="http://www.usfirst.org/" rel="nofollow">FIRST&reg;</a> in 1989 to inspire appreciation of science and technology in young people. FIRST&reg; inspires people young and old to learn through robotics.
					</p>
					<p><strong>FRC</strong>, the league that Titanium Robotics competes in, is the High School level robotics league and stands for <strong>FIRST Robotics Competition</strong>
					<p>
						<a class="button" href="/about-first">More About FIRST&reg;</a>
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
						Our team is located in San Marino, California and is a part of San Marino High School. We work with teachers and students along with professionals around the area to provide a high quality STEM (and FIRST &reg;) experience.
					</p>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="homecontainer clear">
			<div class="entry-1-2">
				<img src="/ti-static/uploads/2014/02/DSC_0139-300x198.jpg" />
			</div>
			<div class="entry-1-2 bold">
				<p>
					Titanium Robotics is an FRC team with roughly 50 members, mostly from San Marino High School in San Marino, CA, although some members are from surrounding schools and areas such as South Pasadena and Arcadia.<br />
				</p>
				<p>
					Team 1160 provides a place in the normal school environment for students to learn how to apply their skills in Science, Technology, Engineering, and Mathematics. We're a group of students and mentors whose main goal is to provide the world with the next generation of STEM leaders.
				</p>
				<a href="/about-us" class="button">More about Our Team</a>
			</div>
			<div class="clear"></div>
		</div>

		<div class="homecontainer clear">
			<div class="entry-3-4 sponsored leftside">
				<h2>Titanium Sponsors</h2>
				<p><span class="sponsors"><br />
<a href="http://www.boeing.com" target="_blank"><img src="/ti-static/site/theme-Ti-22/assets/boeing.svgz" style="width:330px; height:auto;" alt="Boeing" /></a><!--
--><a href="http://www.nasa.gov" target="_blank"><!-- --><img src="/ti-static/site/theme-Ti-22/assets/nasa.svgz"style="width:120px; height:auto;" alt="NASA" /></a><!--
--><a href="http://www.jpl.nasa.gov" target="_blank"><img src="/ti-static/site/theme-Ti-22/assets/JPL.svgz"style="width:120px;height:auto" alt="JPL" /></a><!--
--><a href="http://www.ccsm.org" target="_blank"><img src="/ti-static/site/theme-Ti-22/assets/chinese-club.svgz" alt="Chinese Club" style="width:100px; height:auto;" /></a><!--
--><a href="http://www.sanmarinohs.org" target="_blank">SMHS PTSA</a></span>
<p style="text-align: center;">The Richard Weis Family</p>
<p style="text-align: center;">The Andrew Rooke Family</p>
					<p>
						<a class="button" href="/donations">Become a Sponsor</a>
					</p>
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
				<img src="/ti-static/logos/logo.svgz" />
			</div>
			<div class="entry-3-4">
				<h2>Why the bird?</h2>
				<p>
					Many years ago, Team 1160 was renamed "Firebird Robotics" (we had originally been named Titanium) which is where the firebird logo comes from. The colors were also red and gold.
				</p>
				<p>
					In 2012, we felt that we needed to reconnect with our school, whose colors are blue and white and mascot is the Titan, making a drastic change by going into the season as Titanium Robotics. We maintained the logo so that teams that have had long-standing relationships with our team would be able to recognize our team as the same.
				</p>
			</div>
		</div>

<?php get_footer(); ?>