<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div class="search">
<input type="search" name="s" id="s" required="required" value="<?php the_search_query(); ?>" placeholder="I'm looking for. . ." />
</div>
</form>