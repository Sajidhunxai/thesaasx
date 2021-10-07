<?php

function thesaasx_render_readMore( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class = [];
$class[] = $X['class'];

$classIcon = [];
$classIcon[] = $X['icon'];
$classIcon[] = $X['iconClass'];


$data = [
	'href'   => $X['url'],
	'target' => $X['targetBlank'] ? '_blank' : '',
];


$attrData  = The_Util::get_attr_data( $data );
$attrClass = The_Util::get_attr_class( $class );
$attrClassIcon = The_Util::get_attr_class( $classIcon );

$rmlText = $X['text'];


$output = <<< EOD
<a $attrClass $attrData>$rmlText <i $attrClassIcon></i></a>
EOD;

/* --------------------------------------------------- */

return $output;
}
