<?php


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function thesaasx_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/thesaasx
	 * If you're building a theme based on TheSaaS, use a find and replace
	 * to change 'thesaasx' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( '', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'thesaasx-thumbnail', 600 );
	add_image_size( 'thesaasx-featured-image', 800, 600, true );
	add_image_size( 'thesaasx-og-image', 1200, 630, true );


	// This theme uses wp_nav_menu() for navbar.
	register_nav_menus( array(
		'navbar' => esc_html__( 'Navbar Menu', 'thesaasx' ),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );


	// Add support for Block Styles
	add_theme_support( 'wp-block-styles' );

	// Add support for editor styles
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles
	add_editor_style( '/assets/css/page.min.css' );

	// Support align wide
	add_theme_support( 'align-wide' );

	add_theme_support( 'responsive-embeds' );

	// Register color palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'Primary', 'thesaasx' ),
			'slug' => 'primary',
			'color' => '#50a1ff',
		),
		array(
			'name' => __( 'Secondary', 'thesaasx' ),
			'slug' => 'secondary',
			'color' => '#e9ecf0',
		),
		array(
			'name' => __( 'Success', 'thesaasx' ),
			'slug' => 'success',
			'color' => '#78cf18',
		),
		array(
			'name' => __( 'Danger', 'thesaasx' ),
			'slug' => 'danger',
			'color' => '#ff4954',
		),
		array(
			'name' => __( 'Warning', 'thesaasx' ),
			'slug' => 'warning',
			'color' => '#fb8302',
		),
		array(
			'name' => __( 'Info', 'thesaasx' ),
			'slug' => 'info',
			'color' => '#7a54d8',
		),
		array(
			'name' => __( 'Light', 'thesaasx' ),
			'slug' => 'light',
			'color' => '#fafbfb',
		),
		array(
			'name' => __( 'Dark', 'thesaasx' ),
			'slug' => 'dark',
			'color' => '#191919',
		),
		array(
			'name' => __( 'White', 'thesaasx' ),
			'slug' => 'white',
			'color' => '#ffffff',
		),
	) );

	// Define and register starter content to showcase the theme on new sites.
	add_theme_support( 'starter-content', thesaasx_starter_content() );
}
add_action( 'after_setup_theme', 'thesaasx_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thesaasx_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog sidebar', 'thesaasx' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in sidebar of your blog.', 'thesaasx' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
}
add_action( 'widgets_init', 'thesaasx_widgets_init' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thesaasx_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'thesaasx_content_width', 1080 );
}
add_action( 'after_setup_theme', 'thesaasx_content_width', 0 );


/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function thesaasx_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'thesaasx_front_page_template' );


/**
 * Starter content
 */
function thesaasx_starter_content() {

	// bail if not a fresh site
	if ( false === get_option( 'fresh_site' ) ) {
		return;
	}

	$starter_content = array(

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'blog',
			'jobs',
			'portfolio',


			// Define a default navbar, header, and footer.
			'navbar_global_dark' => array(
				'post_type' => 'thesaasx_navbar',
				'post_title' => esc_html__( 'Global Dark', 'thesaasx' ),
				'post_content' => '<!-- wp:thesaasx/navbar-3 /-->',
			),
			'navbar_global_light' => array(
				'post_type' => 'thesaasx_navbar',
				'post_title' => esc_html__( 'Global Light', 'thesaasx' ),
				'post_content' => '<!-- wp:thesaasx/navbar-3 {"navbar":{"mode":"sticky","expand":"lg","color":"light","colorSticky":"dark","container":"","dividerLogo":true,"dividerButton":true,"hideBtn1":false,"hideBtn2":false,"class":""}} /-->',
			),




			'header_global' => array(
				'post_type' => 'thesaasx_header',
				'post_title' => esc_html__( 'Global', 'thesaasx' ),
				'post_content' => '',
			),
			'header_blog_archive' => array(
				'post_type' => 'thesaasx_header',
				'post_title' => esc_html__( 'Blog Archive', 'thesaasx' ),
				'post_content' => '<!-- wp:thesaasx/header-3 {"section":{"isHeaderTag":true,"textWhite":true,"fadeout":false,"overflowHidden":false,"fullscreen":false,"switchable":false,"switchSides":false,"container":"","paddingTop":"","paddingBottom":"","class":"text-center","id":"","header":{"visible":false,"small":"","title":"","hr":true,"text":""},"background":{"type":"gradient","color":"#b9a0c9","gradient":"linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%)","image":"","imageStyle":""},"video":{"source":"youtube","youtube":"","hosted":"","poster":"","mute":true},"overlay":{"opacity":0,"type":"color","color":"#000","gradient":""},"particles":{"visible":false,"color":"","length":150,"radius":150}}} /-->',
			),

			'header_blog_post_1' => array(
				'post_type' => 'thesaasx_header',
				'post_title' => esc_html__( 'Blog Post 1', 'thesaasx' ),
				'post_content' => '<!-- wp:thesaasx/header-5 /-->',
			),

			'header_blog_post_2' => array(
				'post_type' => 'thesaasx_header',
				'post_title' => esc_html__( 'Blog Post 2', 'thesaasx' ),
				'post_content' => '<!-- wp:thesaasx/header-6 /-->',
			),

			'header_job_post' => array(
				'post_type' => 'thesaasx_header',
				'post_title' => esc_html__( 'Job Post', 'thesaasx' ),
				'post_content' => '<!-- wp:thesaasx/header-1 /-->',
			),

			'header_portfolio_post' => array(
				'post_type' => 'thesaasx_header',
				'post_title' => esc_html__( 'Portfolio Post', 'thesaasx' ),
				'post_content' => '<!-- wp:thesaasx/header-2 {"section":{"isHeaderTag":true,"textWhite":false,"fadeout":false,"overflowHidden":false,"fullscreen":false,"switchable":false,"switchSides":false,"container":"","paddingTop":"","paddingBottom":"","borderTop":false,"borderBottom":false,"class":"text-center","id":"","header":{"visible":false,"small":"","title":"","hr":true,"text":""},"background":{"type":"color","color":"#f7f8f8","gradient":"","image":"","imageStyle":""},"video":{"source":"youtube","youtube":"","hosted":"","poster":"","mute":true},"overlay":{"opacity":0,"type":"color","color":"#000","gradient":""},"particles":{"visible":false,"color":"","length":150,"radius":150}}} /-->',
			),




			'footer_global' => array(
				'post_type' => 'thesaasx_footer',
				'post_title' => esc_html__( 'Global', 'thesaasx' ),
				'post_content' => '<!-- wp:thesaasx/footer-3 /-->',
			),


		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Default logo and customizer options.
		'theme_mods' => array(
			'logo_default' => THE_PLUGIN_URL . 'assets/img/logo-dark.png' ,
			'logo_light'   => THE_PLUGIN_URL .'assets/img/logo-light.png' ,

			// Layout
			'navbar_global'         => '{{navbar_global_dark}}',
			'navbar_blog_archive'   => '{{navbar_global_light}}',
			'navbar_blog_post'      => '{{navbar_global_dark}}',
			'navbar_job_post'       => '{{navbar_global_light}}',
			'navbar_portfolio_post' => '{{navbar_global_dark}}',

			'header_global'         => '{{header_global}}',
			'header_blog_archive'   => '{{header_blog_archive}}',
			'header_blog_post'      => '{{header_blog_post_2}}',
			'header_job_post'       => '{{header_job_post}}',
			'header_portfolio_post' => '{{header_portfolio_post}}',

			'footer_global'         => '{{footer_global}}',
			'footer_blog_archive'   => '{{footer_global}}',
			'footer_blog_post'      => '{{footer_global}}',
			'footer_job_post'       => '{{footer_global}}',
			'footer_portfolio_post' => '{{footer_global}}',
		),

	);

	return $starter_content;
}

