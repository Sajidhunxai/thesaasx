<?php

function thesaasx_render_googleMap( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class[] = $X['class'];


$style = [
  'height' => $X['height'] ? $X['height'] .'px' : '',
];


$data = [
  'data-provide' => "map",
  'data-lat'     => $X['lat'],
  'data-lng'     => $X['lng'],
  'data-zoom'    => $X['zoom'],
  'data-marker'  => $X['marker'],
  'data-style'   => $X['theme'],
];

/*
if ( $X['marker'] ) {
  $data['marker-lat'] = $X['markerLat'];
  $data['marker-lng'] = $X['markerLng'];
}
*/

$attrData  = The_Util::get_attr_data ( $data );
$attrStyle = The_Util::get_attr_style( $style );
$attrClass = The_Util::get_attr_class( $class );


$output = <<< EOD
<div $attrClass $attrData $attrStyle></div>
EOD;

/* --------------------------------------------------- */

return $output;
}
