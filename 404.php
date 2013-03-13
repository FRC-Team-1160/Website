<?php get_header(); ?>
<div id="contents">
<div class="errorpage">
	<div class="errorimg">
		<img src="<?php bloginfo('template_directory') ?>/assets/error404smaller.png" Alt="Iris the Robot" title="Iris the Robot" style="margin:auto; float:none; display:block;" />
	</div>
	<br />
	<div class="errortemp">
		<p><b>ERROR 404 – </b>The page you requested could not be found.</p>
		<br />
		<p>Seems like our robots weren't able to find that page. . .</p>
		&nbsp;
		<p>Perhaps you should try a search?</p>
		&nbsp;
		<div class="searchit">
		<?php get_search_form(); ?>
		</div>
		<div class="clear"></div>
		&nbsp;
		&nbsp;
		<p style="text-align:center; color:DIMGRAY; font-size:xx-small;">Artwork by <a href="http://www.itsallwong.com">Nathan Wong</a></p>
	</div>
</div>
</div>
<?php get_footer(); ?>