<?php

function the_block_render_service_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6">
  <p>%1$s</p>
  <h5>%2$s</h5>
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
<div class="row text-center">
  <div class="col-md-10 mx-auto">
    <div class="row gap-y">
      $items
    </div>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
