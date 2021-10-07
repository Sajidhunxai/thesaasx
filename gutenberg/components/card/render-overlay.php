<?php

function thesaasx_render_card_overlay( $X, $children ) {
	if ( $X['opacity'] == 0 ) {
		return $children;
	}

	$class = [ 'overlay', 'opacity-'. $X['opacity'] ];

	$styles = [
		'background-color' => $X['type'] == 'color' ? $X['color'] : '',
		'background-image' => $X['type'] == 'gradient' ? $X['gradient'] : '',
	];

	$attrClass = The_Util::get_attr_class( $class );
	$attrStyle = The_Util::get_attr_style( $styles );

	return "<div $attrClass $attrStyle></div><div class=\"position-relative\">$children</div>";
}
