<?php

function the_block_render_service_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-md-5 mr-auto text-md-right">
  <h5>%1$s</h5>
  <p class="small opacity-50">%2$s</p>
</div>

<div class="col-md-6">
  <p>%3$s</p>
  <br><br>
</div>
EOD;

foreach ( $X['services'] as $service ) {
  $items .= sprintf( $repeater,
    $service['title'],
    $service['tags'],
    $service['text']
  );
}


$output = <<< EOD
<div class="row">
  $items
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
