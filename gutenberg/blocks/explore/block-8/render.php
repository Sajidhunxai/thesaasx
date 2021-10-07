<?php

function the_block_render_explore_8( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$card = <<< 'EOD'
<h6 class="card-title text-dark">%1$s</h6>
<p class="text-default mb-0">%2$s</p>
EOD;


$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-xl-4">
  %1$s
</div>
EOD;

foreach ( $X['items'] as $item ) {
  $itemCard = sprintf( $card,
    $item['title'],
    $item['text']
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
