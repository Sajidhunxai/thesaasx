<?php

function the_block_render_video_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPlay = thesaasx_render_button( $X['btnPlay'] );

$txtText  = $X['txtText'];
$imgBgPlay  = $X['imgBgPlay'];

$output = <<< EOD
<div class="row">
  <div class="col-md-8 mx-auto">

    <div class="bg-img rounded text-white text-center p-6 p-md-10" style="background-image: url($imgBgPlay)">
      <h4>$txtText</h4>
      <br>
      $btnPlay
    </div>

  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
