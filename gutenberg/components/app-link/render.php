<?php

function thesaasx_render_appLink( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$apple  = $X['apple'];
$google = $X['google'];


$dataApple = [
	'href'   => $apple['url'],
	'target' => $apple['targetBlank'] ? '_blank' : '',
];

$dataGoogle = [
  'href'   => $google['url'],
  'target' => $google['targetBlank'] ? '_blank' : '',
];


$attrDataApple   = The_Util::get_attr_data( $dataApple );
$attrDataGoogle  = The_Util::get_attr_data( $dataGoogle );


$output = <<< EOD
<a $attrDataApple>
  <img src="{$apple['img']}" alt="{$apple['alt']}">
</a>
<a $attrDataGoogle>
  <img src="{$google['img']}" alt="{$google['alt']}">
</a>
EOD;

/* --------------------------------------------------- */

return $output;
}
