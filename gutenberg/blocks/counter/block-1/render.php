<?php

function the_block_render_counter_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-6 col-lg-3">
  <p class="lead-8 mb-0">%1$s</p>
  <p class="small text-uppercase ls-2">%2$s</p>
</div>
EOD;

foreach ( $X['numbers'] as $number ) {
  $items .= sprintf( $repeater,
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
