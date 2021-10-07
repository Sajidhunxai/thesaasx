<?php

function the_block_render_service_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$card = <<< 'EOD'
<p class="my-5">%1$s</p>
<h5 class="mb-5 fw-500">%2$s</h5>
<p>%3$s</p>
EOD;


$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-xl-3">
  %1$s
</div>
EOD;

foreach ( $X['services'] as $service ) {
  $itemCard = sprintf( $card,
    thesaasx_render_icon( $service['icon'] ),
    $service['title'],
    $service['text']
  );

  $items .= sprintf( $repeater,
    thesaasx_render_card( $service['card'], $itemCard )
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
