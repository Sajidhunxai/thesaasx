<?php

function the_block_render_explore_7( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$card = <<< 'EOD'
<p>%1$s</p>
<h5 class="fw-500 my-4">%2$s</h5>
<p class="mb-0">%3$s</p>
EOD;


$items = '';
$repeater = <<< 'EOD'
<div class="col-lg-4">
  %1$s
</div>
EOD;

foreach ( $X['items'] as $item ) {
  $itemCard = sprintf( $card,
    thesaasx_render_icon( $item['icon'] ),
    $item['title'],
    $item['text']
  );

  $items .= sprintf( $repeater,
    thesaasx_render_card( $item['card'], $itemCard )
  );
}

$output = <<< EOD
<div class="row gap-y text-center">
  $items
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
