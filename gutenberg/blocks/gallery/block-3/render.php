<?php

function the_block_render_gallery_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="bg-img h-600" style="background-image: url(%1$s)"></div>
EOD;

foreach ( $X['images'] as $image ) {
  $items .= sprintf( $repeater,
    $image['img']
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
