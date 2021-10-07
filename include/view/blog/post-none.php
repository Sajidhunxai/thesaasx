<?php
/**
 * Template part for displaying not found content.
 */

if ( is_search() ) :
?>
	<div class="col-md-8 mx-auto">
		<p class="text-center"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'thesaasx' ); ?></p>
		<br>
		<?php get_search_form(); ?>
	</div>
<?php else : ?>
	<div class="col-md-8 mx-auto">
		<p class="text-center"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'thesaasx' ); ?></p>
		<br>
		<?php get_search_form(); ?>
	</div>
<?php
endif;
