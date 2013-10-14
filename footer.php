<div class="clear"></div>
<?php wp_reset_query(); ?>

	<footer id="footer" class="custom-background">
		
		<div class="footer-container">
			
			<div class="footer-right">
				<div class="copy">
					<p class="nomargin">&copy;<?php echo date(Y)?>&nbsp;<a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a>. All rights reserved.</p>
					<p>Designed by Nathan Wong</p>
				</div>

				<ul class="s">
					<li class="follow red">
						<a href="http://www.titaniumrobotics.com/for-students/donations/">
							<span style="display:inline-block; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe00d;">
							</span>
						</a>
					</li>
					<li class="follow">
						<a href="http://www.facebook.com/team1160" target="_blank">
							<span style="display:inline-block; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe01d;">
							</span>
						</a>
					</li>
					<li class="follow twitterblue">
							<a href="http://twitter.com/frc1160" target="_blank">
								<span style="display:inline-block; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe000;"></span>
							</a>
					</li>
					<li class="follow red">
							<a href="http://www.youtube.com/titaniumrobotics" target="_blank">
								<span style="display:inline-block; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe001;"></span>
							</a>
					</li>
					<li class="follow black">
							<a href="http://www.github.com/FRC-Team-1160" target="_blank">
								<span style="display:inline-block; text-align:center; vertical-algin:middle;" aria-hidden="true" data-icon="&#xe003;"></span>
							</a>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	</footer>
</div>
<div class="clear"></div>
</div>
	
<?php wp_footer(); ?>

		<!-- NAVIGATION -->
			<script src="<?php bloginfo('template_directory');?>/js/responsive-nav.min.js"	type="text/javascript"></script>
			
		<!-- SMOOTH SCROLL -->
			<script src="<?php bloginfo('template_directory');?>/js/smoothscroll.js"		type="text/javascript"></script>

<!-- NAVIGATION HOOK-UP -->
		<script type="text/javascript">
			var navigation = responsiveNav("#nav", {
				transition:500,
				label:"Open Menu",
				customToggle:"toggle",
			});
		</script>
</body>
</html>