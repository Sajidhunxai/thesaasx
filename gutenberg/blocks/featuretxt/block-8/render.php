<?php

function the_block_render_featuretxt_8( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$items = '';
$repeater = <<< 'EOD'
<div class="col-lg-4">
  <div class="card card-body border text-center">
    <p class="my-5">%1$s</p>
    <h5>%2$s</h5>
    <p>%3$s</p>
    <p>%4$s</p>
  </div>
</div>
EOD;

foreach ( $X['features'] as $feature ) {
  $items .= sprintf( $repeater,
    thesaasx_render_icon( $feature['icon'] ),
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
