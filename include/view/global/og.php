
<?php

if ( is_single() || is_page() ) {
	global $post;
	setup_postdata($post);
	$og_image = get_the_post_thumbnail_url( null, 'thesaasx-og-image' );
	$title = wp_strip_all_tags( get_the_title() );
	$description = wp_strip_all_tags( get_the_excerpt() );
	$description = substr($description, 0, 500);
	if ( ! empty( $og_image ) ) {
	?>
	<!--  Open Graph Tags -->
	<meta property="og:title" content="<?php echo esc_attr( $title ) ?>">
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $og_image ); ?>">
	<meta property="og:url" content="<?php echo esc_url( get_permalink() ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<?php
	}
	wp_reset_postdata();
}

?>
