<?php

function the_block_render_process_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-xl-4">
  <div class="media">
    <div class="mr-5">
      %1$s
    </div>
    <div class="media-body">
      <h6>%2$s</h6>
      <p>%3$s</p>
    </div>
  </div>
</div>
EOD;

foreach ( $X['steps'] as $step ) {
  $items .= sprintf( $repeater,
    thesaasx_render_iconbox( $step['iconbox'] ),
    $step['title'],
    $step['text']
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
