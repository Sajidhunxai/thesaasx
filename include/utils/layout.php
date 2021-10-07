<?php

/**
 * Return true if the current page is a blog page type.
 */
function thesaasx_is_blog_archive () {
  // Use blog archive for search page
  if (!have_posts()) {
  	return true;
  }

  return ( is_archive() || is_author() || is_category() || is_home() || is_tag() || is_search() ) && 'post' == get_post_type();
}


/**
 * Return ID of custom post type used for navbar, header, or footer.
 */
function thesaasx_get_layout_cpt( $place ) {
	$id = 0;

	// Did user picked a custom layout?

	if ( is_singular() || thesaasx_is_blog_archive() ) {
		$post_id = get_queried_object_id();
		$id = get_post_meta( $post_id, 'thesaasx_'. $place .'_id', true );

		// Layout has set to none
		if ( $id === '-1' ) {
			return 'none';
		}

		// Layout has set to a specific CPT
		if ( intval( $id ) > 0 ) {
			return $id;
		}
	}


	// Return one of the global layouts
	//
	if ( is_single() && 'post' == get_post_type() ) {
		$id = intval( get_theme_mod( $place .'_blog_post', 0 ) );

		if ( $id > 0 ) {
			return $id;
		}
	}
	elseif ( thesaasx_is_blog_archive() ) {
		$id = intval( get_theme_mod( $place .'_blog_archive', 0 ) );

		if ( $id > 0 ) {
			return $id;
		}
	}
	
	elseif ( is_single() && 'the_job' == get_post_type() ) {
		$id = intval( get_theme_mod( $place .'_job_post', 0 ) );

		if ( $id > 0 ) {
			return $id;
		}
	}
	elseif ( is_single() && 'the_portfolio' == get_post_type() ) {
		$id = intval( get_theme_mod( $place .'_portfolio_post', 0 ) );

		if ( $id > 0 ) {
			return $id;
		}
	}

	elseif ( class_exists( 'WooCommerce' ) ) {
		if ( is_product() ) {
			$id = intval( get_theme_mod( $place .'_shop_post', 0 ) );

			if ( $id > 0 ) {
				return $id;
			}
		}
		elseif ( is_woocommerce() || is_cart() || is_checkout() ) {
			$id = intval( get_theme_mod( $place .'_shop_archive', 0 ) );

			if ( $id > 0 ) {
				return $id;
			}
		}
	}

	// Layout has set to none
	if ( $id < 0 ) {
		return 'none';
	}

	$id = intval( get_theme_mod( $place .'_global', 0 ) );

	return $id;
}


/**
 * Return html code for navbar, header, or footer based on the user selection.
 */
function thesaasx_get_layout( $place ) {

	// Omit header for pages
	if ( is_page() && $place === 'header' ) {
		return '';
	}

	$id = thesaasx_get_layout_cpt( $place );


	if ( $id === 'none' ) {
		return '';
	}

	if ( $id > 0 ) {
		$post = get_post( $id );
		if ( $post->post_content !== '' ) {
			thesaasx_content( $post->post_content, $post->post_type );
		}
		
		//$post = get_post( $id );
		//echo apply_filters( 'the_content', $post->post_content );
	}
	else {
		get_template_part( 'include/view/'. $place .'/fallback' );
	}
}
