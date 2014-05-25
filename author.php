<?php get_header(); ?>
<?php if ( is_user_logged_in() ) { ?>
<!-- This sets the $curauth variable -->
<?php
if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name);
else :
$curauth = get_userdata(intval($author));
endif;
?>
<div class="contents">
<!-- START - ABOUT AUTHOR -->
    <div class="post"><div class="post-content"><div class="entry">
<fieldset>
<legend>
About <?php echo $curauth->first_name; echo ' '. $curauth->last_name; echo ' ('. $curauth->nickname .')'; ?>
</legend>
</fieldset>
		<div class="profilepic">
		<?php
			echo get_avatar( $curauth->ID );
			?>
		</div>
<table class="profiletable">
    <th class="first">Academic</th>
    <tr>
        <td class="title">
            School
        </td>
        <td>
            <?php echo $curauth->school; ?>
        </td>
    </tr>
    <tr>
        <td class="title">
            Graduating Class
        </td>
        <td>
            <?php echo $curauth->year; ?>
        </td>
    </tr>
    <th>Online Role</th>
    <tr>
        <td class="title">
            Role
        </td>
        <td>
            <?php
			$user_roles = $curauth->roles;
			$user_role = array_shift($user_roles);
		    
			if ($user_role == 'administrator') {
			    echo 'An Administrator';
			} elseif ($user_role == 'editor') {
			    echo 'Website Editor';
			} elseif ($user_role == 'author') {
			    echo 'Website Author';
			} elseif ($user_role == 'contributor') {
			    echo 'Team Member';
			} elseif ($user_role == 'subscriber') {
			    echo 'Subscriber';
			} else {
			    echo "$user_role";
			}
            ?>
        </td>
    </tr>
    <th>Contact</th>
    <tr>
        <td class="title">
            Email
        </td>
        <td>
            <a href="mailto:<?php echo $curauth->user_email; ?>"><?php echo $curauth->user_email; ?></a>
        </td>
    </tr>
    <tr>
        <td class="title">
            Facebook URL
        </td>
        <td>
            <a href="http://<?php echo $curauth->facebook; ?>">Go To Profile</a>
        </td>
    </tr>
    <th>About</th>
    <tr>
        <td class="title">
            Bio
        </td>
        <td>
            <?php echo $curauth->user_description; ?>
        </td>
    </tr>
</table>
<div class="clear"></div>
</div></div></div>
<!-- END - ABOUT AUTHOR -->
<!-- START - POSTS -->
<div class="post"><div class="post-content"><div class="entry">
<fieldset>
<legend>
Posts by <?php echo $curauth->nickname; ?>
</legend>
</fieldset>
<div class="authorsposts">
<ul>
<!-- The Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<img src="<?php echo $image[0]; ?>" />
<?php endif; ?>
<?php the_title(); ?></a>
<br />
<?php the_time('d M Y'); ?> in <?php the_category('&');?>
</li>
<?php endwhile; else: ?>
<p><?php _e('No posts by this author.'); ?></p>
<?php endif; ?>
<!-- End Loop -->
</ul>
</div>
<div class="clear"></div>
</div>
</div>
</div>
<!-- END - POSTS -->
<!-- START - OTHERS -->
<div class="post"><div class="post-content"><div class="entry">
<fieldset>
<legend>
Other Users
</legend>
</fieldset>
<div id="authorlist"><ul class="profiles"><?php contributors(); ?></ul></div>
</div>
</div>
</div>
</div>
<!-- END - OTHERS -->
<!-- START - ELSE -->
<?php } else{ ?>
<div class="contents">
    <div class="post"><div class="post-content"><div class="entry">
    Please log in to view this page.
    </div>
    </div>
    </div></div>
<?php }?>
<!-- END - ALL -->
<?php get_footer(); ?>