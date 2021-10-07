<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Gutenberg is not activated.
if ( ! function_exists( 'register_block_type' ) ) {
    return;
}


/**
 * Register required script and style files to the Gutenberg editor.
 */
function thesaasx_plugin_gutenberg_assets() {

	// Scripts.
	wp_enqueue_script(
		'thesaasx-gutenberg-js',
		plugins_url( 'assets/js/gutenberg.min.js', dirname( __FILE__ ) ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-rich-text', 'wp-components', 'wp-hooks' ),
		filemtime( plugin_dir_path( __DIR__ ) . 'assets/js/gutenberg.min.js' )
	);

	// JS Variables
	//
	$jsVars = [
		'theme_uri'      =>	THE_PLUGIN_URL,
		'colorPrimary'   => get_theme_mod( 'style_color_primary', '#50a1ff' ),
		'colorSecondary' => '#e9ecf0',
	];
	wp_localize_script( 'thesaasx-gutenberg-js', 'wp_php', $jsVars );

	// Styles.
	wp_enqueue_style(
		'thesaasx-gutenberg-css',
		plugins_url( 'assets/css/gutenberg.min.css', dirname( __FILE__ ) ),
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __DIR__ ) . 'assets/css/gutenberg.min.css' )
	);

}

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'thesaasx_plugin_gutenberg_assets' );

/**
 * Register categories
 */
add_filter( 'block_categories', function( $categories, $post ) {

	/*
	// This doesn't work, because blocks are still registered
	//
	if ( $post->post_type === 'thesaasx_navbar' ) {
		return array_merge(
			$categories,
			array(
				[ 'slug' => 'thesaasx-navbar',    'title' => __( 'The Navbar' ) ],
			)
		);
	}
	*/

	return array_merge(
		$categories,
		array(
			[ 'slug' => 'thesaasx-blog',      'title' => __( 'The Blog' ) ],
			[ 'slug' => 'thesaasx-post',      'title' => __( 'The Post' ) ],
			[ 'slug' => 'thesaasx-brand',     'title' => __( 'The Brands' ) ],
			[ 'slug' => 'thesaasx-contact',   'title' => __( 'The Contact' ) ],
			[ 'slug' => 'thesaasx-content',   'title' => __( 'The Content' ) ],
			[ 'slug' => 'thesaasx-cover',     'title' => __( 'The Cover' ) ],
			[ 'slug' => 'thesaasx-counter',   'title' => __( 'The Counter' ) ],
			[ 'slug' => 'thesaasx-cta',       'title' => __( 'The Call To Action' ) ],
			[ 'slug' => 'thesaasx-download',  'title' => __( 'The Download' ) ],
			[ 'slug' => 'thesaasx-explore',   'title' => __( 'The Explore' ) ],
			[ 'slug' => 'thesaasx-faq',       'title' => __( 'The FAQ' ) ],
			[ 'slug' => 'thesaasx-feature',   'title' => __( 'The Feature' ) ],
			[ 'slug' => 'thesaasx-featuretxt','title' => __( 'The Textual Features' ) ],
			[ 'slug' => 'thesaasx-gallery',   'title' => __( 'The Gallery' ) ],
			[ 'slug' => 'thesaasx-job',       'title' => __( 'The Job' ) ],
			[ 'slug' => 'thesaasx-map',       'title' => __( 'The Map' ) ],
			[ 'slug' => 'thesaasx-pricing',   'title' => __( 'The Pricing' ) ],
			[ 'slug' => 'thesaasx-portfolio', 'title' => __( 'The Portfolio' ) ],
			[ 'slug' => 'thesaasx-process',   'title' => __( 'The Process' ) ],
			[ 'slug' => 'thesaasx-review',    'title' => __( 'The Review' ) ],
			[ 'slug' => 'thesaasx-service',   'title' => __( 'The Service' ) ],
			[ 'slug' => 'thesaasx-signup',    'title' => __( 'The Signup Form' ) ],
			[ 'slug' => 'thesaasx-subscribe', 'title' => __( 'The Subscribe Form' ) ],
			[ 'slug' => 'thesaasx-team',      'title' => __( 'The Team' ) ],
			[ 'slug' => 'thesaasx-video',     'title' => __( 'The Video' ) ],

			[ 'slug' => 'thesaasx-navbar',    'title' => __( 'The Navbar' ) ],
			[ 'slug' => 'thesaasx-header',    'title' => __( 'The Header' ) ],
			[ 'slug' => 'thesaasx-footer',    'title' => __( 'The Footer' ) ],

			[ 'slug' => 'thesaasx-page',      'title' => __( 'The Page Templates' ) ],
			[ 'slug' => 'thesaasx-demo',      'title' => __( 'The Demo Templates' ) ],
		)
	);
}, 10, 2 );


/**
 * Return value of an array item if defined.
 */
function the_val( $array, $index ) {
	if ( isset( $array[ $index] ) ) {
		return $array[ $index];
	}
	return null;
}


// Include required PHP files.
//
//include( plugin_dir_path( __FILE__ ) . 'utils/class-the-util.php');
include THE_PLUGIN_PATH .'gutenberg/utils/class-the-util.php';

// Include all components
foreach ( glob( THE_PLUGIN_PATH .'gutenberg/components/*/*.php' ) as $file ) {
	include $file;
}

// Include all render files
foreach ( glob( THE_PLUGIN_PATH .'gutenberg/blocks/*/*/render.php' ) as $file ) {
	include $file;

	$block_id  = substr( basename( dirname( $file ) ), 6 );
	$block_cat = basename( dirname( dirname( $file ) ) );


	if ( in_array( $block_cat, [ 'page', 'demo' ] ) ) {
		continue;
	}

	$block_name = THE_BLOCK_PREFIX .'/'. $block_cat .'-'. $block_id;
	$block_callback = 'the_block_render_'. $block_cat .'_'. $block_id;


	if ( function_exists( $block_callback ) ) {
		$attributes = [];

		if ( $block_cat === "blog" ) {
			$attributes['serverSideRender'] = false;
			$attributes['postsNum'] = 3;
		}

		if ( $block_cat === "post" ) {
			$attributes['serverSideRender'] = false;
			$attributes['postId'] = 1;
			//$attributes = The_Util::X( [], dirname( $file ) );
		}

		if ( $block_cat === "job" ) {
			$attributes['serverSideRender'] = false;
			//$attributes['postId'] = 1;
			//$attributes = The_Util::X( [], dirname( $file ) );
		}

		if ( $block_cat === "portfolio" ) {
			$attributes['serverSideRender'] = false;
			$attributes['postsNum'] = 8;
			//$attributes['postId'] = 1;
			//$attributes = The_Util::X( [], dirname( $file ) );
		}

		register_block_type( $block_name, [
			'attributes'      => $attributes,
			'render_callback' => $block_callback,
		]);
	}

}



