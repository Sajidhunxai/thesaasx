<?php

function the_block_render_explore_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$card = <<< 'EOD'
<div class="media align-items-center">
  <div class="mr-5">
    %1$s
  </div>
  <div class="media-body">
    <h5>%2$s</h5>
    <p class="mb-0">%3$s</p>
  </div>
</div>
EOD;


$items = '';
$repeater = <<< 'EOD'
<div class="col-lg-6 mx-auto">
  %1$s
</div>
EOD;

foreach ( $X['items'] as $item ) {
  $itemCard = sprintf( $card,
    thesaasx_render_iconbox( $item['iconbox'] ),
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
