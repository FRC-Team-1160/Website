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
		
		<!-- MAIN STYLES WERE MOVED TO THE FOOTER SO THEY WOULD BE QUICKER -->
			<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/responsive-nav.css">
			<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/schedules.css" />
			<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/assets/typography.css" />
			
			<?php
				$custom_fields = get_post_custom();
				$construction = $custom_fields['construction'];
					if(!empty($construction)) {
						foreach ( $construction as $key => $value ) {
						if ($value == 'under construction') {
			?>
							<style>
							.team1160-flash-outline {
								float:left;
								margin:auto;
								width:2em;
								font-size:5em;
								color:#0067C6;
								padding:1em 0;
								position:relative;
								text-align:center;
							    -webkit-animation-name: ColorChange;
							    -moz-animation-name: ColorChange;
							    -o-animation-name: ColorChange;
							    animation-name: ColorChange;
							    -webkit-animation-duration: 10s;
							    -moz-animation-duration: 10s;
							    -o-animation-duration: 10s;
							    animation-duration: 10s;
							    -webkit-animation-iteration-count: infinite;
							    -moz-animation-iteration-count: infinite;
							    -o-animation-iteration-count: infinite;
							    animation-iteration-count: infinite;
							    -webkit-animation-timing-function: linear;
							    -moz-animation-timing-function: linear;
							    -o-animation-timing-function: linear;
							    animation-timing-function: linear;
							}
							.team1160-flash-outline .team1160-starburst-outline {
								font-size:2em;
								color:#0067C6;
								position:absolute;
								top: 0.25em;
								left: 0;
								right: 0;
								bottom: 0.28em;
								-webkit-animation-duration: 25s;
								-webkit-animation-name: rotate;
								-webkit-animation-iteration-count: infinite;
								-webkit-animation-timing-function: linear;
								-o-animation-duration: 25s;
								-o-animation-name: rotate;
								-o-animation-iteration-count: infinite;
								-o-animation-timing-function: linear;
								-moz-animation-duration: 25s;
								-moz-animation-name: rotate;
								-moz-animation-iteration-count: infinite;
								-moz-animation-timing-function: linear;
								animation-duration: 25s;
								animation-name: rotate;
								animation-iteration-count: infinite;
								animation-timing-function: linear;
							}
							@keyframes rotate {
							    from {
							        transform:rotate(0deg)
							    }
							    to {
							        transform:rotate(360deg)
							    }
							}
							@-o-keyframes rotate {
							    from {
							        -o-transform:rotate(0deg)
							    }
							    to {
							        -o-transform:rotate(360deg)
							    }
							}
							@-webkit-keyframes rotate {
							    from {
							        -webkit-transform:rotate(0deg)
							    }
							    to {
							        -webkit-transform:rotate(360deg)
							    }
							}
							@-moz-keyframes rotate {
							    from {
							        -moz-transform:rotate(0deg)
							    }
							    to {
							        -moz-transform:rotate(360deg)
							    }
							}
							.team1160-starburst-outline.reverse {
							    -webkit-animation-name: reverse;
							    -moz-animation-name: reverse;
							    -o-animation-name: reverse;
							    animation-name: reverse;
							    color:#7fb3e2;
							    font-weight:normal;
							}

							@keyframes reverse {
							    from {
							        transform:rotate(0deg)
							    }
							    to {
							        transform:rotate(-360deg)
							    }
							}
							@-o-keyframes reverse {
							    from {
							        -o-transform:rotate(0deg)
							    }
							    to {
							        -o-transform:rotate(-360deg)
							    }
							}
							@-webkit-keyframes reverse {
							    from {
							        -webkit-transform:rotate(0deg)
							    }
							    to {
							        -webkit-transform:rotate(-360deg)
							    }
							}
							@-moz-keyframes reverse {
							    from {
							        -moz-transform:rotate(0deg)
							    }
							    to {
							        -moz-transform:rotate(-360deg)
							    }
							}

							@keyframes ColorChange {
							    0% {
							    	color:#1B9120;
							    }
							    16% {
							    	color:#7F00C6;
							    }
							    49% {
							        color:#0067C6;
							    }
							    82% {
							    	color:#1B9120;
							    }
							}
							@-o-keyframes ColorChange {
							    0% {
							    	color:#1B9120;
							    }
							    16% {
							    	color:#7F00C6;
							    }
							    49% {
							        color:#0067C6;
							    }
							    82% {
							    	color:#1B9120;
							    }
							}
							@-webkit-keyframes ColorChange {
							    0% {
							    	color:#1B9120;
							    }
							    16% {
							    	color:#7F00C6;
							    }
							    49% {
							        color:#0067C6;
							    }
							    82% {
							    	color:#1B9120;
							    }
							}
							@-moz-keyframes ColorChange {
							    0% {
							    	color:#1B9120;
							    }
							    16% {
							    	color:#7F00C6;
							    }
							    49% {
							        color:#0067C6;
							    }
							    82% {
							    	color:#1B9120;
							    }
							}
							</style>
			<?php
						}
					}
				}
			?>
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
		
		<!--SCRIPTS-->
			<?php wp_head(); ?>

		<!-- ICONS FONT FOR IE9 -->
			<!--[if lte IE 7]>
				<script src="<?php bloginfo('template_directory'); ?>/fonts/ie7.js"		type="text/javascript"></script>
				<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/fonts/ie7.css" />
			<![endif]-->

		<!-- HTML5 FOR IE9 -->
			<!--[if lt IE 9]>
				<script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
			<![endif]-->

		<!-- ANNOUNCE THAT IE ISN'T IDEAL - STYLES -->
		<!--[if IE]>
			<style>
				#ie-announcement {
					background: #7fb3e2;
					line-height:1.5;
					text-align:center;
					padding:10px;
					box-sizing:border-box;
					display:block;
				}
			</style>
		<![endif]-->

	</head>

<?php flush(); ?>

<!--		<BODY> START		-->

	<body class="<?php if (is_front_page()) : ?>front<?php else:?><?php endif; ?>">
		
			<!--TELL IE USERS THAT THE WEBSITE IS GOING TO LOOK WEIRD-->
			<!--[if IE]>
				<div id="ie-announcement">Hey! You're using Internet Explorer, which may cause our website to look funny!  The solution is to <a href="http://browsehappy.com/">try a different browser</a>.  <a href="http://blogs.computerworld.com/18552/12_reasons_not_to_use_internet_explorer_ever">Why?</a></div>
			<![endif]-->

		<div class="<?php if (is_front_page()) : ?>frontpage wrapper<?php else:?>normal wrapper<?php endif; ?>" id="page">

			<!--START - NAVIGATION-->

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
		
			<header id="menuwrap" class="custom-background">
				
				<div id="icon-nav">
					<div class="menu">
						<div class="logo">
							<a href="/" title="Titanium Robotics, FRC Team 1160">
								<img class="screen" src="<?php bloginfo('template_directory'); ?>/assets/titanium-robotics-logo-white.svg" style="margin-top:10px; height:74px" height="74" alt="logo-bird">
								<img class="print" src="<?php bloginfo('template_directory'); ?>/assets/logo.svg" style="height:2.5em" alt="logo-text" />
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
										<h3>
											<?php
												wp_title("", true);
											?>
										</h3>
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