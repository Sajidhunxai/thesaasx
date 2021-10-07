<?php

function the_block_render_featuretxt_10( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6">
  <div class="media">
    <p class="mr-5 w-50px">%1$s</p>
    <div class="media-body">
      <h6>%2$s</h6>
      <p>%3$s</p>
    </div>
  </div>
</div>
EOD;

foreach ( $X['features'] as $feature ) {
  $items .= sprintf( $repeater,
    thesaasx_render_icon( $feature['icon'] ),
    $feature['title'],
    $feature['text']
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
