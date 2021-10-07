<?php
/**
 * Plugin Name: TheSaaS X
 * Plugin URI: http://thetheme.io/thesaasx
 * Description: An exclusive and required plugin for TheSaaS-X theme.
 * Author: TheThemeio
 * Author URI: https://thetheme.io/
 * Version: 1.1.4
 * License: ISC
 * License URI: https://opensource.org/licenses/ISC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// Bail if "TheSaaS-X" is not the active theme.
//
$theme = wp_get_theme();
$theme_name = strtolower( $theme->get( 'Name' ) );
// if ( $theme_name !== 'thesaasx' && $theme_name !== 'thesaasx-child' ) {
// 	return;
// }


define( 'THE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'THE_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
define( 'THE_PLUGIN_ASSETS_URL', THE_PLUGIN_URL . 'assets/' );

define( 'THE_BLOCK_PREFIX', 'thesaasx' );


/**
 * Register Custom Post Types.
 */
// require_once plugin_dir_path( __FILE__ ) . 'cpt/index.php';

/**
 * Register custom blocks for Gutenberg.
 */
require_once plugin_dir_path( __FILE__ ) . 'gutenberg/setup.php';

/**
 * Register Customizer.
 */
// require_once plugin_dir_path( __FILE__ ) . 'customizer/index.php';

/**
 * Register Metaboxes.
 */
// require_once plugin_dir_path( __FILE__ ) . 'metabox/extra.php';
// require_once plugin_dir_path( __FILE__ ) . 'metabox/layout.php';

/**
 * Send email for contact blocks.
 */
require_once plugin_dir_path( __FILE__ ) . 'utils/contact.php';

require_once plugin_dir_path( __FILE__ ) . 'include/setup/theme.php';

require_once plugin_dir_path( __FILE__ ) . 'include/setup/style.php';
require_once plugin_dir_path( __FILE__ ) . 'include/setup/enqueue.php';
require_once plugin_dir_path( __FILE__ ) . 'include/setup/plugin.php';

require_once plugin_dir_path( __FILE__ ) . 'include/setup/menu.php';
require_once plugin_dir_path( __FILE__ ) . 'include/setup/wc.php';
require_once plugin_dir_path( __FILE__ ) . 'include/utils/general.php';
require_once plugin_dir_path( __FILE__ ) . 'include/utils/layout.php';
require_once plugin_dir_path( __FILE__ ) . 'include/utils/post.php';
require_once plugin_dir_path( __FILE__ ) . 'include/utils/ocdi.php';
require_once plugin_dir_path( __FILE__ ) . 'include/class/the-walker-nav-menu.php';

function thesaasx_plugin_activate() {
	// thesaasx_register_job_cpt();
	// thesaasx_register_portfolio_cpt();
	// thesaasx_register_portfolio_category_taxonomy();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'thesaasx_plugin_activate' );


function asd() {

	global $post_type;

    if (($_GET['post_type'] == 'page') || ($post_type == 'page')) :
	wp_enqueue_style( 'thesaasx', THE_PLUGIN_URL . 'assets/css/page.min.css' , array(), $version );

	endif;
	if (($_GET['post_type'] == 'post') || ($post_type == 'post')) :
		wp_enqueue_style( 'thesaasx', THE_PLUGIN_URL . 'assets/css/page.min.css' , array(), $version );
	
		endif;
	wp_enqueue_style( 'ss', THE_PLUGIN_URL . 'assets/css/gutenberg.min.css' , array(), $version );

	// wp_dequeue_style('thesaasx');
	wp_enqueue_style( 'thesaasx-editor-bleed-fix', THE_PLUGIN_URL . 'assets/css/editor-bleed-fix.min.css' , true, '1.0', 'all' );
}

add_action( 'admin_enqueue_scripts', 'asd' );