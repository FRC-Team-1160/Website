<?php
add_theme_support('post-thumbnails');
function autoblank($text) {
	$return = str_replace('<a', '<a target="_blank"', $text);
	return $return;
}
add_filter('the_content', 'autoblank');
function xtreme_enqueue_comments_reply() {
	if( get_option( 'thread_comments' ) )  {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'xtreme_enqueue_comments_reply' );
// custom admin login logo
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
}
add_action('login_head', 'custom_login_logo');
function custom_login() {
echo '<link rel="icon" href="'.get_bloginfo('template_directory').'/assets/favicon.ico" />';
}
add_action('login_head', 'custom_login');
function pa_admin_area_favicon() {
$favicon_url = get_bloginfo('url') . '/favicon.ico';
echo '<link rel="shortcut icon" href="'.get_bloginfo('template_directory').'/assets/favicon.ico" />';
}
add_action('admin_head', 'pa_admin_area_favicon');
add_filter( 'show_admin_bar', '__return_false' );
//this function will be called in the next section
function advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
      <?php delete_comment_link(get_comment_ID()); ?>
   <div class="comment-author vcard">
     <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
       <div class="comment-meta"><a href="<?php the_author_meta( 'user_url'); ?>"><?php printf(__('%s'), get_comment_author_link()) ?></a></div>
       <small style="font-weight:100;"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small>
     </div>
     <div class="clear"></div>
 
     <?php if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Your comment is awaiting moderation.') ?></em>
       <br />
     <?php endif; ?>
 
     <div class="comment-text">
         <?php comment_text() ?>
 
	    <div class="reply">
	      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	    </div>
     </div>
   <div class="clear"></div>
<?php }
function delete_comment_link($id) {
  		if (current_user_can('edit_post')) {
  				echo '<a id="button-left" class="settings-button pressed"><span></span></a>';
  				echo '<div id="user-toolbar-options">';
				echo '<a href="<?php echo get_comment_author_link( $comment_ID ); ?>"><i class="icon-user"></i></a>';
    			echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'"><i class="icon-trash"></i></a>';
    			echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'" style="text-align:right"><i class="icon-ban-circle"></i></a>';
    			echo '</div>';
		} else {
				echo '<div id="user-toolbar-options">';
				echo '<a href="<?php echo get_comment_author_link( $comment_ID ); ?>"><i class="icon-user"></i></a>';
    			echo '</div>';
		}
} ?>
<?php
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
      'Join'   => __( 'Join' ),
      'For-Teams'     => __( 'Team Information' ),
      'Main'          => __( 'Main' ),
    )
  );
}
function mf_get_menu_name($location){
    if(!has_nav_menu($location)) return false;
    $menus = get_nav_menu_locations();
    $menu_title = wp_get_nav_menu_object($menus[$location])->name;
    return $menu_title;
}
add_action( 'init', 'register_my_menus' );
function myFeedExcluder($query) {
 if ($query->is_feed) {
   $query->set('cat','-3');
 }
return $query;
}
function my_custom_login_url() {
  return site_url();
}
add_filter( 'login_headerurl', 'my_custom_login_url', 10, 4 );
 
add_filter('pre_get_posts','myFeedExcluder');

function update_caps() {
    $role = get_role( 'contributor' );

    $caps_to_add =  array(
        'read_private_posts',
	'read_private_pages',
    );

    foreach( $caps_to_add as $cap )
        $role->add_cap( $cap );
}
?><?php
function is_sidebar_active($index) {
	global $wp_registered_sidebars;
	$widgetcolums = wp_get_sidebars_widgets();
	if ($widgetcolums[$index])
		return true;
	return false;
}
function arphabet_widgets_init() {
	
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
add_action( 'widgets_init', 'arphabet_widgets_init' );
function hls_set_query() {
  $query  = attribute_escape(get_search_query());

  if(strlen($query) > 0){
    echo '
      <script type="text/javascript">
        var hls_query  = "'.$query.'";
      </script>
    ';
  }
}

function hls_init_jquery() {
  wp_enqueue_script('jquery');
}

add_action('init', 'hls_init_jquery');
add_action('wp_print_scripts', 'hls_set_query');
function filter_where($where = '') {
	if ( is_search() ) {
		$exclude = array(1615);	

		for($x=0;$x<count($exclude);$x++){
		  $where .= " AND ID != ".$exclude[$x];
		}
	}
	return $where;
}
add_filter('posts_where', 'filter_where');

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
add_action( 'init', 'create_forum_post_type' );

function create_forum_post_type() {
	register_post_type( 'forum_post', 
		array(
			'labels' => array(
                              'name' => __( 'Forum Posts' ),
                              'singular_name' => __( 'Forum Post' ),
                              'add_new' => __( 'Add New' ),
                              'add_new_item' => __( 'Add New Forum Post' ),
                              'edit' => __( 'Edit' ),
                              'edit_item' => __( 'Edit Forum Post' ),
                              'new_item' => __( 'New Forum Post' ),
                              'view' => __( 'View Forum Post' ),
                              'view_item' => __( 'View Forum Post' ),
                              'search_items' => __( 'Search Forum Posts' ),
                              'not_found' => __( 'No forum posts found' ),
                              'not_found_in_trash' => __( 'No forum posts found in Trash' ),
                              'parent' => __( 'Parent Forum Post' ),
                              'description' => __( 'Add a post to the forum for review by an admin.  Ask questions, post interesting articles, etc.' ),
                        ),
                        'public' => false,
                        'show_ui' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => true,
                        'menu_position' => 5,
                        'hierarchical' => true,
                        'query_var' => true,
                        
                        /* Global control over capabilities. */
                        'capability_type' => 'teamforum_post',
                        
                        /* Specific control over capabilities. */
                        'capabilities' => array(
                                'edit_post' => 'edit_teamforum_post',
                                'edit_posts' => 'edit_teamforum_posts',
                                'edit_others_posts' => 'edit_others_teamforum_posts',
                                'publish_posts' => 'publish_teamforum_posts',
                                'read_post' => 'read_teamforum_post',
                                'read_private_posts' => 'read_private_teamforum_posts',
                                'delete_post' => 'delete_teamforum_post',
                        ),
                        'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'comments' ),
                        'rewrite' => array( 'slug' => 'teamforum', 'with_front' => false ),
                        'taxonomies' => array( 'post_tag', 'category '),
                        'can_export' => true,
                        'permalink_epmask' => EP_PERMALINK,
		)
      );
}
function new_contactmethods( $contactmethods ) {
  $contactmethods['facebook'] = 'Facebook URL (include www, but not http://)';// Add Facebook
  $contactmethods['phone'] = 'Cell Phone Number';//Phone Number
  unset($contactmethods['yim']); // Remove Yahoo IM
  unset($contactmethods['aim']); // Remove AIM
  unset($contactmethods['jabber']); // Remove Jabber

return $contactmethods;
}

add_filter('user_contactmethods','new_contactmethods',10,1);
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Information Helpful to the Team</h3>

	<table class="form-table">
         
                <tr>
			<th><label for="school">School</label></th>

			<td>
                              <input type="text" name="school" id="school" value="<?php echo esc_attr( get_the_author_meta( 'school', $user->ID ) ); ?>" class="regular-text" />
                                <br />
				<span class="description">Please enter the abreviations for the school you are currently attending (SMHS for San Marino High, SPHS for South Pasadena High, etc.).</span>
			</td>
		</tr>

		<tr>
			<th><label for="year">Graduating Year</label></th>

			<td>
                           <?php 
                           //get dropdown saved value
                           $selected = get_the_author_meta( 'year', $user->ID );
                           ?>
                              <select type="text" name="year" id="year">
                                 <option value="– &infin; –" <?php echo ($selected == "– &infin; –")?  'selected="selected"' : '' ?>>– &infin; –</option>
                                 <option value="2012" <?php echo ($selected == "2012")?  'selected="selected"' : '' ?>>2012</option>
                                 <option value="2013" <?php echo ($selected == "2013")?  'selected="selected"' : '' ?>>2013</option>
                                 <option value="2014" <?php echo ($selected == "2014")?  'selected="selected"' : '' ?>>2014</option>
                                 <option value="2015" <?php echo ($selected == "2015")?  'selected="selected"' : '' ?>>2015</option>
                                 <option value="2016" <?php echo ($selected == "2016")?  'selected="selected"' : '' ?>>2016</option>
                                 <option value="2017" <?php echo ($selected == "2017")?  'selected="selected"' : '' ?>>2017</option>
                                 <option value="2018" <?php echo ($selected == "2018")?  'selected="selected"' : '' ?>>2018</option>
                                 <option value="2019" <?php echo ($selected == "2019")?  'selected="selected"' : '' ?>>2019</option>
                                 <option value="2020" <?php echo ($selected == "2020")?  'selected="selected"' : '' ?>>2020</option>
                                 <option value="2021" <?php echo ($selected == "2021")?  'selected="selected"' : '' ?>>2021</option>
                                 <option value="2022" <?php echo ($selected == "2022")?  'selected="selected"' : '' ?>>2022</option>
                                 <option value="2023" <?php echo ($selected == "2023")?  'selected="selected"' : '' ?>>2023</option>
                              </select>
                                <br />
				<span class="description">Please enter the year you plan to graduate from high school in.</span>
			</td>
		</tr>
                
                <tr>
                        <th><label for="avatar">Avatar</label></th>

			<td>
                           <div stye="float:left; display:inline;">
                           <?php global $current_user;
                                 get_currentuserinfo();
                                 echo get_avatar($current_user->ID);
                                 ?>
                           </div>
				<span class="description"><a href="http://www.gravatar.com">Visit Gravatar</a> and create an account to upload your own avatar or to change it.</span>
			</td>
		</tr>

	</table>
<?php }
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'year' to the field ID. */
	update_usermeta( $user_id, 'year', $_POST['year'] );
	update_usermeta( $user_id, 'school', $_POST['school'] );
}

// Prepend the new column to the columns array
function cb_user_extra_cols($cols) {
        //$screen = get_current_screen();
        //var_dump($screen);
        $cols['year']  = 'Year';        
        return $cols;
}
 
// Echo the ID for the new column
function cb_user_extra_col_value($val, $column_name, $user_id) {        
        $year_name = '';
        if ($column_name == 'year'){
            $user = get_userdata( $user_id );
    switch ($column_name) {
        case 'year':
            return $user->year;
            break;
        default:
            return '– &infin; –';
            break;
    }
    return $return;
}
}
function cb_user_extra_sortable_cols($columns) {
  //var_dump($columns);
  $custom = array(
      // meta column id => sortby value used in query
      'year'    => 'year',
  );
  return wp_parse_args($custom, $columns);
}
 
 
 
function cb_user_extra_orderby( $vars ) {
    if ( isset( $vars['orderby'] ) && 'year' == $vars['orderby'] ) {
            $vars = array_merge( $vars, array(
                    'meta_key' => 'year',
                    'orderby' => 'meta_value_num'
            ) );
    }
    return $vars;
}
 
function cb_user_extra_col()
{
    //manage_users_sortable_columns
    add_filter('manage_users_columns', 'cb_user_extra_cols');    
    add_action('manage_users_custom_column', 'cb_user_extra_col_value', 10, 3);
 
    add_filter( 'manage_users_sortable_columns', 'cb_user_extra_sortable_cols' );
    add_filter( 'request', 'cb_user_extra_orderby' );
}
add_action('admin_init', 'cb_user_extra_col');

function test_modify_user_table( $column ) {
    $column['profile'] = 'Profile';
 
    return $column;
}
 
add_filter( 'manage_users_columns', 'test_modify_user_table' );
 
function test_modify_user_table_row( $val, $column_name, $user_id ) {
    $user = get_user_by('login','loginname');
 
    switch ($column_name) {
        case 'profile' :
            return $user->ID;
            break;
 
        default:
    }
 
    return $return;
}
 
add_filter( 'manage_users_custom_column', 'test_modify_user_table_row', 10, 3 );
add_filter( 'manage_users_custom_column', 'test_modify_user_table_row', 10, 3 );

function remove_footer_admin (){
   global $current_user;
      get_currentuserinfo();
  echo 'Hello, ' . $current_user->user_firstname .' '. $current_user->user_lastname.'.  Welcome to the Titanium Robotics website!';
  echo '<br />For Team and Technical Contact: <a href="mailto:titaniumrobotics@gmail.com">Email</a> | <a href="/">Website</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
function contributors() {
global $wpdb;

$authors = $wpdb->get_results("SELECT * FROM $wpdb->users INNER JOIN $wpdb->usermeta ON ($wpdb->users.ID = $wpdb->usermeta.user_id) WHERE $wpdb->usermeta.meta_key = 'last_name' ORDER BY $wpdb->usermeta.meta_value ASC");

foreach ($authors as $author) {

echo "<li>";
echo "<a href=\"".get_bloginfo('url')."/author/";
the_author_meta('user_nicename', $author->ID);
echo "/\">";
echo get_avatar($author->ID);
echo '<div>';
echo "<b class='authorname'";
echo ">";
the_author_meta('user_firstname', $author->ID);
echo"&nbsp;";
the_author_meta('user_lastname', $author->ID);
echo "</b>";
echo "<br /><small><i>";
the_author_meta('school', $author->ID);
echo "&nbsp;class of&nbsp;";
the_author_meta('year', $author->ID);
echo "</i></small></div>";
echo "</a>";
echo "</li>";
}
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
 
function my_theme_wrapper_start() {
  echo '<div id="contents">
		<div class="full">
			<div class="post">
				<div class="entry">';
}
 
function my_theme_wrapper_end() {
  echo '</div></div></div></div>';
}
// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3;
	}
}
?>