<!DOCTYPE html>
<html lang="en-US">
	<head>
		<!--META-->
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0,">
			<meta name="keywords" content="robotics, FRC, Team 1160, FRC 1160, Titanium Robotics, Titanium FRC, Titanium 1160, Team Titanium, FRC Robotics, San Marino, San Marino High School, FRC Team 1160, Team 1160 FRC, San Marino Robotics, Firebird Robotics" />

		<!--TITLE-->
			<title><?php bloginfo('name'); ?> <?php wp_title('/'); ?></title>

		<!--LINKS-->
			<link rel="alternate" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
			<link rel="pingback"					href="<?php bloginfo('pingback_url'); ?>" />
			<link rel="icon"		type="application/rss+xml"	href="<?php bloginfo('template_directory') ?>/assets/favicon.ico" />

		<!--FONTS-->
			<link href='http://fonts.googleapis.com/css?family=Roboto:400italic,400,500,500italic,300,300italic,100,100italic' rel='stylesheet' type='text/css'>

		<!--CSS-->
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('stylesheet_url'); ?>" />
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/responsive-nav.css">
			<link rel="stylesheet"	type="text/css"	href="//cdn.moot.it/1/moot.css" />
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/team-1160-icons.css" />
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/forms.css" />
		
		<!--SCRIPTS-->
			<?php wp_head(); ?>
			<!-- READ MORE -->
			<script src="<?php bloginfo('template_directory');?>/js/readmorejavascript.js"	type="text/javascript"></script>
			<!-- RESPONSIVE VIDEOS -->
			<script src="<?php bloginfo('template_directory');?>/js/videoresize.js"			type="text/javascript"></script>
			<!-- NAVIGATION -->
			<script src="<?php bloginfo('template_directory');?>/js/responsive-nav.min.js"	type="text/javascript"></script>
			<!-- MOOT -->
			<script src="http://cdn.moot.it/1.0/moot.min.js"								type="text/javascript"></script>

			<!-- ICONS FONT FOR IE9 -->
			<!--[if lte IE 7]>
				<script src="<?php bloginfo('template_directory'); ?>/js/lte-ie7.js"		type="text/javascript"></script>
			<![endif]-->

			<!-- HTML5 FOR IE9 -->
			<!--[if lt IE 9]>
				<script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js"></script>
			<![endif]-->
		<?php if(is_front_page()) { ?>
			<link rel="stylesheet"	type="text/css"	href="<?php bloginfo('template_directory'); ?>/front-page.css" />
			<script src="http://www.blurjs.com/blur.min.js"	type="text/javascript"></script>
			<script type="text/javascript">
					$('.links').blurjs({
						source: '.wrapper',
						overlay: 'rgba(255,255,255,0.3)',
						radius:10
					});
			</script>
		<?php } ?>

		<!-- MOOT -->
			<style>
				.moot {
					font-size: 18px;
					max-width:none;
				}
				.m-page {
					padding-left:10px;
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
			<script>
				$('#vertical-toolbar').toolbar({
					content: '#user-toolbar-options', 
					position: 'left',
				});
			</script>
	</head>
<?php flush(); ?>

<!--		<BODY> START		-->

	<body class="<?php if (is_front_page()) : ?>front<?php else:?><?php endif; ?>">

		<div class="<?php if (is_front_page()) : ?>frontpage wrapper"><div class="blackout"><?php else:?>normal wrapper"><?php endif; ?>
		
			<!--START - NAVIGATION-->
		
			<header id="menuwrap">
				
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
							<div class="icon user">
								<a href="<?php echo get_admin_url(); ?>">
									<?php
										global $current_user;
										get_currentuserinfo();
										echo get_avatar( $current_user->ID, 60 );
									?>
								</a>
							</div>
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
								'menu_class'		=>	'',
							)
						);
					else:
						wp_nav_menu(
							array(
								'theme_location'	=>	'Main-Navigation',
								'container_id'		=>	'nav',
								'container_class'	=>	'navigation-links',
								'menu_id'			=>	'menu',
								'menu_class'		=>	'',
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
						<span style="font-size:4em; display:block;" title="Titanium Robotics" aria-hidden="true" data-icon="b">
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
		</div></div>
		<?php endif; ?>

	<?php if(!is_front_page() && !is_404()) : ?>
			<div id="subpages"><div class="limit">
				<div class="table">
					<div class="title">
						<ul><li><h1>
							<?php
								wp_title("", true);
							?>
						</h1></li></ul>
					</div>
	<?php if(!is_author() && !is_search() && !is_404() &&!is_home()) : ?>
			<?php
				if($post->post_parent)
				$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
				 else
				 $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
				if ($children) { 
					$parent_title = get_the_title($post->post_parent);?>
			<div class="links">
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
			<div class="links">
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