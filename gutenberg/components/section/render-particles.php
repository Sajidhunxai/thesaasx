<?php

function thesaasx_render_section_particle( $X ) {
	if ( ! $X['visible'] ) {
		return '';
	}

	$class = ['constellation'];

	$data = [
		'data-color'  => $X['color'],
		'data-length' => $X['length'],
		'data-radius' => $X['radius'],
	];

	$attrClass = The_Util::get_attr_class( $class );
	$attrData = The_Util::get_attr_data( $data );

	return "<canvas $attrClass $attrData></canvas>";
}
