<?php

function the_block_render_video_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPlay  = thesaasx_render_button( $X['btnPlay'] );
$imgCover = thesaasx_render_image( $X['imgCover'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-lg-4 mx-auto text-center text-lg-left">
    <h3>$txtTitle</h3>
    <p>$txtText</p>
    <br>
    $btnPlay
  </div>

  <div class="col-lg-6">
    $imgCover
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
