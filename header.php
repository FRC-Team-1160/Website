<!DOCTYPE html>
<html lang="en-US">
	<head>
		<!--META-->
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0,">
			<meta name="keywords" content="robotics, FRC, Team 1160, FRC 1160, Titanium Robotics, Titanium FRC, Titanium 1160, Team Titanium, FRC Robotics, San Marino, San Marino High School, FRC Team 1160, Team 1160 FRC, San Marino Robotics, Firebird Robotics" />
			<meta name="description" content="Titanium Robotics is an FRC robotics team dedicated to teaching real-life applications and furthering STEM education through experiences that cannot be taught in a regular classroom environment." />

		<!--TITLE-->
			<title><?php wp_title('&nbsp;//&nbsp;', true, 'right'); bloginfo('name', '//'); ?></title>

		<!--LINKS-->
			<link rel="alternate"	title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
			<link rel="pingback"					href="<?php bloginfo('pingback_url'); ?>" />
			<link rel="icon"		type="application/rss+xml"	href="<?php bloginfo('template_directory') ?>/assets/favicon.ico" />
			<!-- APPLE TOUCH ICONS -->
				<link rel="apple-touch-icon" href="/ti-static/logos/apple-touch-icons/touch-icon-iphone.png">
				<link rel="apple-touch-icon" sizes="76x76" href="/ti-static/logos/apple-touch-icons/touch-icon-ipad.png">
				<link rel="apple-touch-icon" sizes="120x120" href="/ti-static/logos/apple-touch-icons/touch-icon-iphone-retina.png">
				<link rel="apple-touch-icon" sizes="152x152" href="/ti-static/logos/apple-touch-icons/touch-icon-ipad-retina.png">

		<!--TITANIUM ROBOTICS LOGO || USES REL=LOGO (RELOGO.ORG) FOR MAINTAINING THE LOGO-->
			<link rel="logo"
				type="image/svg"
				href="/ti-static/logos/logo.svgz" />
		<!--SCRIPTS-->
			<?php wp_head(); ?>

			<!-- NAVIGATION -->
				<script src="<?php bloginfo('template_directory');?>/js/responsive-nav.min.js?ver=2"	type="text/javascript" async></script>

			<!-- SMOOTH SCROLL -->
				<script src="<?php bloginfo('template_directory');?>/js/smoothscroll.js"		type="text/javascript" async></script>

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

<!--CSS-->
			
			<style>
				.print {
					display:none;
					visibility:hidden;
				}
			</style>

		<!--MAIN STYLESHEET-->
			<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('stylesheet_url'); ?>" /> <!-- NO VERSIONING HERE BECAUSE IT SHOULD REMAIN THE SAME -->
	
			<?php if(is_front_page()) { ?>
				<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/front-page.css?ver=2.11.4" />
			<?php } ?>
			<link property="stylesheet" rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/responsive-nav.css">

			<?php if(is_page('forum')) : ?>
				<style>
					.topics {
						list-style-type:none;
						width:100%;
						padding:1rem;
					}
					.topics ul li {
						list-style-type:none;
					}
					.topics ul li:nth-of-type(odd) {
						background:#D2D2D2;
					}
					.topics ul li a {
						border:none;
						width:100%;
						padding:1rem;
					}
				</style>
			<?php endif; ?>
			<?php if(is_page_template('albums.php')) { ?>
				<style>
					img.alignleft, .alignleft {
						float:left;
						padding:0.5em!important;
						box-sizing:border-box;
						margin:0!important;
						width:33.3333333333333333%!important;
					}
					.wp-caption-text {
						font-size:1em!important;
						color: #484848;
						font-weight:bold;
						text-align:left;
					}
						@media screen and (max-width: 720px) {

							img.alignleft, .alignleft {
								width:50%!important;
								float:left!important;
								margin:0;
							}
						}
						@media screen and (max-width:360px) {
							img.alignleft, .alignleft {
								float:none!important;
								margin:auto!important;
								width:100%!important;
							}
						}
				</style>
			<?php }?>
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
	</head>

<?php flush(); ?>

<!--		<BODY> START		-->

	<body class="<?php if (is_front_page()) : ?>front<?php elseif(is_attachment()):?>attachments<?php else: endif; ?>">

			<!--TELL IE USERS THAT THE WEBSITE IS GOING TO LOOK WEIRD-->
			<!--[if IE]>
				<div id="ie-announcement">Hey! You're using Internet Explorer, which may cause our website to look funny!  The solution is to <a href="http://browsehappy.com/">try a different browser</a>.  <a href="http://blogs.computerworld.com/18552/12_reasons_not_to_use_internet_explorer_ever">Why?</a></div>
			<![endif]-->
<?php if(!is_attachment()) { ?>
<?php // FEATURED IMAGE
	if (!is_home()) {
		global $post;
				if(has_post_thumbnail( $post_id )) {

					$post_image_id = get_post_thumbnail_id($post_to_use->ID);

					if ($post_image_id) {

						$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
						if ($thumbnail) (string)$thumbnail = $thumbnail[0];

					}
				}

				if (!empty($thumbnail)) {
?>
				<div class="featured-image screen" style="background-image: url('<?php echo $thumbnail; ?>')!important;"></div>

<?php }// if it has a thumbnail
	}//if it isn't the blog index ?>

		<div class="<?php if (is_front_page()) : ?>frontpage wrapper<?php else:?>normal wrapper<?php endif; ?>" id="page">

			<!--START - NAVIGATION-->

			<header id="menuwrap" class="custom-background">
				<div class="border">
				<div id="icon-nav">
					<div class="menu">
						<div class="logo">
							<a href="/" title="Titanium Robotics, FRC Team 1160">
								<img class="logo-screen" src="/ti-static/logos/logo.svgz" alt="logo-bird">
							</a>
							<div class="menu-right screen">
								<div class="icon">
									<a href="#" id="toggle" style="border:none" title="Open Menu" >
										<img style="height:20px;" src="/ti-static/site/theme-Ti-22/assets/ui/ui-menu.svg?ver=4.2">
									</a>
								</div>
							</div>
						</div>
						<?php /*SEARCH BAR? MAKE THE LOGO CLASS LEFT TEXT-ALIGN <span style="float:right;width: 33%;"><form style="
											    margin: 1rem 1.5rem;
											"><input type="search" style="
											    height: 100px;
											    background: none;
											    border: none;
											    border-bottom: 1px solid #0067c6;
											    box-shadow: none;
											    border-radius: 0;
											    -webkit-appearance: none;
											    width: 100%;
											    font-size: 1.5rem;
											    text-transform: uppercase;
											    font-weight: bold;
											" placeholder="i'm looking for. . ."></form></span>*/ ?>
					</div>

				</div>
					<div class="nav screen" id="nav">
						<?php
							wp_nav_menu(
								array(
									'theme_location'	=>	'Main-Navigation',
									'menu_class'		=>	'ti22 menu-1',
								)
							);
						?>
						<div class="login screen">
									<?php if(is_user_logged_in()) {

									}
									else {
									wp_loginout( get_permalink() );

									}
									?>
						</div>
						<div class="clear"></div>
					</div>
				</div>
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
		<?php if(!is_author() && !is_search() && !is_404() &&!is_home() && !is_category()) : ?>
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
					<ul class="sublinks">
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
		<?php if(is_single() && 'forum'!==get_post_type()) : ?>
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
<?php } else { ?>
	<div id="close">
		<a href="<?php print $_SERVER['HTTP_REFERER'];?>">
			<span class="team1160-delete-outline"></span>
		</a>
	</div>
<?php } ?>


<?php //FEATURED IMAGE-CONTINUED (TITLE OF PAGE)
	if(!(is_home() || is_page_template('home-page.php'))) {
		if(!empty($thumbnail)) {
			?>
						<div class="thumbnail">
							<span>
								<h1>
									<?php the_title(); ?>
								</h1>
							</span>
						</div>

			<?php
	}
		}//if isn't a blog page and if has a thumbnail
?>