<?php

function the_block_render_video_7( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPlay = thesaasx_render_button( $X['btnPlay'] );

$txtTitle = $X['txtTitle'];
$txtLead  = $X['txtLead'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row align-items-center h-100">
  <div class="col-md-5 mx-auto pb-7">
    <h2 class="display-3">$txtTitle</h2>
    <p class="lead-4">$txtLead</p>
    <p class="lead-2 fw-400 mb-7">$txtText</p>
  </div>

  <div class="col-md-5 mx-auto text-center">
    $btnPlay
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
