<?php get_header(); ?>
<div id="attachments">
	<div class="image">
		<?php echo wp_get_attachment_image($attachment_id, 'full', $icon, $attr); ?>
	</div>
	<div class="download-links">
		<a href="<?php echo wp_get_attachment_url( $id ); ?>" download>
			<span style="color:#444; font-size:2em; padding:0.5em; float:right;" class="team1160-download-outline"></span>
		</a>
		<div class="clear"></div>
	</div>
		<div class="clear"></div>
</div>
<?php get_footer(); ?>