<?php

function thesaasx_render_slickSlider( $attributes, $children ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$class = [];
//$class[] = $X['dots'] ? 'pb-5' : '';
$class[] = $X['class'];


$data = [
  'data-provide'        => 'slider',
  'data-autoplay'       => $X['autoplay'] ? 'true' : '',
  'data-dots'           => $X['dots'] ? 'true' : '',
  'data-arrows'         => $X['arrows'] ? 'true' : '',
  'data-slides-to-show' => $X['slidesToShow'],
  'data-css-ease'       => $X['cssEase'],
  'data-speed'          => $X['speed'],
  'data-autoplay-speed' => $X['autoplaySpeed'],
	'data-pause-on-hover' => $X['pauseOnHover'] ? 'true' : '',
];


$attrData  = The_Util::get_attr_data ( $data );
$attrClass = The_Util::get_attr_class( $class );


$output = <<< EOD
<div $attrClass $attrData>
  $children
</div>
EOD;


/* --------------------------------------------------- */

return $output;
}
