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
				<ul class="s">
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

				<ul>
					<li>
						<a href="http://www.titaniumrobotics.com/donations" target="_blank" style="margin:0 0.5em;">
						 	<span style="display:inline-block; font-size:3em; text-align:center; vertical-algin:middle;" title="Donate" aria-hidden="true" data-icon="&#xe00d;">
						 	</span>
						</a>
					</li>
					<li>
						<a href="https://github.com/FRC-Team-1160/Website" target="_blank" style="margin:0 0.5em;">
						 	<span style="display:inline-block; font-size:3em; text-align:center; vertical-algin:middle;" title="GitHub Repo" aria-hidden="true" data-icon="&#xe002;">
						 	</span>
						</a>
					</li>
					<li>
						<a href="http://www.titaniumrobotics.com" style="margin:0 0.5em;">
						 	<span style="display:inline-block; text-align:center; font-size:3em; vertical-algin:middle;" title="Team1160 Homepage" aria-hidden="true" data-icon="b">
						 	</span>
						</a>
					</li>
					<li>
						<a href="http://www.usfirst.org" target="_blank" style="margin:0 0.5em;">
						  	<span style="display:inline-block; text-align:center; vertical-algin:middle; font-size:3em;" title="U.S. FIRST Homepage" aria-hidden="true" data-icon="f">
						  	</span>
						</a>
					</li>
					<li>
						<a href="http://validator.w3.org/check?uri=<?php echo get_home_url(); ?>" target="_blank">
							<span style="display:inline-block; text-align:center; vertical-algin:middle; font-size:3em;" title="Valid HTML5" aria-hidden="true" data-icon="&#xe007;">
						  	</span>
						</a>
					</li>
				</ul>
			</div>
				<div class="copy">
					<p>
						&copy;<?php echo date(Y)?>&nbsp;<a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a>  //  All rights reserved
					</p>
				</div>
			</div>

		</div>
	</footer>
	
<?php } ?>
</div>
<?php wp_footer(); ?>

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