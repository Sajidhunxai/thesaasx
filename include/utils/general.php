<?php

/**
 * Checks to see if we're on the homepage or not.
 */
function thesaasx_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}


/**
 * Get logo image with fallback.
 */
function thesaasx_get_logo( $logo_type = 'default', $class = null ) {
	$blog_name_safe = esc_attr( get_bloginfo( 'name', 'display' ) );
	$img       = get_theme_mod( 'logo_default' );

	if ( 'light' == $logo_type ) {
		$img = get_theme_mod( 'logo_light' );
	}
	elseif ( 'footer' == $logo_type ) {
		$footer_img = get_theme_mod( 'logo_footer' );

		if ( $footer_img ) {
			$img = $footer_img;
		}
	}

	if ( $img ) {

		if ( $class ) {
			$class = ' class="'. esc_attr( $class ) .'"';
		}

		return '<img src="'. esc_url( $img ) .'" alt="'. $blog_name_safe .'"'. $class .'>';
	}
	else {
		return '<span class="brand-title '. esc_attr( $class ) .'">'. $blog_name_safe .'</span>';
	}

}


/**
 * A shorthand function to get an image uri from /assets/img/ directory.
 */
function thesaasx_get_img_uri( $path ) {
	return THE_PLUGIN_URL . '/assets/img/'. $path ;
}


/**
 * Get blog posts page URL.
 */
function thesaasx_get_blog_posts_page_url() {

	// If front page is set to display a static page, get the URL of the posts page.
	if ( 'page' === get_option( 'show_on_front' ) ) {
		return get_permalink( get_option( 'page_for_posts' ) );
	}

	// The front page IS the posts page. Get its URL.
	return get_home_url();
}



/**
 * Limit max menu depth in admin panel to 2
 */
function thesaasx_menu_depth_limit( $hook ) {
	if ( $hook != 'nav-menus.php' ) return;

	// override default value right after 'nav-menu' JS
	wp_add_inline_script( 'nav-menu', 'wpNavMenu.options.globalMaxDepth = 2;', 'after' );
}
add_action( 'admin_enqueue_scripts', 'thesaasx_menu_depth_limit' );


/**
 * Getting rid of archive label.
 */
function thesaasx_archive_title( $title ) {

	if ( is_home() ) {
		$blog_id = get_option( 'page_for_posts' );
		$page_title = get_the_title( $blog_id );
		if ( $page_title !== '' ) {
			$title = $page_title;
		}
		return $title;
	}

    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}

add_filter( 'get_the_archive_title', 'thesaasx_archive_title' );

