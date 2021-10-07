<?php

function the_block_render_gallery_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="p-2">
  <div class="rounded bg-img h-400" style="background-image: url(%1$s)"></div>
</div>
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
