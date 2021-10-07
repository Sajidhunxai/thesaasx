<?php

function the_block_render_counter_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-lg-3">
  <h4 class="lead-6">
    %1$s
    %2$s
  </h4>
  <p class="text-lighter">%3$s</p>
</div>
EOD;

foreach ( $X['numbers'] as $number ) {
  $items .= sprintf( $repeater,
    thesaasx_render_icon( $number['icon'] ),
    thesaasx_render_countup( $number['countup'] ),
    $number['text']
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
