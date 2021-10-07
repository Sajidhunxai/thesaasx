<?php
/**
 * Displays the blog widget area
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

?>

<aside class="sidebar px-4 py-md-0" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'thesaasx' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- .widget-area -->

