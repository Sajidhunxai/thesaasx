<?php

function the_block_render_counter_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-lg-4">
  <div class="row">
    <div class="col-6">
      <h4 class="lead-7 text-right">%1$s</h4>
    </div>

    <div class="col-6">
      <p class="small text-uppercase ls-2 mb-2">%2$s</p>
      <p>%3$s</p>
    </div>
  </div>
</div>
EOD;

foreach ( $X['numbers'] as $number ) {
  $items .= sprintf( $repeater,
    thesaasx_render_countup( $number['countup'] ),
    $number['text'],
    thesaasx_render_icon( $number['icon'] )
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
