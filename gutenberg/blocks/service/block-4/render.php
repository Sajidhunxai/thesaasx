<?php

function the_block_render_service_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$items = '';
$repeater = <<< 'EOD'
<div class="col-sm-6 col-lg-4">
  <p class="mb-5">%1$s</p>
  <h6>%2$s</h6>
  <p>%3$s</p>
</div>
EOD;

foreach ( $X['services'] as $service ) {
  $items .= sprintf( $repeater,
    thesaasx_render_icon( $service['icon'] ),
    $service['title'],
    $service['text']
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
