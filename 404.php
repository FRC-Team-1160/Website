<?php get_header(); ?>
<div class="contents">
	<div class="post">
		<div class="post-content">
			<div class="entry">
				<div class="errorimg">
					<img src="<?php bloginfo('template_directory') ?>/assets/error404smaller.png" Alt="Robot" title="Robot" style="margin:auto; float:none; display:block;" />
					<p style="font-size:small; color:DIMGRAY; text-align:center;">Artwork by <a href="http://www.itsallwong.com">Nathan Wong</a></p>
				</div>

				<div class="errortemp">
					<h2><b style="color:#f14a29;">Error 404: </b>
						We sincerely appologize, but it seems as if the page you requested could not be found or the link you followed has expired.</h2>
					<h4>The issue at hand is neither spacey-wacey nor timey-wimey, so don't panic.</h4>
					<p>Perhaps you should try a search?</p>
					<div class="searchit">
					<?php get_search_form(); ?>
					</div>
					<div class="clear"></div>
				</div>

				<div class="clear"></div>

			</div>
		</div>
	</div>
<?php get_footer(); ?>