<?php

function thesaasx_render_form( $attributes, $children ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class = [];
$class[] = $X['class'];

$data = [
  'action'       => $X['action'],
  'method'       => $X['method'],
  'id'           => $X['id'],
  'name'         => $X['name'],
  'target'       => $X['targetBlank'] ? '_blank' : '',
  'autocomplete' => $X['autocomplete'] ? '' : 'off',
];


$attrData      = The_Util::get_attr_data( $data );
$attrClass     = The_Util::get_attr_class( $class );


$output = <<< EOD
<form $attrClass $attrData>
	$children
</form>
EOD;

/* --------------------------------------------------- */

return $output;
}
