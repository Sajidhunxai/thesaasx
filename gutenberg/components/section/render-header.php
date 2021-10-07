<?php

function thesaasx_render_section_header( $X ) {
	if ( ! $X['visible'] ) {
		return '';
	}

	$output = '<header class="section-header">';

	if ( $X['small'] ) {
		$output .= '<small>'. $X['small'] .'</small>';
	}

	if ( $X['title'] ) {
		$output .= '<h2>'. $X['title'] .'</h2>';
	}

	if ( $X['hr'] ) {
		$output .= '<hr>';
	} else {
		$output .= '<br>';
	}

	if ( $X['text'] ) {
		$output .= '<p class="lead">'. $X['text'] .'</p>';
	}

	$output .= '</header>';
	return $output;
}
