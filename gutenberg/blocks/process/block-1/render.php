<?php

function the_block_render_process_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPlay  = thesaasx_render_button( $X['btnPlay'] );
$imgCover = thesaasx_render_image( $X['imgCover'] );


$items = '';
$repeater = <<< 'EOD'
<li class="step-item">
  <div class="step-icon">
    <span class="iconbox">%1$s</span>
  </div>

  <div class="step-content">
    <h6 class="fw-500">%2$s</h6>
    <p>%3$s</p>
  </div>
</li>
EOD;

foreach ( $X['steps'] as $step ) {
  $items .= sprintf( $repeater,
    $step['number'],
    $step['title'],
    $step['text']
  );
}


$output = <<< EOD
<div class="row align-items-center">

  <div class="col-lg-6">
    <div class="video-btn-wrapper">
      $imgCover
      $btnPlay
    </div>
  </div>

  <div class="col-lg-6">
    <ol class="step">
      $items
    </ol>
  </div>

</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
