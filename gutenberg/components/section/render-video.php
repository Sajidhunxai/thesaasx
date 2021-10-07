<?php

function thesaasx_render_section_video( $X ) {
	if ( $X['source'] !== 'hosted' ) {
		return '';
	}

	$class = ['bg-video'];

	$data = [
		'src'      => $X['hosted'],
		'poster'   => $X['poster'],
		'muted'    => $X['mute'],
		'autoplay' => true,
		'loop'     => true,
	];

	$attrClass = The_Util::get_attr_class( $class );
	$attrData  = The_Util::get_attr_data ( $data );

	return "<video $attrClass $attrData></video>";
}
