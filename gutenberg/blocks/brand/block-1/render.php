<?php

function the_block_render_brand_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
%1$s
EOD;

foreach ( $X['brands'] as $brand ) {
  $items .= sprintf( $repeater,
    thesaasx_render_image( $brand['img'] )
  );
}

$output = <<< EOD
<div class="partner">
  $items
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
