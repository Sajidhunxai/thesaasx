<?php

function thesaasx_render_button( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$tag = $X['type'] == 'submit' ? 'button' : 'a';


$class = [ 'btn' ];
$class[] = 'btn-'. ( $X['outline'] ? 'outline-' : '') . $X['color'];
$class[] = 'btn-'. $X['size'];
$class[] = $X['round']  ? 'btn-round' : '';
$class[] = $X['circle'] ? 'btn-circle' : '';
$class[] = $X['block']  ? 'btn-block' : '';
$class[] = $X['glass']  ? 'btn-glass' : '';
$class[] = $X['class'];


if ($X['text'] === '' && $X['icon']['content'] === '') {
	return '';
}


$style = [
	'min-width' => $X['minWidth'] ? $X['minWidth'] .'px' : '',
];


$data = [
	'href'   => $X['type'] !== 'submit' ? $X['url'] : '',
	'target' => $X['targetBlank'] ? '_blank' : '',
	'data-provide' => $X['data']['provide'],
];


$el_icon = '';
if ( $X['icon']['content'] !== '' ) {
  $el_icon = '<i class="'. $X['icon']['content'] .' '. $X['icon']['class'] .'"></i>';
}

if ( empty( $X['icon']['position'] ) ) {
	$X['icon']['position'] = 'before';
}

$icon_before = $el_icon;
$icon_after = '';
if ( $X['icon']['position'] === 'after' ) {
  $icon_before = '';
  $icon_after  = $el_icon;
}


$attrData  = The_Util::get_attr_data ( $data );
$attrStyle = The_Util::get_attr_style( $style );
$attrClass = The_Util::get_attr_class( $class );


$output = <<< EOD
<$tag $attrClass $attrData $attrStyle>$icon_before {$X['text']} $icon_after</$tag>
EOD;


/* --------------------------------------------------- */

return $output;
}
