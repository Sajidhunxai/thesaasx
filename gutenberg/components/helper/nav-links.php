<?php

function thesaasx_render_navLinks( $attributes ) {
	$links = '';
	foreach ( $attributes as $key => $item ) {
		if ( ! isset( $item['text'] ) ) {
			$item['text'] = '';
		}
		if ( ! isset( $item['url'] ) ) {
			$item['url'] = '#';
		}
		if ( ! isset( $item['targetBlank'] ) ) {
			$item['targetBlank'] = false;
		}

		$text = $item['text'];
		$link = esc_url( $item['url'] );
		$blank = $item['targetBlank'] ? ' target="_blank"' : '';
		$links .= '<a class="nav-link" href="'. $link .'"'. $blank .'>'. $text .'</a>';
	}

	return $links;
}
