<?php

function thesaasx_render_icon( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class = [];
$class[] = $X['content'];
$class[] = $X['class'];


$style = [
	'color' => $X['color'],
];


$attrStyle = The_Util::get_attr_style( $style );
$attrClass = The_Util::get_attr_class( $class );


$output = <<< EOD
<i $attrClass $attrStyle></i>
EOD;


/* --------------------------------------------------- */

return $output;
}
