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
							<span class="team1160-heart-outline"></span>
						</a>
					</li>
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
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	</footer>
</div>
<div class="clear"></div>
</div>
	
<?php wp_footer(); ?>

			<!-- RESPONSIVE VIDEOS -->
			<?php if(!is_front_page()) { ?>
				<script type="text/javascript">
					jQuery(function ($) {
						"use strict";
						$(function () {

						// Find all YouTube videos
							var $allVideos = $("iframe"),

							// The element that is fluid width
								$fluidEl = $(".entry");

						// Figure out and save aspect ratio for each video
							$allVideos.each(function () {

								$(this)
									.data('aspectRatio', this.height / this.width)

									// and remove the hard coded width/height
									.removeAttr('height')
									.removeAttr('width');

							});

						// When the window is resized
						// (You'll probably want to debounce this)
							$(window).resize(function () {

								var newWidth = $fluidEl.width();

							// Resize all videos according to their own aspect ratio
								$allVideos.each(function () {

									var $el = $(this);
									$el
										.width(newWidth)
										.height(newWidth * $el.data('aspectRatio'));

								});

						// Kick off one resize to fix all videos on page load
							}).resize();

						});

					});
				</script>
			<?php } ?>
		<!-- NAVIGATION -->
			<script src="<?php bloginfo('template_directory');?>/js/responsive-nav.min.js"	type="text/javascript"></script>
			
		<!-- SMOOTH SCROLL -->
			<script src="<?php bloginfo('template_directory');?>/js/smoothscroll.js"		type="text/javascript"></script>

		<!-- LIGATURES -->
			<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/liga.js"></script>

		<!-- NAVIGATION HOOK-UP -->
				<script type="text/javascript">
					var navigation = responsiveNav("#nav", {
						transition:400,
						label:"Open Menu",
						customToggle:"toggle",
					});
				</script>

<!--GOOGLE SUGGESTED THAT WE LOAD ALL UNIMPORTANT SCRIPTS HERE, SO HERE YA GO, BUT HTML5 STATES THAT IT REQUIRES THE PROPERTY TAG, SO THATS WHY THAT'S THERE...-->

			<!--MAIN STYLES-->
			<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('stylesheet_url'); ?>?ver=3.2.3" />
			<link property="stylesheet" rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/print.css?ver=1.0" media="print" />
			<!--end MAIN STYLES-->

			<!--START GOOGLE FONTS-SOURCE SANS PRO-->
			<link property="stylesheet" href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
			<!--END GOOGLE FONTS-SOURCE SANS PRO-->

			<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/team-1160-icons.css" />
			
			<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/forms.css?ver=2.1" />
			
			<?php if(is_front_page()) { ?>
				<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/front-page.css?ver=2.1.1" />
			<?php } ?>

			<!-- JUST SOME RANDOM CODE THAT HELPS THE SITE LOAD -->
					<script src="<?php bloginfo('template_directory');?>/js/_/blue-footed-booby.js"		type="text/javascript"></script>
			
					<!-- For the button version -->
					<script type="text/javascript">
						$(window).load(function() {
							$('.button').booby();
						});
					</script>

					<script type="text/javascript">
						$(window).load(function() {
							$('.button').booby({
								'enterOn' : 'blue-foot'
							});
						});
					</script>

</body>
</html>