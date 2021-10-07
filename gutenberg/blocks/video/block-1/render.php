<?php

function the_block_render_video_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPlay = thesaasx_render_button( $X['btnPlay'] );

$imgBgPlay  = $X['imgBgPlay'];
$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row no-gutters">
  <div class="col-md-6 bg-img video-btn-wrapper order-md-2" style="background-image: url($imgBgPlay); min-height: 300px;" data-overlay="3">
    $btnPlay
  </div>

  <div class="col-10 col-md-4 mx-auto py-7 py-md-9 text-white">
    <h5>$txtTitle</h5>
    <p class="mb-0">$txtText</p>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
