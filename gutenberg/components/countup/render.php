<?php

function thesaasx_render_countup( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class = [];
$class[] = $X['class'];


$data = [
  'data-provide' => 'countup',
  'data-from'    => $X['from'],
  'data-to'      => $X['to'],
  'data-prefix'  => $X['prefix'],
  'data-suffix'  => $X['suffix'],
];


$attrData  = The_Util::get_attr_data ( $data );
$attrClass = The_Util::get_attr_class( $class );


$output = <<< EOD
<span $attrClass $attrData></span>
EOD;


/* --------------------------------------------------- */

return $output;
}
