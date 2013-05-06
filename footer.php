</div>
<div class="clear"></div>
<?php wp_reset_query(); ?>
<?php if(is_page_template('home-page.php')) { ?>

<?php } else { ?>

	<footer id="footer">
		<div class="footershadow"></div>
		
		<div class="footer-container">
			
			<div class="footer-right">
				<ul class="s">
					<li class="header-responsive-hidden">
						<h5>
							Titanium Robotics
						</h5>
					<li>
						<a href="/about-us">About Us</a>
					</li>
					<li>
						<a href="/our-mission">Our Mission</a>
					</li>
					<li>
						<a href="/contact-us">Contact Us</a>
					</li>
					<li>
						<a href="/schedule">Schedule</a></li>
					<li>
						<a href="/alumni">Alumni</a>
					</li>
					<li>
						<a href="/about-first">About <i>FIRST&reg;</i></a>
					</li>
					<li>
						<a href="/team-leadership">Team Leadership</a>
					</li>
				</ul>
				<ul class="h">
					<li>
						<h5 class="header-responsive-hidden">
							Teams
						</h5>
					</li>
					<li>
						<a href="/resources/business">Business Team</a>
					</li>
					<li>
						<a href="/resources/mechanical">Mechanical Team</a>
					</li>
					<li>
						<a href="/resources/programming">Programming Team</a>
					</li>
					<li>
						<a href="/resources/cad">CAD Team</a>
					</li>
					<li>
						<a href="/resources/electrical">Electrical Team</a>
					</li>
					<li>
						<a href="/resources/scouting">Scouting Team</a>
					</li>
					<li>
						<a href="/resources/the-website">Website Team</a>
					</li>
				</ul>
				<ul class="h">
					<li>
						<h5 class="header-responsive-hidden">
							Media
						</h5>
					</li>
					<li>
						<a href="/media">Titanium Robotics Press</a>
					</li>
					<li>
						<a href="/branding">Styles Guide</a>
					</li>
					<li>
						<a href="/media/videos">Video Gallery</a>
					</li>
					<li>
						<a href="/media/photos">Photo Gallery</a>
					</li>
				</ul>
				<ul class="s">
					<li class="header-responsive-hidden">
						<h5>
							Follow
						</h5>
					<li class="follow">
						<a href="http://www.facebook.com/team1160" target="_blank">
							<span style="display:inline-block; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe01d;">
							</span>
						</a>
					</li>
					<li class="follow">
							<a href="http://twitter.com/frc1160" target="_blank">
								<span style="display:inline-block; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe000;"></span>
							</a>
					</li>
					<li class="follow">
							<a href="http://www.youtube.com/titaniumrobotics" target="_blank">
								<span style="display:inline-block; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe001;"></span>
							</a>
					</li>
					<li class="follow">
							<a href="http://www.github.com/FRC-Team-1160" target="_blank">
								<span style="display:inline-block; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe003;"></span>
							</a>
					</li>
				</ul>
				<ul class="h">
					<li>
						<h5 class="header-responsive-hidden">
							Search
						</h5>
					</li>
					<li>
						<br />
						<?php get_search_form( ); ?>
					</li>
				</ul>
			</div>

			<div class="bottom">

				<p>
					<a href="http://www.titaniumrobotics.com/donations" target="_blank" style="margin:0 0.5em;">
					 	<span style="display:inline-block; font-size:3em; text-align:center; vertical-algin:middle;" title="Donate" aria-hidden="true" data-icon="&#xe00d;">
					 	</span>
					</a>
					<a href="https://github.com/FRC-Team-1160/Website" target="_blank" style="margin:0 0.5em;">
					 	<span style="display:inline-block; font-size:3em; text-align:center; vertical-algin:middle;" title="GitHub Repo" aria-hidden="true" data-icon="&#xe002;">
					 	</span>
					</a>
					<a href="http://www.titaniumrobotics.com" style="margin:0 0.5em;">
					 	<span style="display:inline-block; text-align:center; font-size:3em; vertical-algin:middle;" title="Team1160 Homepage" aria-hidden="true" data-icon="b">
					 	</span>
					</a>
					<a href="http://www.usfirst.org" target="_blank" style="margin:0 0.5em;">
					  	<span style="display:inline-block; text-align:center; vertical-algin:middle; font-size:3em;" title="U.S. FIRST Homepage" aria-hidden="true" data-icon="f">
					  	</span>
					</a>
					<a href="http://validator.w3.org/check?uri=<?php echo get_home_url(); ?>" target="_blank">
						<span style="display:inline-block; text-align:center; vertical-algin:middle; font-size:3em;" title="Valid HTML5" aria-hidden="true" data-icon="&#xe007;">
					  	</span>
					</a>
				</p>
				<div class="copy">
					<p>
						&copy;<?php echo date(Y)?>&nbsp;<a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a>  //  All rights reserved
					</p>
				</div>
			</div>

		</div>
	</footer>
	
<?php } ?>
<?php wp_footer(); ?>
<?php
/* THIS IS HIDDEN BECAUSE I DON'T WANT GOOGLE TO TRACK THESE PAGES YET
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36416864-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
*/
?>

<!-- NAVIGATION HOOK-UP -->
		<script>
			var navigation = responsiveNav("#nav", {
				animation:true,
				transition:500,
				label:"Open Menu",
				customToggle:"toggle",
			});
		</script>
</body>
</html>