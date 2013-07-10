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

		<!--FONTS-->
			<link href='http://fonts.googleapis.com/css?family=Roboto:400italic,400,500,500italic,300,300italic,100,100italic' rel='stylesheet' type='text/css'>

		<!--CSS-->
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('stylesheet_url'); ?>" />
			<link rel="stylesheet"					href="https://cdn.moot.it/1/moot.css">
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/team-1160-icons.css" />
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/forms.css" />
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/responsive-nav.css">
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
			<style>
				.moot {
					font-size: 18px;
					max-width:none;
					opacity:0;  /* make things invisible upon start */
					animation:fadeIn ease-in 1; /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
					animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
					animation-duration:1s;
					animation-delay: 2s;
					-webkit-animation:fadeIn ease-in 1; /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
					-webkit-animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
					-webkit-animation-duration:1s;
					-webkit-animation-delay: 2s;
				}
				.m-page {
					padding-left:10px;
				}
				.m-header {
					background-color:#EEEEEE;
				}
				.m-search [type=text] {
					-webkit-border-radius:inherit;
					-moz-border-radius:inherit;
					border-radius: inherit;
				}
			</style>

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

			<!-- RESPONSIVE VIDEOS -->
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
			<!-- NAVIGATION -->
			<script src="<?php bloginfo('template_directory');?>/js/responsive-nav.min.js"	type="text/javascript"></script>
			<!-- MOOT -->
			<script src="https://cdn.moot.it/1/moot.min.js"></script>
			<!-- ICONS FONT FOR IE9 -->
			<!--[if lte IE 7]>
				<script src="<?php bloginfo('template_directory'); ?>/js/lte-ie7.js"		type="text/javascript"></script>
			<![endif]-->

			<!-- HTML5 FOR IE9 -->
			<!--[if lt IE 9]>
				<script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
			<![endif]-->
	</head>

<?php flush(); ?>

<!--		<BODY> START		-->

	<body class="<?php if (is_front_page()) : ?>front<?php else:?><?php endif; ?>">

		<div class="<?php if (is_front_page()) : ?>frontpage wrapper"><div class="background"><div class="blackout"></div></div><?php else:?>normal wrapper"><?php endif; ?>
		
			<!--START - NAVIGATION-->
		
			<header id="menuwrap" class="custom-background">
				
				<div id="icon-nav">
					<div class="menu">
						<div class="logo">
							<a href="/" title="Titanium Robotics, FRC Team 1160">
								<span aria-hidden="true" data-icon="b">
								</span>
							</a>
						</div>

						<div class="menu-right">
							<?php if (is_user_logged_in()) { ?>
							
							<?php } else { ?>
								<div class="icon">
									<a href="<?php echo esc_url( wp_login_url( $_SERVER['REQUEST_URI'] ) ); ?>" title="login">
										<span aria-hidden="true" data-icon="&#xe021;">
										</span>
									</a>
								</div>
							<?php }?>

							<div class="icon">
								<a href="#nav" id="toggle" title="Open Menu" >
									<span aria-hidden="true" data-icon="&#xe020;">
									</span>
								</a>
							</div>
						</div>
					</div>
					
				</div>

					<?php
					if(is_front_page()):
						wp_nav_menu(
							array(
								'theme_location'	=>	'Main-Navigation',
								'container_id'		=>	'nav',
								'container_class'	=>	'navigation-links home-links',
								'menu_id'			=>	'menu',
								'menu_class'		=>	'ti22',
							)
						);
					else:
						wp_nav_menu(
							array(
								'theme_location'	=>	'Main-Navigation',
								'container_id'		=>	'nav',
								'container_class'	=>	'navigation-links',
								'menu_id'			=>	'menu',
								'menu_class'		=>	'ti22',
							)
						);
					endif;
					?>
				
			</header>
		<div class="clear"></div>
		<?php if(is_front_page()) : ?>

			<div class="title">
				<div class="entry">
					<p class="titletext">
						<span class="bird" style="font-size:4em; display:block;" title="Titanium Robotics" aria-hidden="true" data-icon="b">
						</span>
						<span title="Titanium Robotics" aria-hidden="true" data-icon="t">
						</span>
					</p>
				</div>
				<div class="clear"></div>
			</div>

			<div id="overlayBlur" class="links">
				<a href="#video">
					<span class="fronticon" title="Featured Youtube Video" aria-hidden="true" data-icon="&#xe001;">
					</span>
				</a>
				<a href="#FIRST">
					<span class="fronticon" title="About FIRST" aria-hidden="true" data-icon="f">
					</span>
				</a>
				<a href="#blog">
					<span class="fronticon" title="Blog" aria-hidden="true" data-icon="&#xe015;">
					</span>
				</a>
				<a href="#location">
					<span class="fronticon" title="Location" aria-hidden="true" data-icon="&#xe017;"></span>
				</a>
				<a href="#sponsors">
					<span class="fronticon" title="Sponsors" aria-hidden="true" data-icon="&#xe018;">
					</span>
				</a>
				<a href="#social">
					<span class="fronticon" title="Social Networks" aria-hidden="true" data-icon="&#xe00e;"></span>
				</a>
			</div>
		</div>
		<?php endif; ?>

	<?php if(!is_front_page() && !is_404() && !is_search() && !is_home()) : ?>
			<div id="subpages"><div class="limit">
				<div class="table">
					<?php if(!has_post_thumbnail( $post_id )) {?>
						<div class="title">
							<ul>
								<li>
									<h1>
										<?php
											wp_title("", true);
										?>
									</h1>
								</li>
							</ul>
						</div>
					<?php } ?>
		<?php if(!is_author() && !is_search() && !is_404() &&!is_home()) : ?>
				<?php
					if($post->post_parent)
					$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
					 else
					 $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
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
	<?php endif; ?>