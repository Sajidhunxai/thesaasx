<?php

function the_block_render_process_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$items = '';
$repeater = <<< 'EOD'
<div class="row gap-y align-items-center py-7">
  <div class="col-lg-6 mr-auto text-center">
    %1$s
  </div>

  <div class="col-lg-5 text-center text-lg-left">
    <p class="lead-9 fw-900 lh-1 opacity-10">%2$s</p>
    <h3>%3$s</h3>
    <p>%4$s</p>
  </div>
</div>
EOD;

$repeaterSwitched = <<< 'EOD'
<div class="row gap-y align-items-center py-7">
  <div class="col-lg-5 text-center text-lg-left">
    <p class="lead-9 fw-900 lh-1 opacity-10">%2$s</p>
    <h3>%3$s</h3>
    <p>%4$s</p>
  </div>

  <div class="col-lg-6 ml-auto text-center order-first order-lg-last">
    %1$s
  </div>
</div>
EOD;

foreach ( $X['steps'] as $step ) {
  if ( $step['switch'] ) {
    $items .= sprintf( $repeaterSwitched,
      thesaasx_render_image( $step['img'] ),
      $step['number'],
      $step['title'],
      $step['text']
    );
  }
  else {
    $items .= sprintf( $repeater,
      thesaasx_render_image( $step['img'] ),
      $step['number'],
      $step['title'],
      $step['text']
    );
  }
}


$output = <<< EOD
$items
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
