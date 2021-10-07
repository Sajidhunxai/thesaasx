<?php

function the_block_render_explore_6( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$card = <<< 'EOD'
<h3 class="fw-500 mb-0">%1$s</h3>
EOD;


$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-lg-3">
  %1$s
</div>
EOD;

foreach ( $X['items'] as $item ) {
  $itemCard = sprintf( $card,
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
