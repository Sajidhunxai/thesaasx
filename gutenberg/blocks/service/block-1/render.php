<?php

function the_block_render_service_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-xl-5 mx-lg-auto">
  <h6 class="bt-2 border-secondary py-5">%1$s</h6>
  <p>%2$s</p>
  <br><br>
</div>
EOD;

foreach ( $X['services'] as $service ) {
  $items .= sprintf( $repeater,
    $service['title'],
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
