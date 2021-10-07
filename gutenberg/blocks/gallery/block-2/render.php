<?php

function the_block_render_gallery_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$card = <<< 'EOD'
%1$s
<div class="card-body">
  <h6 class="mb-0">%2$s</h6>
</div>
EOD;


$items = '';
$repeater = <<< 'EOD'
<div class="col-6 col-lg-4">
  %1$s
</div>
EOD;

foreach ( $X['items'] as $item ) {
  $itemCard = sprintf( $card,
    thesaasx_render_image( $item['img'] ),
    $item['title']
  );

  $items .= sprintf( $repeater,
    thesaasx_render_card( $item['card'], $itemCard )
  );
}

$output = <<< EOD
<div class="row gap-y">
  $items
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
