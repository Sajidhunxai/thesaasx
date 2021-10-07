<?php

function thesaasx_render_iconbox( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class = [ 'iconbox' ];
$class[] = $X['size'] !== 'md' ? 'iconbox-'. $X['size'] : '';
$class[] = $X['class'];

$style = [
  'background-color' => $X['backgroundColor'],
];



$iconClass = [];
$iconClass[] = $X['content'];
$iconClass[] = $X['iconClass'];

$iconStyle = [
	'color' => $X['color'],
];


$attrStyle = The_Util::get_attr_style( $style );
$attrClass = The_Util::get_attr_class( $class );

$attrIconStyle = The_Util::get_attr_style( $iconStyle );
$attrIconClass = The_Util::get_attr_class( $iconClass );

$output = <<< EOD
<span $attrClass $attrStyle>
  <i $attrIconClass $attrIconStyle></i>
</span>
EOD;


/* --------------------------------------------------- */

return $output;
}
