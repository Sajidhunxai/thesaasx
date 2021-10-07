<?php
/**
 * Template part for displaying posts in grid style.
 */

?>

<nav class="flexbox mt-6">
	<div>
		<?php previous_posts_link( '<i class="ti-arrow-left fs-9 mr-4"></i> Newer' ); ?>
	</div>
	<div>
		<?php next_posts_link( 'Older <i class="ti-arrow-right fs-9 ml-4"></i>' ); ?>
	</div>
</nav>
