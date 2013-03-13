<div class="clear"></div>
<div id="sidebar" class="post">
<div class="entry">
<ul>
<fieldset><legend>Stuff</legend></fieldset>
<?php 
	if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar2')) : 
	else :
?>
<?php endif; ?>
</ul>
</div></div>