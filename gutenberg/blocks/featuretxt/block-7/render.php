<?php

function the_block_render_featuretxt_7( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$items = '';
$repeater = <<< 'EOD'
<div class="col-lg-4">
  <div class="card card-body border">
    <h6 class="card-title">%1$s</h6>
    <p class="small-1">%2$s</p>
    %3$s
  </div>
</div>
EOD;

foreach ( $X['features'] as $feature ) {
  $items .= sprintf( $repeater,
    $feature['title'],
    $feature['text'],
    thesaasx_render_readMore( $feature['link'] )
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
