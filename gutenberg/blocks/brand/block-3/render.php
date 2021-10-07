<?php

function the_block_render_brand_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-6 col-md-3">
  %1$s
</div>
EOD;

foreach ( $X['brands'] as $brand ) {
  $items .= sprintf( $repeater,
    thesaasx_render_image( $brand['img'] )
  );
}

$output = <<< EOD
<div class="row gap-y partner">
  $items
</div>
EOD;


$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
