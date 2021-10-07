<?php

function thesaasx_render_image( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

if ( $X['src'] === '' ) {
  return '';
}

$class = [];
$class[] = $X['radius'];
$class[] = $X['class'];


$data = [
	'src' => $X['src'],
	'alt' => $X['alt'],
];

foreach ($X['data'] as $key => $value) {
  $data[ 'data-'. $key ] = $value;
}

$link = [
	'url' => $X['url'],
	'targetBlank' => $X['targetBlank'],
];


$attrData  = The_Util::get_attr_data( $data );
$attrClass = The_Util::get_attr_class( $class );


$output = <<< EOD
<img $attrClass $attrData />
EOD;

$output = thesaasx_render_link( $output, $link );

/* --------------------------------------------------- */

return $output;
}
