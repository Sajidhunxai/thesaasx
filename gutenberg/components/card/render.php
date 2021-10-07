<?php

function thesaasx_render_card( $attributes, $children ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$BG  = $X['background'];
$tag = $X['url'] === '' ? 'div' : 'a';

$class   = [ 'card' ];
$class[] = $X['textWhite'] ? 'text-white' : '';
$class[] = $X['class'];

$styles = [
  'background-color' => $BG['color'] === '' ? '' : $BG['color'],
];

switch ( $BG['type'] ) {
  case 'color':

    break;

  case 'gradient':
    $styles['background-image'] = $BG['gradient'];
    break;

  case 'image':
    $styles['background-image'] = 'url('. $BG['image'] .')';
    break;
}

$data = [
  'href' => $X['url'],
];

$el_overlay    = thesaasx_render_card_overlay( $X['overlay'], $children );


$attrData      = The_Util::get_attr_data ( $data );
$attrStyle     = The_Util::get_attr_style( $styles );
$attrClass     = The_Util::get_attr_class( $class );


$output = <<< EOD
<$tag $attrClass $attrStyle $attrData>
	$el_overlay
</$tag>
EOD;

/* --------------------------------------------------- */

return $output;
}
