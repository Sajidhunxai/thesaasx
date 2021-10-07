<?php
/**
 * TheSaaS-X back compat functionality
 *
 * Prevents TheSaaS-X from running on WordPress versions prior to 5.0,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 5.0.
 */

/**
 * Prevent switching to TheSaaS-X on old versions of WordPress.
 *
 * Switches to the default theme.
 */
function thesaasx_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'thesaasx_upgrade_notice' );
}
add_action( 'after_switch_theme', 'thesaasx_switch_theme' );


/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * TheSaaS-X on WordPress versions prior to 5.0.
 */
function thesaasx_upgrade_notice() {
	$message = sprintf( esc_html__( 'TheSaaS-X requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'thesaasx' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}


/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 5.0.
 */
function thesaasx_customize() {
	wp_die( sprintf( esc_html__( 'TheSaaS-X requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'thesaasx' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'thesaasx_customize' );


/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 5.0.
 */
function thesaasx_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'TheSaaS-X requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'thesaasx' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'thesaasx_preview' );
