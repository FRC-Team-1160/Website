<?php

add_action( 'after_setup_theme', 'titanium_theme_setup' );

function titanium_theme_setup() {
	global $content_width;

	/* Set the $content_width for things such as video embeds. */
	if ( !isset( $content_width ) )
		$content_width = 600;

	/* Add theme support for automatic feed links. */	
	add_theme_support( 'automatic-feed-links' );

	/* Add theme support for post thumbnails (featured images). */
	add_theme_support( 'post-thumbnails' );

	/* Add theme support for custom backgrounds. */
	add_custom_background();

	/* Add your nav menus function to the 'init' action hook. */
	add_action( 'init', 'titanium_register_menus' );

	/* Add your sidebars function to the 'widgets_init' action hook. */
	add_action( 'widgets_init', 'titanium_register_sidebars' );

	/* Load JavaScript files on the 'wp_enqueue_scripts' action hook. */
	add_action( 'wp_enqueue_scripts', 'titanium_load_scripts' );

	/* Auto _blank target */
	add_filter('the_content', 'autoblank');

	/* Custom Login Logo */
	add_action('login_head', 'custom_login_logo');

	/* Add favicon to admin area */
	add_action('admin_head', 'titanium_admin_area_favicon');

	/* Add Action for login url */
	add_filter( 'login_headerurl', 'my_custom_login_url', 10, 4 );

	/* Add Search Support */
	add_action('wp_print_scripts', 'titanium_set_query');

	/* Search Where Function */
	add_filter('posts_where', 'filter_where');

	/* Add Footer Removal/replace */
	add_filter('admin_footer_text', 'remove_footer_admin');
}

function titanium_register_menus() {
	/* Register nav menus using register_nav_menu() or register_nav_menus() here. */
}

function titanium_register_sidebars() {
	/* Register dynamic sidebars using register_sidebar() here. */
	register_sidebars(1, array(
		'name' => 'Sidebar 1',
		'id' => 'sidebar1',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<fieldset><legend class="rounded">',
		'after_title' => '</legend></fieldset>',
	) );
	register_sidebars(1, array(
		'name' => 'Main Home Content',
		'id' => 'home',
		'before_widget' => '<div class="post"><div class="entry"><div class="cont">',
		'after_widget' => '<div class="clear"></div></div></div></div>',
		'before_title' => '<fieldset><legend class="rounded">',
		'after_title' => '</legend></fieldset>',
	) );
	register_sidebars(1, array(
		'name' => 'Home Page Column 1 (Left)',
		'id' => 'home_1',
		'before_widget' => '<div class="entry"><div class="cont">',
		'after_widget' => '<div class="clear"></div></div></div>',
		'before_title' => '<fieldset><legend class="rounded">',
		'after_title' => '</legend></fieldset>',
	) );
	register_sidebars(1, array(
		'name' => 'Home Page Column 2 (Center)',
		'id' => 'home_2',
		'before_widget' => '<div class="entry"><div class="cont">',
		'after_widget' => '<div class="clear"></div></div></div>',
		'before_title' => '<fieldset><legend class="rounded">',
		'after_title' => '</legend></fieldset>',
	) );
	register_sidebars(1, array(
		'name' => 'Home Page Column 3 (Right)',
		'id' => 'home_3',
		'before_widget' => '<div class="entry"><div class="cont">',
		'after_widget' => '<div class="clear"></div></div></div>',
		'before_title' => '<fieldset><legend class="rounded">',
		'after_title' => '</legend></fieldset>',
	) );
	register_sidebars(1, array(
		'name' => 'Home Page Sidebar',
		'id' => 'home_sidebar',
		'before_widget' => '<div class="entry"><div class="cont">',
		'after_widget' => '<div class="clear"></div></div></div>',
		'before_title' => '<fieldset><legend class="rounded">',
		'after_title' => '</legend></fieldset>',
	) );
}

function titanium_load_scripts() {
	/* Enqueue custom Javascript here using wp_enqueue_script(). */

	/* Load the comment reply JavaScript. */
	if ( is_singular() && get_option( 'thread_comments' ) && comments_open() )
		wp_enqueue_script( 'comment-reply' );
}

function autoblank($text) {
	$return = str_replace('<a', '<a target="_blank"', $text);
	return $return;
}

function custom_login_logo() {
	echo '<style type="text/css">
	h1 a {
	background-image: url('.get_bloginfo('template_directory').'/assets/logoupdown.png) !important;
	background-size: 250px 118px !important;
	height:118px !important;
	}
	 #login {
		 position:absolute!important;
		 top:0!important;
		 bottom:0!important;
		 left:0!important;
		 right:0!important;
		 margin:auto!important;
		 height:500px!important;
	 }
	</style>';
	echo '<link rel="icon" href="'.get_bloginfo('template_directory').'/assets/favicon.ico" />';

}

function titanium_admin_area_favicon() {
	$favicon_url = get_bloginfo('url') . '/favicon.ico';
	echo '<link rel="shortcut icon" href="'.get_bloginfo('template_directory').'/assets/favicon.ico" />';
}

function register_my_menus() {
	register_nav_menus(
		array(
			'About-Tab-1'   => __( 'Contact' ),
			'About-Tab-2'   => __( 'People' ),
			'About-Tab-3'   => __( 'Branding' ),
			'About-Tab-4'   => __( 'First' ),
			'About-Tab-5'   => __( 'Media' ),
			'Outreach-Tab'  => __( 'Outreach' ),
			'For-Members'   => __( 'Info for Members' ),
			'Join'			=> __( 'Join' ),
			'For-Teams'     => __( 'Team Information' ),
			'Main'          => __( 'Main' ),
		)
	);
}

function titanium_get_menu_name($location){
    if(!has_nav_menu($location)) return false;
    $menus = get_nav_menu_locations();
    $menu_title = wp_get_nav_menu_object($menus[$location])->name;
    return $menu_title;
}

function my_custom_login_url() {
	return site_url();
}

function is_sidebar_active($index) {
	global $wp_registered_sidebars;
	$widgetcolums = wp_get_sidebars_widgets();
	if ($widgetcolums[$index])
		return true;
	return false;
}

function titanium_set_query() {
  $query  = attribute_escape(get_search_query());

  if(strlen($query) > 0){
    echo '
      <script type="text/javascript">
        var titanium_query  = "'.$query.'";
      </script>
    ';
  }
}

function filter_where($where = '') {
	if ( is_search() ) {
		$exclude = array(1615);	

		for($x=0;$x<count($exclude);$x++){
		  $where .= " AND ID != ".$exclude[$x];
		}
	}
	return $where;
}

function the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
		echo get_settings('home');
		echo '">';
		bloginfo('name');
		echo "</a> / ";
		if (is_category() || is_single()) {
			the_category(' + ');
			if (is_single()) {
				echo " / ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
}

function remove_footer_admin (){
   global $current_user;
      get_currentuserinfo();
  echo 'Hello, ' . $current_user->user_firstname .' '. $current_user->user_lastname.'.  Welcome to the Titanium Robotics website!';
  echo '<br />For Team and Technical Contact: <a href="mailto:titaniumrobotics@gmail.com">Email</a> // <a href="https://docs.google.com/spreadsheet/viewform?formkey=dEE5SjJjckZkdGhFZVI1RHd4c0J6aUE6MQ#gid=0"> Report a Bug</a>';
}

?>