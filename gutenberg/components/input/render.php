<?php

function thesaasx_render_input( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class = [ 'form-control' ];
$class[] = $X['size'] !== 'md' ? 'form-control-'. $X['size'] : '';
$class[] = $X['class'];

$data = [
  'type' => $X['type'],
  'id' => $X['id'],
  'name' => $X['name'],
  'value' => $X['value'],
  'placeholder' => $X['placeholder'],
];

$txtValue = $X['value'];

$attrData  = The_Util::get_attr_data ( $data );
$attrClass = The_Util::get_attr_class( $class );


$output = <<< EOD
<textarea $attrClass $attrData rows="4">$txtValue</textarea>
EOD;

if ( $X['type'] !== 'textarea' ) {
  $output = "<input $attrClass $attrData>";
}

/* --------------------------------------------------- */

return $output;
}
