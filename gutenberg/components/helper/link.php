<?php

function thesaasx_render_link( $children, $attr) {

	if ( the_val( $attr, 'url' ) === '' ) {
		return $children;
	}

	$data = [
		'href'   => the_val( $attr, 'url' ),
		'target' => the_val( $attr, 'targetBlank' ) ? '_blank' : '',
	];


	$dataAttrs = The_Util::get_data_attrs( $data );


$output = <<< EOD
<a $dataAttrs>$children</a>
EOD;

	return $output;
}
