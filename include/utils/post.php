<?php


function thesaasx_content( $content='', $type='' ) {


	if ( stripos( implode( ' ', get_body_class() ), 'elementor-page' ) !== false ) {
		if ($type === 'thesaasx_navbar' || $type === 'thesaasx_footer') {
			return;
		}
		the_content();
		return;
	}

	$blocks = array();

	if ( $content === '' ) {
		$post = get_post();
		$type = $post->post_type;

		$elementor_data = get_post_meta($post->ID, '_elementor_data');
		if ( count($elementor_data) > 0 ) {
			the_content();
			return;
		}

		if ( $type === 'product' ) {
			the_content();
			return;
		}

		$blocks = parse_blocks( $post->post_content );
	}
	else {
		$blocks = parse_blocks( $content );
	}


	$current_pb_number = (int) get_query_var( 'page' );
	$looped_pb = 0;


	foreach ($blocks as $block) {
		//var_dump($block);
		$blockName = $block['blockName'];


		if ( $type === 'thesaasx_navbar' || $type === 'thesaasx_header' || $type === 'thesaasx_footer' ) {
			echo render_block( $block );
			continue;
		}


		// Handle page breaks
		//
		if ( $blockName === 'core/nextpage' && $current_pb_number === 0 ) {
			return;
		}

		if ( $blockName === 'core/nextpage' ) {
			$looped_pb++;

			if ( $looped_pb > $current_pb_number - 1 ) {
				return;
			}

			continue;
		}

		if ( $looped_pb < $current_pb_number - 1 ) {
			continue;
		}
		// END: Page breaks
		

		// Remove empty paragraph blocks
		if ( $blockName === 'core/paragraph' && $block['innerHTML'] === "\n<p></p>\n" ) {
			continue;
		}

		/*
		if ( $blockName === null && trim( $block['innerHTML'] ) === "" ) {
			var_dump('00');
			echo apply_filters( 'the_content', render_block( $block ) );
			continue;
		}
		*/

		if ( stripos( $blockName, 'thesaasx/' ) === 0 ) {
			echo do_shortcode( render_block( $block ) );
			continue;
		}

		// This is classic block
		/*
		if ( $blockName === null ) {
			echo '<div class="container">'. apply_filters( 'the_content', render_block( $block ) ) .'</div>';
			continue;
		}
		*/
		

		// Render if it's a HTML block
		if ( $blockName === 'core/html' ) {
			echo do_shortcode( render_block( $block ) );
			continue;
		}

		/*
		// Render shortcode block
		if ( $blockName === 'core/shortcode' ) {
			echo '<div class="container">'. apply_filters( 'the_content', render_block( $block ) ) .'</div>';
			continue;
		}
		*/

		// Render if it's not a core blocks or HTML block, since they don't need container
		/*
		if ( stripos( $blockName, 'core/' ) === false && stripos( $blockName, 'core-embed/' ) === false && stripos( $blockName, 'thesaasx/' ) === false ) {
			echo '<div class="container">'. apply_filters( 'the_content', render_block( $block ) ) .'</div>';
			continue;
		}
		*/


		$align = '';
		if ( isset( $block['attrs']['align'] ) ) {
			$align = $block['attrs']['align'];
		}

		$the_content = apply_filters( 'the_content', render_block( $block ) );
		if ($the_content === '') {
			continue;
		}


		if ( $type === 'post' ) {
			switch ($align) {
				case 'wide':
					echo '<div class="container">'. $the_content .'</div>';
					break;

				case 'full':
					echo '<div class="container-wide">'. $the_content .'</div>';
					break;

				default:
					echo '<div class="container-sm">'. $the_content .'</div>';
					break;
			}

		}
		else {

			switch ($align) {
				case 'wide':
					echo '<div class="container-fluid">'. $the_content .'</div>';
					break;

				case 'full':
					echo '<div class="container-wide">'. $the_content .'</div>';
					break;

				default:
					echo '<div class="container">'. $the_content .'</div>';
					break;
			}
		}

	}
}


/**
 * Add excerpt input to pages.
 */
add_action( 'init', 'thesaasx_excerpts_to_pages' );
function thesaasx_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}


/**
 * Add class to prev/next pages button in blog list.
 */
function thesaasx_posts_link_attributes() {
	return 'class="btn btn-white"';
}
add_filter( 'next_posts_link_attributes', 'thesaasx_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'thesaasx_posts_link_attributes' );



/**
 * Remove #more from post's URL.
 */
function thesaasx_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'thesaasx_remove_more_link_scroll' );



/**
 * Excerpt things
 */
function thesaasx_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'thesaasx_excerpt_more' );

function thesaasx_custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'thesaasx_custom_excerpt_length', 999 );



/**
 * Move textarea to the end of form.
 */
function thesaasx_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields[ 'comment' ];
	unset( $fields[ 'comment' ] );
	$fields[ 'comment' ] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'thesaasx_move_comment_field_to_bottom' );

