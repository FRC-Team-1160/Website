<?php
/* MESSAGE */
/**
 * Generic function to show a message to the user using WP's 
 * standard CSS classes to make use of the already-defined
 * message colour scheme.
 *
 * @param $message The message you want to tell the user.
 * @param $errormsg If true, the message is an error, so use 
 * the red message style. If false, the message is a status 
  * message, so use the yellow information message style.
 *//*
function showMessage($message, $errormsg = false)
{
	if ($errormsg) {
		echo '<div id="message" class="error">';
	}
	else {
		echo '<div id="message" class="updated fade">';
	}

	echo "<p><strong>$message</strong></p></div>";
}    

/**
 * Just show our message (with possible checking if we only want
 * to show message to certain users.
 *//*
function showAdminMessages()
{
    // Shows as an error message. You could add a link to the right page if you wanted.
    showMessage("Hey there, you! You may notice that uploading images is weird. Yeah, well I made a small change to the way images are served and now it messed up the upload. I'm trying to figure it out, so just be patient! If you need to upload anything, I can do it manually via FTP, so just email me and we can figure something out! Thanks! <br />— Nathan ", true);
}

/** 
  * Call showAdminMessages() when showing other admin 
  * messages. The message only gets shown in the admin
  * area, but not on the frontend of your WordPress site. 
  *//*
add_action('admin_notices', 'showAdminMessages');     

/*************/
add_action( 'after_setup_theme', 'titanium_theme_setup' );

function titanium_theme_setup() {
	global $content_width;

	/* Set the $content_width for things such as video embeds. */
	if ( !isset( $content_width ) )
		$content_width = 600;

	/* Enque JQuery */
	if (!is_admin()) add_action("wp_enqueue_scripts", "titanium_jquery_enqueue", 1);

	/* CUSTOM BACKGROUNDS */
	$defaults = array(
		'default-color'          => '0067c6',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);

	/* Custom Post Type */
	add_action( 'init', 'titanium_post_types' );

	/* Add theme support for automatic feed links. */	
	add_theme_support( 'automatic-feed-links' );

	/* Add theme support for post thumbnails (featured images). */
	add_theme_support( 'post-thumbnails' );

	/* Add theme support for custom backgrounds. */
	add_theme_support( 'custom-background', $defaults );

	/* Add your nav menus function to the 'init' action hook. */
	add_action( 'init', 'titanium_register_menus' );

	/* Get Menu Names */
	add_action( 'init', 'titanium_get_menu_name' );

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

	/* Add Excerpt Support on Pages */
	add_post_type_support('page', 'excerpt');

	/* REMOVE DEFAULT GALLERY STYLES */
	add_filter( 'use_default_gallery_style', '__return_false' );

	// CUSTOM POST TYPE HACK FOR IFTTT
	add_filter('wp_insert_post_data', 'redirect_xmlrpc_to_custom_post_type', 99, 2);
	
	// ADD A CUSTOM TAXONOMY
	add_action( 'init', 'create_forum_taxonomies', 0 );
}

function titanium_post_types() {
	register_post_type( 'press', 
		array(
			'labels' => array(
				'name' => __( 'Press Releases' ),
				'singular_name' => __( 'Press Release' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Press Release' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Press Release' ),
				'new_item' => __( 'New Press Release' ),
				'view' => __( 'View Press Release' ),
				'view_item' => __( 'View Press Release' ),
				'search_items' => __( 'Search Press Releases' ),
				'not_found' => __( 'No Press Releases found' ),
				'not_found_in_trash' => __( 'No Press Releases found in Trash' ),
				'parent' => __( 'Parent Press Release' ),
			),
			'supports' => array(
				'title',
				'author',
				'excerpt',
				'editor',
				'thumbnail',
				'revisions'
			),
			'public' => true,
			'rewrite' => array( 'slug' => 'press-release', 'with_front' => false ),
			'taxonomies' => array( 'post_tag', 'category '),
			'can_export' => true,
			'menu_icon' => 'dashicons-megaphone',
		)
	);
	register_post_type( 'Mentors', 
		array(
			'labels' => array(
				'name' => __( 'Mentors' ),
				'singular_name' => __( 'Mentor' ),
				'add_new' => __( 'Add New Mentor Profile' ),
				'add_new_item' => __( 'Add New Mentor' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Profile' ),
				'new_item' => __( 'New Profile' ),
				'view' => __( 'View Profile' ),
				'view_item' => __( 'View Profile' ),
				'search_items' => __( 'Search Profiles' ),
				'not_found' => __( 'No Profiles Found' ),
				'not_found_in_trash' => __( 'No Profiles found in Trash' ),
				'parent' => __( 'Parent Profile' ),
			),
			'supports' => array(
				'title',
				'author',
				'excerpt',
				'editor',
				'thumbnail',
				'revisions'
			),
			'public' => true,
			'rewrite' => array( 'slug' => 'mentor', 'with_front' => false ),
			'taxonomies' => array( 'post_tag', 'category '),
			'can_export' => true,
			'menu_position' => 100,
			'menu_icon' => 'dashicons-businessman',
		)
	);
	register_post_type( 'videos', 
		array(
			'labels' => array(
				'name' => __( 'Videos' ),
				'singular_name' => __( 'video' ),
				'add_new' => __( 'Add New video' ),
				'add_new_item' => __( 'Add New video' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit video' ),
				'new_item' => __( 'New video' ),
				'view' => __( 'View videos' ),
				'view_item' => __( 'View video' ),
				'search_items' => __( 'Search videos' ),
				'not_found' => __( 'No videos Found' ),
				'not_found_in_trash' => __( 'No videos found in Trash' ),
				'parent' => __( 'Parent video' ),
			),
			'supports' => array(
				'title',
				'author',
				'excerpt',
				'editor',
				'thumbnail',
				'revisions'
			),
			'public' => true,
			'rewrite' => array( 'slug' => 'video', 'with_front' => false ),
			'taxonomies' => array( 'post_tag', 'category '),
			'can_export' => true,
			'menu_icon' => 'dashicons-video-alt2',
		)
	);
	register_post_type( 'cabinet', 
		array(
			'labels' => array(
				'name' => __( 'Leadership' ),
				'singular_name' => __( 'Leadership' ),
				'add_new' => __( 'Add New Leadership Member' ),
				'add_new_item' => __( 'Add New Leadership Member' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Leadership Member' ),
				'new_item' => __( 'New Leadership Member' ),
				'view' => __( 'View Leadership Members' ),
				'view_item' => __( 'View Leadership Member' ),
				'search_items' => __( 'Search Leadership Members' ),
				'not_found' => __( 'No Members Found' ),
				'not_found_in_trash' => __( 'No Members found in Trash' ),
				'parent' => __( 'Parent Leadership Member' ),
			),
			'supports' => array(
				'title',
				'author',
				'excerpt',
				'editor',
				'thumbnail',
				'revisions'
			),
			'public' => true,
			'rewrite' => array( 'slug' => 'team-leadership', 'with_front' => false ),
			'taxonomies' => array( 'post_tag', 'category '),
			'can_export' => true,
			'menu_position' => 100,
			'menu_icon' => 'dashicons-groups',
			'capability_type' => 'leader',

		)
	);
	register_post_type( 'forum', 
		array(
			'labels' => array(
				'name' => __( 'Forums' ),
				'singular_name' => __( 'Forum' ),
				'add_new' => __( 'Add New Forum' ),
				'add_new_item' => __( 'Add New Forum' ),
				'edit' => __( 'Edit Forum' ),
				'edit_item' => __( 'Edit Forum' ),
				'new_item' => __( 'New Forum' ),
				'view' => __( 'View Forum' ),
				'view_item' => __( 'View Forum' ),
				'search_items' => __( 'Search Forums' ),
				'not_found' => __( 'No Forums Found' ),
				'not_found_in_trash' => __( 'No Forums found in Trash' ),
				'parent' => __( 'Parent Forum' ),
			),
			'supports' => array(
				'title',
				'author',
				'excerpt',
				'editor',
				'thumbnail',
				'revisions',
				'page-attributes',
				'comments'
			),
			'public' => true,
			'rewrite' => array( 'slug' => 'forum', 'with_front' => false ),
			'taxonomies' => array( 'post_tag', 'category '),
			'can_export' => true,
			'menu_icon' => 'dashicons-text',
			'hierarchical' => true,
			'capability_type' => 'forum',
			'capabilities' => array(
				'publish_posts' => 'publish_forums',
				'edit_posts' => 'edit_forums',
				'edit_others_posts' => 'edit_others_forums',
				'delete_posts' => 'delete_forums',
				'delete_others_posts' => 'delete_others_forums',
				'read_private_posts' => 'read_private_forums',
				'edit_post' => 'edit_forum',
				'delete_post' => 'delete_forum',
				'read_post' => 'read_forum',
			),

		)
	);
}
function ti_stop_guests( ) {
    global $post;

    if ( $post->post_type == 'forum' ) {
        if ( !is_user_logged_in() ) {
        	auth_redirect();
        }
    }
}

add_action('get_header', 'ti_stop_guests');

add_filter( 'map_meta_cap', 'my_map_meta_cap', 10, 4 );

function my_map_meta_cap( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a forum, get the post and post type object. */
	if ( 'edit_forum' == $cap || 'delete_forum' == $cap || 'read_forum' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a forum, assign the required capability. */
	if ( 'edit_forum' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a forum, assign the required capability. */
	elseif ( 'delete_forum' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private forum, assign the required capability. */
	elseif ( 'read_forum' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

// create two taxonomies, genres and writers for the post type "forum"
function create_forum_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Topics', 'taxonomy general name'),
		'name_colon'		=> __( 'Topic:' ),
		'singular_name'     => _x( 'Topic', 'taxonomy singular name'),
		'search_items'      => __( 'Search Topics' ),
		'all_items'         => __( 'All Topics' ),
		'parent_item'       => __( 'Parent Topic Cateogry' ),
		'parent_item_colon' => __( 'Parent Topic Category:' ),
		'edit_item'         => __( 'Edit Topic Category' ),
		'update_item'       => __( 'Update Topic Category' ),
		'add_new_item'      => __( 'Add New Topic Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Topic Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'topic' ),
	);

	register_taxonomy( 'topics', array( 'forum' ), $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	/*$labels = array(
		'name'                       => _x( 'Writers', 'taxonomy general name' ),
		'singular_name'              => _x( 'Writer', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Writers' ),
		'popular_items'              => __( 'Popular Writers' ),
		'all_items'                  => __( 'All Writers' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Writer' ),
		'update_item'                => __( 'Update Writer' ),
		'add_new_item'               => __( 'Add New Writer' ),
		'new_item_name'              => __( 'New Writer Name' ),
		'separate_items_with_commas' => __( 'Separate writers with commas' ),
		'add_or_remove_items'        => __( 'Add or remove writers' ),
		'choose_from_most_used'      => __( 'Choose from the most used writers' ),
		'not_found'                  => __( 'No writers found.' ),
		'menu_name'                  => __( 'Writers' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'writer' ),
	);

	register_taxonomy( 'writer', 'forum', $args );*/
}
	register_taxonomy_for_object_type( 'Topics', 'forum' );

function titanium_jquery_enqueue() {
	 wp_deregister_script('jquery');
	 wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null, true);
	 wp_enqueue_script('jquery');
}

function titanium_register_menus() {
	/* Register nav menus using register_nav_menu() or register_nav_menus() here. */
	register_nav_menus(
		array(
			'Main-Navigation'   => __( 'Main' ),
		)
	);
}

function titanium_get_menu_name($location){
	if(!has_nav_menu($location)) return false;
	$menus = get_nav_menu_locations();
	$menu_title = wp_get_nav_menu_object($menus[$location])->name;
	return $menu_title;
}

function titanium_register_sidebars() {
	/* Register dynamic sidebars using register_sidebar() here. */
	register_sidebars(1, array(
		'name' => 'Right Sidebar',
		'id' => 'sidebar_right',
		'before_widget' => '<div class="entry"><div class="cont">',
		'after_widget' => '<div class="clear"></div></div></div>',
		'before_title' => '<fieldset class="title"><legend class="rounded">',
		'after_title' => '</legend></fieldset>',
		)
	);
	register_sidebars(1, array(
		'name' => 'Left Sidebar',
		'id' => 'sidebar_left',
		'before_widget' => '<div class="entry"><div class="cont">',
		'after_widget' => '<div class="clear"></div></div></div>',
		'before_title' => '<fieldset class="title"><legend class="rounded">',
		'after_title' => '</legend></fieldset>',
		)
	);
	register_sidebars(1, array(
		'name' => 'forummarks Bar',
		'id' => 'forummarks',
		'before_widget' => '<div class="cont">',
		'after_widget' => '<div class="clear"></div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		)
	);
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

	::selection {
		background: #005aae;
		color:#fff;
		text-shadow:none
	}
	::-moz-selection {
		background: #005aae;
		color:#fff;
		text-shadow:none
	}
	.login {
		 background:url(/ti-static/uploads/2014/02/DSC_0111.jpg)!important;
		 background-size:cover!important;
	}
	.login label {
		color:#FFF;
	}
	h1 a {
		background-image: url(/ti-static/logos/logo.svgz) !important;
		background-size: auto 134px!important;
		height:150px !important;
		width:100% !important;
	}
	.login form {
		-webkit-box-shadow:none!important;
		box-shadow:none!important;
		margin:0 !important;
		-webkit-border-radius:0!important;
		border-radius:0!important;
		border:none!important;
		padding:0 0 10px!important;
		background:none!important;
	}
	.login form .input, .login input[type="text"] {
		border-width:1px!important;
		border-style:solid!important;
		border-color:#CACACA!important;
	}
	#login #login_error, #login .message {
		margin-left:0 !important;
		position:absolute;
		left:-240px;
		width:200px;
	}
	 #login {
		 position:absolute!important;
		 left:0!important;
		 right:0!important;
		 top:0 !important;
		 bottom:0 !important;
		 height:410px!important;
		 width:283px;
		 margin:auto!important;
		 padding:26px 24px!important;
		 background: rgba(0, 103, 198, 0.5);
		 border:0.75em solid #FFF;
	 }
	 .login #nav, .login #backtoblog {
		text-shadow:none;
		margin:0 !important;
		padding:0 !important;
	 }
	 #backtoblog {
		padding:12px 0 0 !important;
	}
	 @media only all and (max-height:490px) {
	 	body {
	 		height:auto!important;
	 	}
		#login {
			position:relative !important;
			margin-top:0!important;
		}
	 }
	 @media only all and (max-width:740px) {
		#login #login_error, #login .message {
			margin-left:0 !important;
			position:relative;
			left:0;
			width:auto;
		}
		#login {
			height:446px;
		}
	 }
	 .wp-core-ui .button-primary {
	 	background:none;
	 	border:2px solid #FFF;
	 	color:#FFF !important;
	 	box-shadow:none!important;
	 }
	 .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover{
	 	background:none !important;
	 	color:#0082f9!important;
	 	border-color:#0082f9!important;
	 }
	 .wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large {
	 	height:33px!important;
	 }
	 input[type=checkbox]:checked:before {
	 	color:#0067C6!important;
	 }
	</style>';
	echo '<link rel="icon" href="'.get_bloginfo('template_directory').'/assets/favicon.ico" />';
	echo '<link rel="stylesheet" href="'.get_bloginfo('template_directory').'/forms.css" />';

}

function titanium_admin_area_favicon() {
	$favicon_url = get_bloginfo('url') . '/favicon.ico';
	echo '<link rel="shortcut icon" href="'.get_bloginfo('template_directory').'/assets/favicon.ico" />';
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
	echo '<br />For Team and Technical Contact: <a href="mailto:titaniumrobotics@gmail.com">Email</a> // <a href="https://github.com/FRC-Team-1160/Website/issues"> Report a Bug</a>';
}

function redirect_xmlrpc_to_custom_post_type ($data, $postarr) {
    // This function detects a XML-RPC request and modifies it before posting

    $p2_custom_post_type = 'videos'; // Define your Custom post type

    if (defined('XMLRPC_REQUEST') || defined('APP_REQUEST')) {
        $data['post_type'] = $p2_custom_post_type; // sets the request post type to custom post type instead of the default 'Post'.
        return $data;
    }
    return $data;

}
function filter_ptags_on_images($content){
    return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

function wp_new_excerpt($text)
{
	if ($text == '')
	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text);
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 40);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '. . .');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_new_excerpt');


//**************************************************************************************


//THIS IS FOR SELECTING PRIVATE PAGES AS PARENTS! DELETE AFTER IT IS FIXED!!!
function admin_private_parent_metabox($output)
{
	global $post;

	$args = array(
		'post_type'			=> $post->post_type,
		'exclude_tree'		=> $post->ID,
		'selected'			=> $post->post_parent,
		'name'				=> 'parent_id',
		'show_option_none'	=> __('(no parent)'),
		'sort_column'		=> 'menu_order, post_title',
		'echo'				=> 0,
		'post_status'		=> array('publish', 'private'),
	);

	$defaults = array(
		'depth'					=> 0,
		'child_of'				=> 0,
		'selected'				=> 0,
		'echo'					=> 1,
		'name'					=> 'page_id',
		'id'					=> '',
		'show_option_none'		=> '',
		'show_option_no_change'	=> '',
		'option_none_value'		=> '',
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	$pages = get_pages($r);
	$name = esc_attr($name);
	// Back-compat with old system where both id and name were based on $name argument
	if (empty($id))
	{
		$id = $name;
	}

	if (!empty($pages))
	{
		$output = "<select name=\"$name\" id=\"$id\">\n";

		if ($show_option_no_change)
		{
			$output .= "\t<option value=\"-1\">$show_option_no_change</option>";
		}
		if ($show_option_none)
		{
			$output .= "\t<option value=\"" . esc_attr($option_none_value) . "\">$show_option_none</option>\n";
		}
		$output .= walk_page_dropdown_tree($pages, $depth, $r);
		$output .= "</select>\n";
	}

	return $output;
}
add_filter('wp_dropdown_pages', 'admin_private_parent_metabox');
?>