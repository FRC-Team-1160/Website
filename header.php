<!DOCTYPE html>
<html lang="en-US">
	<head>
		<!--META-->
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0,">
			<meta name="keywords" content="robotics, FRC, Team 1160, FRC 1160, Titanium Robotics, Titanium FRC, Titanium 1160, Team Titanium, FRC Robotics, San Marino, San Marino High School, FRC Team 1160, Team 1160 FRC, San Marino Robotics, Firebird Robotics" />

		<!--TITLE-->
			<title><?php wp_title(''); ?> // <?php bloginfo('name'); ?></title>

		<!--LINKS-->
			<link rel="alternate"	title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
			<link rel="pingback"					href="<?php bloginfo('pingback_url'); ?>" />
			<link rel="icon"		type="application/rss+xml"	href="<?php bloginfo('template_directory') ?>/assets/favicon.ico" />

		<!--TITANIUM ROBOTICS LOGO || USES REL=LOGO (RELOGO.ORG) FOR MAINTAINING THE LOGO-->
			<link rel="logo" 
				type="image/svg" 
				href="<?php bloginfo('template_directory'); ?>/assets/logo.svg"/>

		<!--CSS-->
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/responsive-nav.css">
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('stylesheet_url'); ?>" />
			<!--START GOOGLE FONTS-SOURCE SANS PRO-->
			<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
			<!--END GOOGLE FONTS-SOURCE SANS PRO-->

			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/team-1160-icons.css" />
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/forms.css" />

			<?php if(is_front_page()) { ?>
				<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/front-page.css" />
			<?php } ?>

				<!--[if lt IE 9]>
				<style>
					#menuwrap {
						top:0;
						position:relative;
					}
					.thumbnail h1, .title .entry .titletext {
						top:0;
						bottom:0;
						text-align:center;
					}
				</style>
				<![endif]-->

			<?php if (is_search()) : ?>
				<style type="text/css" media="screen">
						.titanium {font-weight:bold;}
						</style>
						<script type="text/javascript">
						jQuery.fn.extend({
						highlight: function(search, insensitive, titanium_class){
							var regex = new RegExp("(<[^>]*>)|(\\b"+ search.replace(/([-.*+?^${}()|[\]\/\\])/g,"\\$1") +")", insensitive ? "ig" : "g");
							return this.html(this.html().replace(regex, function(a, b, c){
							return (a.charAt(0) == "<") ? a : "<em class=\""+ titanium_class +"\">" + c + "</em>";
							}));
						}
						});
						jQuery(document).ready(function($){
						if(typeof(titanium_query) != 'undefined'){
							$("#contents").highlight(titanium_query, 1, "titanium");
						}
						});
				</script>
			<?php endif; ?>
		
		<!--SCRIPTS-->
			<?php wp_head(); ?>

			<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/liga.js"></script>

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

		<!-- ICONS FONT FOR IE9 -->
			<!--[if lte IE 7]>
				<script src="<?php bloginfo('template_directory'); ?>/fonts/ie7.js"		type="text/javascript"></script>
				<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/fonts/ie7.css" />
			<![endif]-->

		<!-- HTML5 FOR IE9 -->
			<!--[if lt IE 9]>
				<script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
			<![endif]-->
			<style>@import url('<?php bloginfo('template_directory'); ?>/print.css') print;</style>

	</head>

<?php flush(); ?>

<!--		<BODY> START		-->

	<body class="<?php if (is_front_page()) : ?>front<?php else:?><?php endif; ?>">

		<div class="<?php if (is_front_page()) : ?>frontpage wrapper"><?php else:?>normal wrapper"><?php endif; ?>
		
			<!--START - NAVIGATION-->
		
			<header id="menuwrap" class="custom-background">
				
				<div id="icon-nav">
					<div class="menu">
						<div class="logo">
							<a href="/" title="Titanium Robotics, FRC Team 1160">
								<img class="screen" src="<?php bloginfo('template_directory'); ?>/assets/titanium-robotics-logo-white.svg" style="margin-top:10px;" height="74px">
								<img class="print" src="<?php bloginfo('template_directory'); ?>/assets/logo.svg" height="2.5em" />
							</a>
						</div>

						<div class="menu-right screen">
							<div class="icon">
								<a href="#" id="toggle" title="Open Menu" >
									<span class="team1160-th-menu">
									</span>
								</a>
							</div>
						</div>

						<div id="login" class="screen">
							<?php wp_loginout( get_permalink() ); ?>
							<?php if(is_user_logged_in()) {
								echo "&nbsp;|&nbsp;";
							$url = admin_url( '', 'http' );
							?>
							<a href="<?php echo $url; ?>">Dashboard</a>
							<?php
							}
							else {

							}
							?>
						</div>
					</div>
					
				</div>

					<?php
						wp_nav_menu(
							array(
								'theme_location'	=>	'Main-Navigation',
								'container_id'		=>	'nav',
								'container_class'	=>	'navigation-links screen',
								'menu_id'			=>	'menu',
								'menu_class'		=>	'ti22',
							)
						);
					?>
				
			</header>
		<div class="clear"></div>
	<?php if(!is_front_page() && !is_404() && !is_search() && !is_home()) : ?>
			<div id="subpages"><div class="limit">
				<div class="table">
					<?php if(!has_post_thumbnail( $post_id )) {?>
						<div class="title">
							<ul>
								<li>
										<?php
											wp_title("", true);
										?>
								</li>
							</ul>
						</div>
					<?php } ?>
		<?php if(!is_author() && !is_search() && !is_404() &&!is_home()) : ?>
				<?php

					if($post->post_parent)
						$children = wp_list_pages(
							"title_li=&child_of=".$post->post_parent."&echo=0"
						);
					else
						$children = wp_list_pages(
							"title_li=&child_of=".$post->ID."&echo=0"
						);
					
					if ($children) { 
						$parent_title = get_the_title($post->post_parent);?>
				<div class="links <?php if(!has_post_thumbnail( $post_id )) {} else{?>withthumbnail<?php } ?>">
					<ul>
						<li<?php 
							if (is_page($post->post_parent))
							{ 
							echo " class=\"current-menu-item\"";
							}
							?>><a href="<?php echo get_permalink($post->post_parent) ?>"><?php echo $parent_title;?></a></li>
						<?php echo $children; ?>
					 </ul>
				</div>
				<?php } ?>
		<?php endif; ?>
		<?php if(is_single()) : ?>
				<div class="links <?php if(has_post_thumbnail( $post )) { ?> withthumbnail<?php }?>">
				<ul style="width:100%;">
					<li style="width:100%; padding:0;">
						<?php the_breadcrumb(); ?>
					</li>
				</ul>
				</div>
		<?php endif; ?>
		</div>
	</div></div>
	<div class="clear"></div>
	<?php endif; ?>