<?php

function the_block_render_brand_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div>%1$s</div>
EOD;

foreach ( $X['brands'] as $brand ) {
  $items .= sprintf( $repeater,
    thesaasx_render_image( $brand['img'] )
  );
}

$items = thesaasx_render_slickSlider( $X['slider'], $items );

$output = <<< EOD
$items
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
