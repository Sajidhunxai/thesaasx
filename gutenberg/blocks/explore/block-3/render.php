<?php

function the_block_render_explore_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$card = <<< 'EOD'
<p>%1$s</p>
<h5 class="mb-0">%2$s</h5>
EOD;


$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-lg-3">
  %1$s
</div>
EOD;

foreach ( $X['items'] as $item ) {
  $itemCard = sprintf( $card,
    thesaasx_render_icon( $item['icon'] ),
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
