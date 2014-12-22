<div class="clear"></div>
<?php wp_reset_query(); ?>
<?php if(!is_attachment()) { ?>
</div>
	<footer class="custom-background">
		
		<div class="footer-container">
			
			<div class="footer-right">
				<div class="copy">
					<p class="nomargin rubiks">&copy;<?php echo date(Y)?>&nbsp;<?php bloginfo('name'); ?>. All rights reserved.</p>
					<p class="nature">Designed &amp; coded with <span class="red team1160-">&#xe65c;</span> by Nathan Wong in California</p>
				</div>

				<ul class="s">
					<li class="follow red">
						<a href="http://www.titaniumrobotics.com/for-students/donations/">
							<span class="team1160-heart-outline"></span>
						</a>
					</li>
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
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	</footer>
<?php } ?>
	
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

		<!--UNIMPORTANT CSS CODE-->
			<!--START GOOGLE FONTS-SOURCE SANS PRO-->
				<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic|Source+Code+Pro:400,700' rel='stylesheet' type='text/css'>
			<!--END GOOGLE FONTS-SOURCE SANS PRO-->
			<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/team-1160-icons.css" />			
			<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/forms.css?ver=3.2.3" />
			<link property="stylesheet" rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/print.css?ver=1.0" media="print" />
			<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/schedules.css?ver=2" />
			<?php
				$custom_fields = get_post_custom();
				$construction = $custom_fields['construction'];
					if(!empty($construction)) {
						foreach ( $construction as $key => $value ) {
						if ($value == 'under construction') {
			?>
				<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/construction.css?ver=1" />
			<?php
						}
					}
				}
			?>

		<!-- LIGATURES -->
			<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/liga.js"></script>

		<!-- NAVIGATION HOOK-UP -->
				<script type="text/javascript">
					var navigation = responsiveNav("#nav", {
						transition:1000,
						label:"Open Menu",
						customToggle:"toggle",
					});
				</script>
			<!-- JUST SOME RANDOM CODE THAT HELPS THE SITE LOAD -->
					<script src="<?php bloginfo('template_directory');?>/js/_/blue-footed-booby.js?ver=3.1"		type="text/javascript"></script>
			
			<!-- Kona -->
			<script type="text/javascript">
				$(window).load(function() {
					$('body').booby({
						'enterOn' : 'blue-foot'
					});
				});
			</script>
			<?php include_once("analyticstracking.php") ?>

</body>
</html>